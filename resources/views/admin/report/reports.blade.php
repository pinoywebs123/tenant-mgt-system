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
                  <li class="active"><a href="{{route('admin_reports')}}">Rooms</a></li>
                  <li><a href="{{route('admin_reports_bedspace')}}">Bed Space</a></li>
                </ul>

                <div class="text-right">
                    <form>
                        <input type="date" name="start" required="">
                        <input type="date" name="end" required="">
                        <input type="submit" value="Go" class="btn btn-primary btn-xs">
                    </form>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Room</th>
                                <th>Payment</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($room_tenants as $tenant)
                              <tr>
                                  <td>
                                      {{$tenant->tenant->first_name}}
                                      {{$tenant->tenant->last_name}}
                                  </td>
                                  <td>{{$tenant->tenant->address}}</td>
                                  <td>{{$tenant->room->room_number}}</td>
                                  <td>{{$tenant->payment}}</td>
                                  <td>{{$tenant->created_at->toDayDateTimeString()}}</td>
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
