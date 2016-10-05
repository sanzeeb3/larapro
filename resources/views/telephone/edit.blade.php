
@extends('telephone.main')

@section('content')       

 <div class="col-sm-10">
@if ( session()->has('message') )
    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
@endif

  @if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                 <h2>Edit your details:</h2><br>
                            <form method="POST" action="{{url("/telephone/update/{$edit->id}")}}" role="form" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                 <label>Change Your Photo?</label><input type="file" name="image"  ><br>
                         
                            <input type="name" name="name" id="name" placeholder="Name"required value="{{$edit->Name}}"><br><br>
							<input type="text" name="address" placeholder="Address" value="{{$edit->Address}}"><br><br>
                            <input type="text" name="telephone" placeholder="Telephone number" value="{{$edit->Telephone}}"required>
							<input type="text" name="mobile" placeholder="Mobile number" value="{{$edit->Mobile}}">	<br><br>
     						<input type="email" name="email" placeholder="Email" value="{{$edit->Email}}">
							<input type="email" name="altemail" placeholder="Alternative Email" value="{{$edit->altemail}}"><br><BR>
							<input type="text" name="company_name" placeholder="Company Name" value="{{$edit->company_name}}"><br><BR>
							<input type="text" name="company_address" placeholder="Company Address" value="{{$edit->company_address}}"><br><br>
                            <input type="text" name="company_phone_primary" placeholder="Company Telephone" value="{{$edit->company_phone_primary}}">    
							<input type="text" name="company_phone_secondary" placeholder="Telephone Secondary " value="{{$edit->company_phone_secondary}}"><br><br>
                            <input type="email" name="company_email" placeholder="Company Email Address" value="{{$edit->company_email}}"><br><br>
  
							<button type="submit" class="btn btn-default">Update</button><BR><BR>
                    
</form>
@endsection