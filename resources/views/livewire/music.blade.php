<div>
    @if($uploaded)
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            <span><strong>音频已上传！</strong> 请等待管理员审核。</span>
            <span class="pointer" wire:click="closeAlert">x</span>
        </div>
    @endif
    <div class="my-3">
        <span class="h1">音频库</span>
    </div>
    @if(!$flag)
        <button class="btn btn-primary" wire:click="addMusic">添加音频</button>
    @endif

    @if($flag)
        <div class="d-flex justify-content-center rounded">
            <div class="shadow py-3 px-3 col-12 col-md-6 col-4">
                <div class="d-flex justify-content-between">
                    <span class="h2">上传音频</span>
                    <span class="h2 pointer" wire:click="closeMusic">X</span>
                </div>
                <form wire:submit.prevent="uploadFile">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="title" placeholder="标题" wire:model="title">
                        <label for="title">标题</label>
                        @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <input id="file" wire:model="file" type="file" class="d-none" accept="audio/mp3">
                        <div class="d-flex bg-white border rounded">
                            <label for="file" class="pointer px-3 bg-secondary text-light py-3 left-rounded">选着文件</label>
                            <div class="px-3 py-3">
                                {{ $file ? $file->getClientOriginalName() : '未选择文件' }}
                            </div>
                        </div>
                        @if($errors->has('file'))
                            <span class="text-danger">{{ $errors->first('file') }}</span>
                        @endif
                    </div>

                    <input type="submit" class="btn btn-primary col-12" value="上传" wire:loading.attr="disabled">
                </form>
            </div>
        </div>
    @endif
    <div class="mt-3 d-flex align-items-center">
        控制音量
        <input class="ms-2" type="range" min="0.01" max="1" step="0.01" value="0.5" oninput="setVolume(this.value)">
        <span class="ms-2" id="volume">50%</span>
    </div>
    <div class="my-3 d-flex flex-wrap">
        @foreach($musics as $music)
            <div class="bg-white rounded p-3 shadow-sm my-3 music-card">
                <div class="mb-2 text-center">
                    <b class="h4">{{ $music->title }}</b>
                </div>
                <audio id="music{{ $music->id }}">
                    <source src="{{ asset($music->path) }}">
                </audio>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success audio-btn" onclick="playAudio('music{{ $music->id }}')">播放</button>
                    <button class="btn btn-danger audio-btn" onclick="stopAudio('music{{ $music->id }}')">停止</button>
                    <a class="btn btn-primary audio-btn" href="{{ asset($music->path) }}" download>下载</a>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        setVolume(0.5);

        function setVolume(value) {
            const audios = document.querySelectorAll('audio');
            document.getElementById('volume').innerText = `${(value * 100).toFixed(0)}%`;

            audios.forEach(audio => {
                audio.volume = value
            });
        }

        function playAudio(id) {
            let audio = document.getElementById(id);
            audio.play();
        }

        function stopAudio(id) {
            let audio = document.getElementById(id);
            audio.pause();
        }
    </script>
</div>
