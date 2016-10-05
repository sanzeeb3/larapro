@extends('layouts.user')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
    <ul>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
        </li>

        <li>
            {{ Form::label('password', 'Confirm Password:') }}
            {{ Form::password('password_confirmation') }}
        </li>        

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone') }}
        </li>


        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@stop