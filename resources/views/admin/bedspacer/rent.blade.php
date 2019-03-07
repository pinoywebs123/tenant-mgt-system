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
                
                <div class="col-md-5">
                  <p class="text-center">
                    <img src="{{URL::to('img/bedspacer.png')}}" alt="Room Image" width="120px">
                  </p>
                  <div class="list-group">
                    <a href="#" class="list-group-item active">Room Number: {{$find->room_number}}</a>
                    <a href="#" class="list-group-item">Price: {{$find->price}}</a>
                     <a href="#" class="list-group-item">Total Person: {{$find->persons}}</a>
                      <a href="#" class="list-group-item">Vacant Person: {{$find->persons - $find->bedspace_occupied($find->id)}}</a>
                    <a href="#" class="list-group-item">Description: {{$find->description}}</a>
                  </div>
                </div>
                <div class="col-md-7">
                  <form action="{{route('bedspacer_rent_check', Request::segment(3))}}" method="POST">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" required=""></textarea>
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" required="">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Payment</label>
                        <input type="number" name="payment" class="form-control" required="">
                      </div>
                    </div>


                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                  
                  </form>
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
