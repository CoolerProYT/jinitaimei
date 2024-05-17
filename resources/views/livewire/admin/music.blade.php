<div>
    <div>
        <span class="h1">音频库管理</span>
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
    <table class="table table-striped mt-4 border" style="vertical-align: middle">
        <thead>
            <tr>
                <th>id</th>
                <th class="col-2">标题</th>
                <th class="col-7">音频</th>
                <th class="col-2">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($musics as $music)
                <tr class="table-light">
                    <td>{{ $music->id }}</td>
                    <td>{{ $music->title }}</td>
                    <td>
                        <audio controls>
                            <source src="{{ asset($music->path) }}">
                        </audio>
                    </td>
                    <td>
                        @if(!$verified)
                            <button class="btn btn-success" wire:click="approve({{ $music->id }})">同意</button>
                        @endif
                        <button class="btn btn-danger" wire:click="delete({{ $music->id }})">删除</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
