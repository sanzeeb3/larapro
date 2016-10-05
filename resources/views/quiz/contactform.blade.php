@extends('quiz.layouts.main')

@section('content')       


 <div class="col-sm-10">
@if ( session()->has('message') )
    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
@endif

    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
                
<b>contact form</b>
          <form method="POST" action="{{url('/quiz/contactprocess')}}">
                                {!! csrf_field() !!}
                                <input type="name" name="name" id="email" placeholder="Enter your name" />
                                <input type="email" name="email" id="email" placeholder="Enter your email" />
                              <input type="text" name="message" placeholder="Your message here">
                              <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        
                 <!--/form-->
 
@endsection