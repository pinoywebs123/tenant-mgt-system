<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Tenancy System</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    
    <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet" />
    

    <link href="{{URL::to('/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />   
    <style type="text/css">
        .well{
            margin-top: 15%;
            background-color: transparent;
            border-top-right-radius: 50px;

        }
        .input-group-addon{
            background-color: #f9ca24;

        }
        .input-group{
            margin-bottom: 5%;
        }
        form{
            opacity: 1 !important;
        }
        body{
              

              background: url("{{URL::to('img/bg.jpg')}}") no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;

            }
    </style>
    </head>
    <body>
        
        <div class="col-md-4 col-md-offset-4 well">
            <p class="text-right">
                <img src="{{URL::to('img/room.png')}}" width="80px" style="margin-top: -50px;">
            </p>
        	<h3 style="color: #fff;">Sign In</h3>
            <form action="{{route('loginCheck')}}" method="POST">
              <div class="input-group">
                <span class="input-group-addon"><i class="pe-7s-id"></i></span>
                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="pe-7s-unlock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div>
                @csrf
                  <p class="text-right">
                      <input type="submit" value="Submit" class="btn btn-warning">
                  </p>
              </div>
            </form>
        </div>
    </body>
</html>
