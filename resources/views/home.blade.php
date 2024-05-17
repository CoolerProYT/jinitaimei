@extends('master')
@section('title', '首页')

@section('content')
    <div class="video-box">
        <video class="shadow" src="{{ asset('video/jinitaimei.mp4') }}" controls autoplay muted loop></video>
    </div>

    <div>

    </div>

    <div class="container col-md-8 col-lg-6 mt-4 text-center">
        <h2>关于本站</h2>
        <span>本站创建是为了让 ikun 们有地方分享和寻找鸽鸽有关的资源，例如音频，图片，头像等。 任何人都可以上传本站缺失的资源。</span>
        <span>本站资源均来自网络，如有侵权请联系 <a class="text-primary" href="mailto：admin.jinitaimei.cloud">admin.jinitaimei.cloud</a> 删除。</span>
        <span></span>
    </div>
@endsection
