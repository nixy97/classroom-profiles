
@extends("layout.csunUser")

@section('content')

    @component('layout.map', ['rooms' => [ $classroom ], 'connected' => 'false' ])
    @endcomponent


    <div class="container nav-fill">
        <ul class="nav nav-metaphor">
            <li class="nav-item flex-fill text-center "> <a class="nav-link  " href="/CsunUser/{{$classroom}}">Equipment</a> </li>
            <li class="nav-item flex-fill text-center"> <a class="nav-link active" href="/CsunUserImage/{{$classroom}}">Images</a> </li>
            <li class="nav-item flex-fill text-center"> <a class="nav-link" href="/classschedules">Class Schedules</a></li>
        </ul>
    </div>
    <div class="container">
        <br>
        <div class="row">
            <div class="col">
                <br>
                <h2 class="text-center">These are the images for the room: {{$classroom}}</h2>
            </div>
        </div>
        <br>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://cdn.metalab.csun.edu/classrooms/EU103/exit.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cdn.metalab.csun.edu/classrooms/EU103/exit.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cdn.metalab.csun.edu/classrooms/EU103/media.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        {{--
                    -------------3D images--------------
        --}}

        <br>
        <div class="row">
            <div class="col">
                <h2 class="text-center">This is the 3D image for the room: {{$classroom}}</h2>
            </div>
        </div>
        <br>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>360 Photos</title>
        <link rel="stylesheet" href="https://cdn.pannellum.org/2.3/pannellum.css">
        <script type="text/javascript" src="https://cdn.pannellum.org/2.3/pannellum.js"></script>
        <style>
            #panorama {
                width: 800px;
                height: 600px;
            }
            #panorama1 {
                width: 700px;
                height: 500px;
                margin: auto;

            }
            #panorama2 {
                width: 700px;
                height: 500px;
                margin: auto;

            }
            h1 {
                text-align: center;
                font-family: "Lato", sans-serif;
                font-size: 20px;
            }
            p {
                text-align: center;
                font-family: "Lato", sans-serif;

            }
            img{
                display: block;
                margin: auto;
                width: 20%;
            }
        </style>



        <div id="panorama1" class="pnlm-container pnlm-grab" tabindex="0">
            {{--<img src="{{url('http://facplan-arcgisweb1.csun.edu/360/'.$building.'/'.$roomNumber.'/'.$room.'.jpg')}}">--}}

            <div class="pnlm-render-container"><canvas width="700" height="500" style="height: 100%; width: 100%;"></canvas></div>
            <div class="pnlm-dragfix"></div>
            <span class="pnlm-about-msg"><a href="https://pannellum.org/" target="_blank">Pannellum</a> 2.3.2</span>
            <div class="pnlm-sprite pnlm-hot-spot-debug-indicator" style="display: none;"></div>
            <div class="pnlm-panorama-info" style="display: none"><div class="pnlm-title-box"></div>
                <div class="pnlm-author-box"></div></div>
            <div class="pnlm-load-box" style="display: none;"><p>Loading...</p>
                <div class="pnlm-lbox"><div class="pnlm-loading"></div></div>
                <div class="pnlm-lbar">
                    <div class="pnlm-lbar-fill" style="width: 100%;"></div>
                </div><p class="pnlm-lmsg"></p></div>
            <div class="pnlm-error-msg pnlm-info-box"></div>
            <div class="pnlm-controls-container">
                <div class="pnlm-zoom-controls pnlm-controls" style="display: block;">
                    <div class="pnlm-zoom-in pnlm-sprite pnlm-control"></div>
                    <div class="pnlm-zoom-out pnlm-sprite pnlm-control"></div>
                </div>
                <div class="pnlm-fullscreen-toggle-button pnlm-sprite pnlm-fullscreen-toggle-button-inactive pnlm-controls pnlm-control" style="display: block;"></div>
            </div>
            <div class="pnlm-load-button" style="display: none;"><p>Click to<br>Load<br>Panorama</p><p></p></div>
            <div class="pnlm-compass pnlm-controls pnlm-control" style="display: inline; transform: rotate(-150.061deg);"></div>

            {{--<a href="{{url('http://facplan-arcgisweb1.csun.edu/360/'.$building.'/'.$roomNumber.'/')}}"> 3D</a>--}}
            <script>
                let loadPosts = function () {
                    let xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            let response = JSON.parse(this.responseText);
                            renderPosts(response);    }
                    }
                    xhr.open("GET", "https://cors-anywhere.herokuapp.com/http://facplan-arcgisweb1.csun.edu/360/JD/2221/");
                    xhr.setRequestHeader("Accept", 'application/json');
                    xhr.send();
                }

                loadPosts();
                pannellum.viewer('panorama1', {
                    "type": "equirectangular",

                    "panorama": "{{url('http://facplan-arcgisweb1.csun.edu/360/'.$building.'/'.$roomNumber.'/'.$classroom.'.jpg')}}" ,

                    "autoLoad": true,

                    "autoRotate": 4
                });

            </script>
        </div>
    </div>
    </div>

    <div id="app">
        <equipmentdata :equip="{{$data['mainData']}}"></equipmentdata>
    </div>
<style>
    .shadow {
        -webkit-box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
        box-shadow: 0px 10px 4px -2px rgba(0,0,0,0.75);
    }
    .tab-pane{ padding:10px;}
</style>
@endsection