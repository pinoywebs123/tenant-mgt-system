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
            
            <h3 class="text-center">Tenant Information</h3>
            @include('shared.notification')
            <div class="row" style="margin-top: 30px;">
                <p class="text-center">Room No.{{$find->room_number}}</p>
                <p class="text-center">Total Person.{{$find->persons}}</p>
                <p class="text-center">Vacant.{{$find->persons - $find->bedspace_occupied($find->id)}}</p>

                <table class="table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Payment</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bedspacers as $bed)
                      <tr>
                        <td>{{$bed->tenant->first_name}} {{$bed->tenant->last_name}}</td>
                        <td>{{$bed->payment}}</td>
                        <td>{{$bed->created_at->diffForHumans()}}</td>
                        <td>
                          <a href="{{route('bedspacer_finished',$bed->id)}}" class="btn btn-danger btn-xs">Finished</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
