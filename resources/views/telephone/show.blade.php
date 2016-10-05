@extends('telephone.main')

@section('content')       

 <div class="col-sm-5">
@if ( session()->has('message') )
    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
@endif

    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
                <h2> <u>Name: {{$show->Name}}</u></h2> 
				<img src="{{asset("images/{$show->Image}")}}" width="200px" height="200px" style="display:block; border:1px solid red" 			><br>
<br><b><u>Details</u><br><br>
				<table border='1' class='table table-hover table-striped'>
<thead ><tr><td width="40%">Telephone:</td><td>{{$show->Telephone}}</td></tr></thead>
<thead ><tr><td width="40%">Address:</td><td>			{{$show->Address}}</td></tr></thead>
<thead ><tr><td width="40%">Mobile No:</td><td>	{{$show->Mobile}}</td></tr></thead>
<thead ><tr><td width="40%">Email:</td><td>				{{$show->Email}}</td></tr></thead>
<thead ><tr><td width="40%">Alternative Email:</td><td>				{{$show->altemail}}</td></tr></thead>
<thead ><tr><td width="40%">Company Name:</td><td>{{$show->company_name}}</td></tr></thead>
<thead ><tr><td width="40%">Company Address:</td><td>{{$show->company_address}}</td></tr></thead>
<thead ><tr><td width="40%">Company Phone No:</td><td>{{$show->company_phone_primary}}</td></tr></thead>
<thead ><tr><td width="40%">Company Phone No #2:</td><td>{{$show->company_phone_secondary}}</td></tr></thead>
<thead ><tr><td width="40%">Company Email:</td><td>{{$show->company_email}}</td></tr></thead>
</table>
@endsection

