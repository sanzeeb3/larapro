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
    <h2>Enter your details</h2><br>
    <form method="POST" action="{{url('/telephone/add')}}" role="form" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                             <label>Upload your photo:</label><input type="file" name="image" ><br>
                            <input type="name" name="name" id="name" placeholder="Name" required><br><br>
                            <input type="text" name="address" placeholder="Address"><br><br>
                            <input type="text" name="telephone" placeholder="Telephone number" required>
                            <input type="text" name="mobile" placeholder="Mobile number" >  <br><br>
                            <input type="email" name="email" placeholder="Email">
                            <input type="email" name="altemail" placeholder="Alternative Email"><br><BR>
                            <input type="text" name="company_name" placeholder="Company Name"><br><BR>
                            <input type="text" name="company_address" placeholder="Company Address"><br><br>
                            <input type="text" name="company_phone_primary" placeholder="Company Telephone">    <input type="text" name="company_phone_secondary" placeholder="Telephone Secondary "><br><br>
                            <input type="text" name="company_email" placeholder="Company Email Address"><br><BR>
                            <button type="submit" class="btn btn-default">Submit</button><BR><BR>
                            </form>                    
 
@endsection