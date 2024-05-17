<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Music as MusicModel;

class Music extends Component
{
    public $musics;
    public $verified = false;

    public function mount()
    {
        $this->musics = MusicModel::where('verified',false)->get();
    }

    public function updateFlag($verify){
        $this->verified = boolval($verify);

        $this->musics = MusicModel::where('verified',$this->verified)->get();
    }

    public function approve($id){
        $music = MusicModel::find($id);
        $music->verified = true;
        $music->save();

        $this->musics = MusicModel::where('verified',$this->verified)->get();
    }

    public function delete($id){
        $music = MusicModel::find($id);

        Storage::delete('public/'.str_replace('storage/','',$music->path));
        $music->delete();
        $this->musics = MusicModel::where('verified',$this->verified)->get();
    }

    public function render()
    {
        return view('livewire.admin.music');
    }
}
