<!DOCTYPE html>

<html lang="en">
<head>
<title>ONLINE BETTING SYSTEM</title>
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


<h2> Online betting system</h2>
<form method="POST" action="{{url('/bet/now')}}">
{!! csrf_field() !!}<br>
Your Name: <input type="name" name="name" id="name" ><br><BR>
Your Contact No. <input type="contact" name="contact" id="contact" ><br><BR>
<p style="color:green"><b>1.Who will be crowned champions this season?<br>** the number in brackets refers to 1: ratio.</p></b><br><br>
Manchester City (3.5)<br>
Chelsea (5.2)<br>
Manchester United (7.3)<br>
Arsenal (10)<br><br><br>

Bet(Rs.) <input type-"text" name="city"> on Manchester City.  <br><BR>
Bet(Rs.) <input type-"text" name="manu" > on Manchester United.<br><BR>
Bet(Rs.) <input type-"text" name="chelsea"> on Chelsea.<br><BR>
Bet(Rs.) <input type-"text" name="arsenal"> on Arsenal.<br><BR>
 <input type="submit" name="champions" value="Bet" class="btn btn-default"><br><BR>

 
<b><p style="color:green">2.First leg of Manchester derby?<br>** the number in brackets refers to 1: ratio.</p><br><br></b>
MCI 2-3 MUN (6.4)<br>
MCI 1-0 MUN (5)<br>
MCI 2-0 MUN (3)<br>
Others(2)<br><br><br>

Bet(Rs.) <input type-"text" name="mci23mun"> on MCI 2-3 MUN.  <br><BR>
Bet(Rs.) <input type-"text" name="mci10mun" > on MCI 1-0 MUN.<br><BR>
Bet(Rs.) <input type-"text" name="mci20mun"> on MCI 2-0 MUN.<br><BR>
Bet(Rs.) <input type-"text" name="others"> on Others.<br><BR>
 <input type="submit" name="derby" value="Bet" class="btn btn-default"><br><BR>
</form>
 
 </div>
 <div class="col-sm-7">
<h3>A laravel Web Application : Online Betting System</h3>
<br><p style="color:red">** This  is just a sample and proposal for the project.</p><br>
<b>Possible Further Enhancements:</b><br>
<li>Complete and attractive website with some great designings.</li>
<li>Multiple betting on one question.</li>
<li>Multiple questions for betting.</li>
<li>User login feature.User can therefore cancel their bet before the game time starts.</li>
<li>Message to the user via SMS of any information about the bet. Game delay, Game time, Goals alerts etc.</li>
<br><BR>


  
<b> Backend Features of the project:</b><br><br>
<li>Storing the details of user in database</li>
<li>Storing array if user bets on more than one options</li>
<li>Storing the game time of the bet option in database</li>
<li>Limiting the maximum Rs while betting</li>



</div></div>