@extends('quiz.layouts.main')

@section('content')          


<div class="col-sm-10">
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
You chose <mark> {{$cat->category}}</mark>
<br><br>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">Level 1</a></li>
  <li><a data-toggle="tab" href="#menu5">Level 2</a></li>
  <li><a data-toggle="tab" href="#menu2">Level 3</a></li>
<br><br>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
    <p style="color:red">Level 1 </p><BR>
 <form method="POST" action="{{url("quiz/check/{$cat->category}/1")}}" enctype="multipart/form-data">
HIGHEST SCORER:<mark>{{$high1->Name}}</mark><br><br>
<img src="{{asset("images/{$high1->Image}")}}" width="100px" height="100px" >

{!! csrf_field() !!} 
<br><br><b>Enter Your name:<br></b><input type='text' name='name'>     
<br><br>   <label>Upload your photo (Optional):</label><input type="file" name="image"><br>

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
    <p style="color:red">Level 2 </p>

  <form method="POST" action="{{url("quiz/check/{$cat->category}/2")}}" enctype="multipart/form-data">
HIGHEST SCORER:<mark>{{$high2->Name}}</mark><br><br>
<img src="{{asset("images/{$high2->Image}")}}" width="100px" height="100px" >
{!! csrf_field() !!} 
<br><br><b>Enter Your name:<br></b><input type='text' name='name'>     
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
    <p style="color:red">Level 3 </p>


  <form method="POST" action="{{url("quiz/check/{$cat->category}/3")}}" enctype="multipart/form-data")}}">
HIGHEST SCORER:<mark>{{$high1->Name}}</mark><br><br>
<img src="{{asset("images/{$high1->Image}")}}" width="100px" height="100px" >
{!! csrf_field() !!} 
<br><br><b>Enter Your name:<br></b><input type='text' name='name'>     
<br><br>   <label>Upload your photo (Optional):</label><input type="file" name="image"><br>

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
