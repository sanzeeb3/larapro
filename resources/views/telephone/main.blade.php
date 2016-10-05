<!DOCTYPE html>

<html lang="en">
<head>
<title>Telephone Directory</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('bootstrap.css')}}" rel="stylesheet">
           
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
<style>

body {
      position: relative;
	
  }

.affix {
      top: 0;
      width: 100%;
	   z-index:100;	
  }

  .affix + .container-fluid {
      padding-top: 20px;
  }

</style>

</head>

<body>
<div class="container-fluid" style="background-color:#F44336;color:#fff;height:120px;">
<img src="{{asset('images/phone.png')}}" width="120" height="100" style="float:right; margin-top:10px" >
   
<h1>Telephone Directory</h1>
<h3>An instant telephone search system </h3> 
</div>

</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="120">

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/telephone')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      </ul>
      </div>
  </div>
</nav>

  <div class="col-sm-2">
<div class="list-group ">
 <h4 style="color:red"> Most Viewed:</h4>
 @foreach($mostviewed as $most)
  <a href="{{url("telephone/show/{$most->id}")}}" class="list-group-item list-group-item-info">{{$most->Name}} - {{$most->Telephone}}</a>
  @endforeach
</div>
</ul>

</div>

@yield('content')
