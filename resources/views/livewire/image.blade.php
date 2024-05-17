<div>
    @if($uploaded)
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            <span><strong>图片已上传！</strong> 请等待管理员审核。</span>
            <span class="pointer" wire:click="closeAlert">x</span>
        </div>
    @endif
    <div class="my-3">
        <span class="h1">图库</span>
    </div>
    @if(!$flag)
        <button class="btn btn-primary" wire:click="addImage">添加图片</button>
    @endif

    @if($flag)
        <div class="d-flex justify-content-center rounded">
            <div class="shadow py-3 px-3 col-12 col-md-6 col-4">
                <div class="d-flex justify-content-between">
                    <span class="h2">上传图片</span>
                    <span class="h2 pointer" wire:click="closeImage">X</span>
                </div>
                <form wire:submit.prevent="uploadFile">
                    <div class="mb-3 mt-3">
                        <input id="file" wire:model="file" type="file" class="d-none" accept="image/*">
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
    <div class="mt-4 d-flex flex-wrap">
        @foreach($images as $image)
            <div class="image-card bg-white shadow-sm p-2 rounded d-flex flex-column justify-content-between">
                <div class="col-12">
                    <img class="col-12" src="{{ $image->path }}" alt="">
                </div>
                <div class="mt-2">
                    <button class="col-12 btn btn-primary" wire:click="downloadImage('{{ $image->path }}')">下载</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-12 d-flex justify-content-center">
        {{ $images->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
