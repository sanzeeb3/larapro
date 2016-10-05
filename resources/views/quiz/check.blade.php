@extends('quiz.layouts.main')

@section('content')          

<div class="col-sm-10">

You chose <mark>{{$cat->category}}</mark> level {{$cat->level}}. 
Hello {{$eman}}<br>.
Results:

You scored {{$count}}.
     <br>
ANSWERS LIST:
<table border='1' class='table table-hover table-striped'>
<thead style='background-color:silver'><tr><td>id</td><td>Question</td><td>opt 1</td><td>opt 2</td><td>opt 3</td><td>opt 4</td><td>Correct answer</td><td>You selected</td></tr></thead>
@foreach ($stmt as $q)
<tr><td>{{$q->qid}}</td><td>{{$q->question}}</td><td>{{$q->opt1}}</td><td>{{$q->opt2}}</td>
<td>{{$q->opt3}}</td><td>{{$q->opt4}}</td><td>{{$q->answer}}</td>

<td> @if(array_key_exists($q->qid, $mycheck))
	
		opt	{{$mycheck[$q->qid]}}
	@else 
	You have not selected an answer.

@endif
</td></tr>
@endforeach

@endsection
</div>
