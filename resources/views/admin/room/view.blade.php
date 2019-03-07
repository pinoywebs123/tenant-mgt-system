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
              <li class="active"><a href="{{route('admin_home')}}">Rooms</a></li>
              <li><a href="{{route('admin_home_bedspacer')}}">Bed Space</a></li>
            </ul>
            
            <h3 class="text-center">Tenant Information</h3>
            @include('shared.notification')
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="media">
                    <div class="media-left media-top">
                      <img src="{{URL::to('img/img_avatar1.png')}}" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Name: {{$find->tenant->first_name}} {{$find->tenant->last_name}}</h4>
                      <p>Room No. {{$find->room->room_number}}</p>
                      <ul class="list-group">
                        <li class="list-group-item">Price: {{$find->room->price}}</li>
                        <li class="list-group-item">Downpayment: {{$find->payment}}</li>
                        <li class="list-group-item">Rent Date: {{$find->created_at->diffForHumans()}}</li>
                      </ul>
                      <a href="{{route('room_finished',$find->id)}}" class="btn btn-danger btn-xs">Finished</a>
                    </div>
                  </div>
                </div>
                               
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
