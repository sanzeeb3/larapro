<!DOCTYPE html>

<html lang="en">
<head>
<title>ONLINE RESERVATION</title>
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


<h2> Reserve Your Flight Ticket</h2>
<form method="POST" action="{{url('/bus/book')}}">
{!! csrf_field() !!}
Your Name: <input type="name" name="name" id="name" ><br><BR>
Your Contact No. <input type="contact" name="contact" id="contact" ><br><BR>
Todays date:<mark><b>{{$mytime->format('Y-m-d, l')}}</b></mark><br><br>
Book for: <select>
  <option name="select" value="{{$mytime->format('Y-m-d')}}">Today</option>
  <option name="select" value="{{$tomorrow->format('Y-m-d')}}">Tomorrow</option>
  <option name="select" value="{{$nextday->format('Y-m-d')}}">{{$nextday->format('Y-m-d')}}</option>
  
</select>
<br><br>BOOK TICKET:<br>
<br>
@foreach($seats as $seat)
@if($seat->available=='1')
<input type="checkbox" name="check[]" value="{{$seat->book}}" >{{$seat->book}}<br><BR>

@else
<input type="checkbox" name="check[]" value="{{$seat->book}}" disabled>{{$seat->book}} (booked)<br><BR>

@endif
@endforeach
<button type="submit" class="btn btn-default">Book</button>
                            </form>
           </div>
 <div class="col-sm-7">
<h3>A laravel Web Application : Online Reservation System</h3>
<br><p style="color:red">** This  is just a sample and proposal for the project.</p><br>
<b>Possible Further Enhancements:</b><br>
<li>Complete and attractive website with some great designings.</li>
<li>User login feature.User can therefore cancel their tickets or postpone the date  of flight.</li>
<li>Message to the user via SMS of any information about flight. Weather conditions, flight delay etc.</li>
<br><BR>


  
<b> Backend Features of the project:</b><br><br>
<li>Storing the details of user in database</li>
<li>Storing array if user checks more than one values</li>
<li>Changing the status of user after booked_for date exceeds</li>
<li>Disabling the already booked tickets</li>
<li>Automatically enabling after booked_for date exceeds the current date</li>



</div></div>