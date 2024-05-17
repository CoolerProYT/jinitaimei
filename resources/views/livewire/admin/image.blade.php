<div>
    <div>
        <span class="h1">图片管理</span>
    </div>
    <div class="mt-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link pointer {{ $verified ? 'text-dark' : 'active text-primary' }}" wire:click="updateFlag(false)">待审核</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pointer {{ $verified ? 'active text-primary' : 'text-dark' }}" wire:click="updateFlag(true)">已审核</a>
            </li>
        </ul>
    </div>
   <div class="d-flex flex-wrap mt-3">
       @foreach($images as $image)
           <div class="image-card-admin p-2 bg-white rounded shadow-sm d-flex justify-content-between flex-column">
               <div class="col-12">
                   <img class="col-12" src="{{ $image->path }}" alt="">
               </div>
               <div class="mt-2 d-flex justify-content-between">
                   @if(!$verified)
                       <button class="btn btn-success" style="width: 49%" wire:click="approve({{ $image->id }})">同意</button>
                   @endif
                   <button class="btn btn-danger" style="width: {{ $verified ? '100%' : '49%' }}" wire:click="delete({{ $image->id }})">删除</button>
               </div>
           </div>
       @endforeach
   </div>
</div>
