@include('templates.header')
@section('content')


    <div id="instructions">

        <video id="my_video_1" class="video-js vjs-default-skin" width="640px" height="267px" controls preload="none"
            poster='http://video-js.zencoder.com/oceans-clip.jpg'
            data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
            <source src="https://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
            <source src="https://vjs.zencdn.net/v/oceans.webm" type='video/webm' />
        </video>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>

    @include('templates.footer')
