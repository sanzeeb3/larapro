@extends('quiz.layouts.main')

@section('content')          

<div class="col-sm-10">
You chose <mark> {{$quiz->category}}</mark>
<br><br>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">Level 1</a></li>
  <li><a data-toggle="tab" href="#menu5">Level 2</a></li>
  <li><a data-toggle="tab" href="#menu2">Level 3</a></li>
<br><br>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
    <p style="color:red">Level 1 {{$quiz->category}}</p><BR>
 <form method="POST" action="{{url("quiz/check/{$quiz->category}/1")}}">
{!! csrf_field() !!} 
<br><b>Enter Your name:<br></b><input type='text' name='name'>     
<br>
@foreach ($quiz as $q)

@if($q->level=='1')
{{ $q->qid }}.  
{{ $q->question }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='1'>     
{{ $q->opt1 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='2'>     
{{ $q->opt2 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='3'>    
{{ $q->opt3 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='4'>   
{{ $q->opt4 }}<br><br>
@endif
@endforeach        
    <button type="submit" class="btn btn-default">Get result</button>
                            </form>

</div>
      <div id="menu5" class="tab-pane fade">
    <p style="color:red">Level 2 {{$quiz->category}}</p>

  <form method="POST" action="{{url("quiz/check/{$quiz->category}/2")}}" enctype="multipart/form-data">

{!! csrf_field() !!} 
<br><b>Enter Your name:<br></b><input type='text' name='name'>     
<br>   <label>Upload your photo (Optional):</label><input type="file" name="image"><br>

@foreach ($quiz as $q)

@if($q->level=='2')
{{ $q->qid }}.  
{{ $q->question }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='1'>     
{{ $q->opt1 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='2'>     
{{ $q->opt2 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='3'>    
{{ $q->opt3 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='4'>   
{{ $q->opt4 }}<br><br>
@endif
@endforeach        
    <button type="submit" class="btn btn-default">Get result</button>
                            </form>

</div>

<div id="menu2" class="tab-pane fade">
    <p style="color:red">Level 3 {{$quiz->category}}</p>


  <form method="POST" action="{{url("quiz/check/{$quiz->category}/3")}}">
{!! csrf_field() !!} 
<br><b>Enter Your name:<br></b><input type='text' name='name'>     
<br>
@foreach ($quiz as $q)

@if($q->level=='3')
{{ $q->qid }}.  
{{ $q->question }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='1'>     
{{ $q->opt1 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='2'>     
{{ $q->opt2 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='3'>    
{{ $q->opt3 }}<br>
<input type='radio' name='mycheck[{{$q->qid}}]' value='4'>   
{{ $q->opt4 }}<br><br>
@endif
@endforeach        
    <button type="submit" class="btn btn-default">Get result</button>
                            </form>

</div>
</div>
@endsection
<center>All rights reserved. @2016</center>
