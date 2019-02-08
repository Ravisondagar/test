@extends('layouts.home')
@section('content')
<table border="1">
	<th>name</th>
	<th>middale name</th>
	<th>last name</th>
	<th>email</th>
	<th>city</th>
	<th>state</th>
	<th>contry</th>
	<th>dob</th>
	<th>Hobby</th>
	<tr>
		<td>{!! $user->name !!}</td>
	</tr>
	<tr>
		<td>{!! $user->middale !!}</td>
	</tr>
	<tr>
		<td>{!! $user->last_name !!}</td>
	</tr>
	<tr>
		<td>{!! $user->city !!}</td>
	</tr>
	<tr>
		<td>{!! $user->state !!}</td>
	</tr>
	<tr>
		<td>{!! $user->contry !!}</td>
	</tr>
	<tr>
		<td>{!! $user->dob !!}</td>
	</tr>
	{{-- <tr>
		<td>@implode('',{!! $user->name !!})</td>
	</tr> --}}
	
</table>
@endsection