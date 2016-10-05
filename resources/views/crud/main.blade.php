<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD IN LARAVEL</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('jquery.validate.min.js')}}"></script>
<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<link href="{{asset('sweetalert.css')}}" rel="stylesheet">
<script src="{{asset('sweetalert.js')}}"></script>
<script src="{{asset('custom.js')}}"></script>
<script src="{{asset('fileinput/fileinput.js')}}"></script>
<link href="{{asset('fileinput/fileinput.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

</head>

<body>
<div class="container-fluid" style="background-color:#F44336;color:#fff;height:120px;">
  <img src="{{asset('images/phone.png')}}" width="120" height="100" style="float:right; margin-top:10px" >   
  <h1>CRUD system</h1>
  <h3>CREATE, READ, UPDATE, DELETE </h3> 
</div>

<nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/crud')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
           
            <?php if(Auth::check()) 
            {
                ?><li class="active"><a href="{{url('/crud/logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout (<?php echo Auth::user()->username;?>)</a></li>
                <?php
            }
            else
            {
                ?><li class="active"><a href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li class="active"><a href="{{url('/login')}}"><span class="glyphicon glyphicon-user"></span> SignUp</a></li>
                
                <?php
            }
            ?>
              
    </ul>
</nav>

@yield('content')

</body>
</html>
