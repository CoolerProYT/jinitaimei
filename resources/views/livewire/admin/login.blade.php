<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="bg-white rounded shadow px-3 py-3 col-10 col-md-6 col-lg-4 col-xl-3">
        <div class="text-center border-bottom pb-3">
            <span class="h1">登录</span>
        </div>
        <form wire:submit.prevent="login" autocomplete="off">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">邮箱:</label>
                <input type="email" class="form-control" id="email" placeholder="输入邮箱" wire:model="email">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">密码:</label>
                <input type="password" class="form-control" id="pwd" placeholder="输入密码" wire:model="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary col-12">登录</button>
        </form>
    </div>
</div>
