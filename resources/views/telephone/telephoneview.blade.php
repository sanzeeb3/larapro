@extends('telephone.main')
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

@if ( session()->has('message') )
    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
@endif
<h2> List of all telephone numbers:</h2>
Not yours in the list? <a href="{{url('/telephone/addview')}}">Add now.</a><br><br>
 <form method="POST" action="{{url('/telephone/search')}}">
 {!! csrf_field() !!}
<input type="text" name="search" placeholder="Name or Telephone no." required>
<input type="submit" class="btn-btn-default" value="search"></form>
<br><BR>
<table border='1' class='table table-hover table-striped'>
<thead style='background-color:silver'><tr><td>S.N.</td><td>Name</td><td>Telephone No.</td><td>Mobile No.</td><td width="24%">Options</td></tr></thead>

@foreach ($lists as $li)
<tr><td><?php $i++;?>{{$i}}</td><td>{{$li->Name}}</td><td>{{$li->Telephone}}</td><td>{{$li->Mobile}}</td>
<td><a href="{{url("/telephone/show/{$li->id}")}}"><button>View details</button></a>
<a href="{{url("/telephone/edit/{$li->id}")}}"><button>Edit</button></a>
<a href="{{url("/telephone/delete/{$li->id}")}}"><button>Delete</button></a></td></tr>
@endforeach
{!! $lists->render() !!}

</div>

</div>
@endsection
