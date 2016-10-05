@extends('layouts.user')
@section('title','larapro')
@section('main')

<center>
THE INDIVIDUAL RECORD:
<table border='1'>
<tr><th>Name</th><th>{{$users->name}}</th></th></tr>
<tr><th>ID</th><th>{{$users->id}}</th></tr>
<tr><th>Email</th><th>{{$users->email}}</th></tr>
<tr><th>Phone</th><th>{{$users->phone}}</th></tr>

</table>
</center>
@stop