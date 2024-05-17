<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Image as ImageModel;

class Image extends Component
{
    public $verified = false;
    public $images;

    public function mount(){
        $this->loadImages();
    }

    public function updateFlag($flag){
        $this->verified = boolval($flag);
        $this->loadImages();
    }

    public function loadImages(){
        $images = ImageModel::where('verified',$this->verified)->get();
        $disk = Storage::disk('gcs');

        foreach($images as $image){
            $image->path = $disk->url($image->path);
        }

        $this->images = $images;
    }

    public function delete($id){
        $image = ImageModel::find($id);
        $disk = Storage::disk('gcs');

        $disk->delete($image->path);
        $image->delete();
        $this->loadImages();
    }

    public function approve($id){
        $image = ImageModel::find($id);
        $image->verified = true;
        $image->save();
        $this->loadImages();
    }

    public function render()
    {
        return view('livewire.admin.image');
    }
}
