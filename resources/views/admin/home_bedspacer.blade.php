<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tenany System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

   
    <link href="{{URL::to('/css/animate.min.css')}}" rel="stylesheet"/>

   
    <link href="{{URL::to('/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>
     <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{URL::to('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

   

</head>
<body>

<div class="wrapper">
    @include('admin.side')
    <div class="main-panel">
        @include('admin.nav')


        <div class="content">
            <div class="container-fluid">
             <ul class="nav nav-tabs">
              <li ><a href="{{route('admin_home')}}">Rooms</a></li>
              <li class="active"><a href="{{route('admin_home_bedspacer')}}">Bed Space</a></li>
            </ul>

            

            <div class="row">
                @foreach($beds as $bed)
                   <div class="col-md-4">
                            <div class="thumbnail">
                              <img src="{{URL::to('img/bedspacer.png')}}" alt="Room Image" width="120px">
                              <div class="caption">
                                <h3 class="text-center">Room: {{$bed->room_number}}</h3>
                                <p class="text-center">Total Head: {{$bed->persons}}</p>
                                <p class="text-center">Occupied:{{$bed->bedspace_occupied($bed->id)}}</p>
                                <p class="text-center">Vacant: {{$bed->persons - $bed->bedspace_occupied($bed->id)}}</p>
                                <p class="text-center">Price: P{{$bed->price}}</p>

                                <p>
                                    {{$bed->description}}
                                </p>
                                <p class="text-center">
                                
                                @if($bed->persons - $bed->bedspace_occupied($bed->id) == 0)
                                    <a href="{{route('bedspacer_view',$bed->id)}}" class="btn btn-info" role="button">View</a>
                                @else
                                     <a href="{{route('bedspacer_rent',$bed->id)}}" class="btn btn-primary" role="button">Rent</a>
                                    <a href="{{route('bedspacer_view',$bed->id)}}" class="btn btn-info" role="button">View</a>
                                @endif;
                               
                                </p>
                              </div>
                            </div>
                    </div>

                @endforeach
            </div>

            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Tenancy System for all tenant
                </p>
            </div>
        </footer>

    </div>
</div>


</body>


    <script src="{{URL::to('/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>


</html>
