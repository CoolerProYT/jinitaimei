<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image as ImageModel;
use Illuminate\Support\Str;

class Image extends Component
{
    use WithFileUploads;

    public $uploaded = false;
    public $flag = false;
    public $file;

    public function addImage(){
        $this->flag = true;
    }

    public function closeImage(){
        $this->flag = false;
    }

    public function uploadFile(){
        $this->validate([
            'file' => 'image|max:4096',
        ],
        [
            'file.image' => '文件必须是图片',
            'file.max' => '文件大小不能超过4MB',
        ]);

        $filePath = $this->file->getRealPath();
        $fileName = Str::random(40) . '.' . $this->file->getClientOriginalExtension();;

        $disk = Storage::disk('gcs');

        $disk->put('images/' . $fileName, fopen($filePath, 'r'), [
            'visibility' => 'public',
        ]);

        ImageModel::create([
            'path' => 'images/' . $fileName,
        ]);

        $this->reset(['file']);
        $this->uploaded = true;
    }

    public function closeAlert(){
        $this->uploaded = false;
    }

    public function downloadImage($url){
        $fileName = basename($url);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'image');
        file_put_contents($tempFilePath, file_get_contents($url));

        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {
        $images = ImageModel::where('verified',true)->paginate(20);
        foreach($images as $image){
            $image->path = str_replace('\\','/',Storage::disk('gcs')->url($image->path));
        }
        return view('livewire.image',['images' => $images]);
    }
}
