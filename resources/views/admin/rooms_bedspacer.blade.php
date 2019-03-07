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
                  <li ><a href="{{route('admin_rooms')}}">Rooms</a></li>
                  <li class="active"><a href="{{route('admin_rooms_bedspacer')}}">Bed Space</a></li>
                </ul>

                <div class="row">
                    <div class="col-md-8">
                        <h3>Room List</h3>
                        @include('shared.notification')
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Price</th>
                                    <th>Total Person</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beds as $bed)
                                    <tr>
                                        <td>{{$bed->room_number}}</td>
                                        <td>{{$bed->price}}</td>
                                        <td>{{$bed->persons}}</td>
                                        <td>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" value="{{$bed->id}}">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h3>New Room</h3>
                        <form action="{{route('admin_rooms_bedspacer_check')}}" method="POST">
                            <div class="form-group">
                                <label>Room No.</label>
                                <input type="text" name="room_number" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Total Persons</label>
                                <input type="number" name="persons" class="form-control" required="">
                            </div>
                            <div>
                                @csrf
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Room Informations</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin_bedspace_update')}}" method="POST">
            <input type="hidden" name="room_id" id="room_id">
            <div class="form-group">
                <label>Room No.</label>
                <input type="text" name="room_number" class="form-control"required="" id="room_number">
            </div>
            <div class="form-group">
                <label>Price:</label>
                <input type="text" name="price" class="form-control" required="" id="price">
            </div>
            <div class="form-group">
                <label>Total Persons:</label>
                <input type="text" name="persons" class="form-control" required="" id="persons">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required="" id="description"></textarea>
            </div>
            
        
      </div>
      <div class="modal-footer">
        @csrf
         <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
</body>


    <script src="{{URL::to('/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

    <script type="text/javascript">
        var url = '{{route('admin_get_bedspace')}}';
        var token = '{{Session::token()}}';
        $(document).ready(function(){
            $('.btn-info').click(function(){
                var room_id = $(this).val();
                
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {room_id: room_id, _token : token},
                    success: function(msg){
                        console.log(msg);
                        $("#room_number").val(msg.room_number);
                        $("#price").val(msg.price);
                        $("#persons").val(msg.persons);
                        $("#description").val(msg.description);
                        $("#room_id").val(msg.id);
                    }

                });
            });
        });
    </script>
</html>
