<!DOCTYPE html>

<html lang="en">
<head>
<style>
.comment
{
	border:1px solid red;
	background-color:silver;
	display:block;
	border-radius:5px;
}
</style>
<title>Have your opinion</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('bootstrap.css')}}" rel="stylesheet">         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">
 <div class="row">  
  <div class="col-sm-5">
<br>
@if ( session()->has('message') )
    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
@endif

    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
	
<h2>Have your opinion</h2>
<mark>1. Say on one sentence about 'communication physics'.</mark><br><BR>
<form method="POST" action="{{url('/review/now')}}">
{!! csrf_field() !!}<br>
Your Name: <input type="name" name="name" id="name" ><br><BR>
Your Email(optional): <input type="email" name="email" id="email" ><br><BR>
<textarea name="comment" placeholder="Have your say here..."></textarea>
<br><br> <input type="submit" name="submit" value="Comment" class="btn btn-default"><br><BR>
</form>
<br><BR>Top Comments:<br><br>
@foreach($show as $sh)
<div class="alert alert-info fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{$sh->comment}}--{{$sh->name}}</div> 
<span class="comment">{{$sh->comment}} --<b style="color:blue">{{$sh->name}},</b> {{$sh->email}}</span>
<form method="POST" action="{{url("/review/now/add/{$sh->id}")}}">
{!! csrf_field() !!}<input type="submit" name="plus" value="+1"> <input type="submit" value="-1" name="minus"> 
</form>Total score: <mark>{{$sh->score}}</mark><br><br>
@endforeach 
</div>
 <div class="col-sm-7">
<h3>A laravel Web Application : Review System</h3>
<br><p style="color:red">** This  is just a sample and proposal for the project.</p><br>
<b>Possible Further Enhancements:</b><br>
<li>Complete and attractive website with some enhanced designings.</li>
<li>Multiple questions.</li>
<li>Posting of the question by user.</li>
<li>User login feature.User can therefore cancel their comment and post their question.</li>
<br><BR>


  
<b> Backend Features of the project:</b><br><br>
<li>Storing the details of user in database</li>
<li>Storing array if user comments multiple times on one question</li>
<li>Storing the score of the comment in database.</li>
<li>Limiting the number of  comments user can comment maximum.</li>



</div></div>