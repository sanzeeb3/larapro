<!DOCTYPE html>

<html lang="en">
<head>
<title>Quiz Nepal</title>
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
footer
{
	
	font-size:12px;
	bottom:0;
	width=100%;
	display:inline;
	overflow:hidden;
}

.affix {
      top: 0;
      width: 100%;
	z-index:100;	
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }

</style>

</head>

<body>

<div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
<img src="{{asset('images/img4.jpg')}}" width="300" height="200" style="float:right">
   
<h1>QUIZ CENTER NEPAL</h1>
  <h3>Learning with fun</h3>
  <p>Experience your first online exam here. Choose any subject of your interest and test your skills.</p>
<p>** We donot provide any certificates on completion of the tutorial or exams here. This is just a practice material.</p>
</div>

</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="http://quizcenternepal.twomini.com">quizcenternepal.twomini.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('quiz')}}">Home</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tutorials
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="level1.php">Level 1</a></li>
          <li><a href="level2.php">Level 2</a></li>
          <li><a href="level3.php">Level 3</a></li> 
        </ul>
	<li><a href="history.php">History</a></li>
	<li><a href="features.php">Features</a></li>
	<li><a href="aboutus.php">About us</a></li>
	<li><a href="{{url('/quiz/contact')}}">Contact us</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/quiz/signup')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{url('/quiz/login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

  <div class="col-sm-2">
<div class="list-group ">
 <h4 style="color:red"> Choose Categories:</h4>
  <a href="{{url('quiz')}}" class="list-group-item list-group-item-info">GK</a>
  <a href="{{url('/quiz/category/geography')}}" class="list-group-item list-group-item-success">Geography</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-warning">World History</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-danger">Nepal History</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-info">Physics</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-success">Biology</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-warning">English</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-danger">HTML</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-info">PHP and Mysql</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-success">Object Oriented Programming</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-danger">Basic Electronics</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-warning">Electromagnetics</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-info">Embedded System</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-success">JAVA</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-danger">Sports</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-warning">Literature</a>
  <a href="{{url('quiz/umust')}}" class="list-group-item list-group-item-info">Miscellaneous</a>
</div>
</ul>
</div>

@yield('content')

