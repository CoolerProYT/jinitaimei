<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Music as MusicModel;

class Music extends Component
{
    use WithFileUploads;

    public $title;
    public $file;
    public $flag = false;
    public $musics;
    public $uploaded = false;

    public function mount(){
        $this->musics = MusicModel::where('verified', true)->get();
    }

    public function addMusic(){
        $this->flag = true;
    }

    public function closeMusic(){
        $this->flag = false;
    }

    public function closeAlert(){
        $this->uploaded = false;
    }

    public function uploadFile(){
        $this->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp3|max:2048',
        ],
        [
            'title.required' => '请输入标题',
            'file.required' => '请选择文件',
            'file.mimes' => '文件格式不正确',
            'file.max' => '文件大小不能超过2M',
        ]);

        $this->file->storeAs('public/music',$this->title.'.mp3');

        MusicModel::create([
            'title' => $this->title,
            'path' => 'storage/music/'.$this->title.'.mp3',
        ]);

        $this->reset(['title','file']);
        $this->uploaded = true;
    }

    public function downloadAudio($url){
        $fileName = basename($url);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'music');
        file_put_contents($tempFilePath, file_get_contents($url));

        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.music');
    }
}
