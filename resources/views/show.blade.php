@extends('layouts.home')
@section('content')
<div class="container">
	<h1 class="h1">User Details</h1>
	<table border="1" class="table table-striped table-bordered table-responsive">
		<tbody>
		<tr>
			<th scope="row">name</th>
			<td>{!! $user->name !!}</td>
		</tr>
		<tr>
			<th scope="row">middale name</th>
			<td>{!! $user->middlename !!}</td>
		</tr>
		<tr>
			<th scope="row">last name</th>
			<td>{!! $user->last_name !!}</td>
		</tr>
		<tr>
			<th scope="row">email</th>
			<td>{!! $user->email !!}</td>
		</tr>
		<tr>
			<th scope="row">dob</th>
			<td>{!! $user->dob !!}</td>
		</tr>
		<tr>
			<th scope="row">Hobby</th>
			<td>
				@foreach($user->hobbies as $hobby)
					{!! $hobby->name !!}
				@endforeach
			</td>
		</tr>
		<tr>
			<th scope="row">city</th>
			<td>{!! $user->city !!}</td>
		</tr>
		<tr>
			<th scope="row">state</th>
			<td>{!! $user->state !!}</td>
		</tr>
		<tr>
			<th scope="row">Country</th>
			<td>{!! $user->country !!}</td>
		</tr>
		</tbody>
	</table>
	<a href="{!! route('users.edit',$user->id) !!}" class="btn btn-primary btn-lg btn-block">Update</a><br>
	{!! Former::open()->action( URL::route("users.destroy",$user->id) )->method('delete')->class('form'.$user->id) !!}
		<a href="javascript:;" data-id="{{$user->id}}" class="btn btn-danger btn-lg btn-block submit">Delete</a>
	{!! Former::close() !!}
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).on('click','.submit',function(e){
		var r=$(this).data('id');
			e.preventDefault(this);
			swal({
					  title: "Are you sure?",
					  text: "Once deleted, you will not be able to recover this imaginary file!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					  if (willDelete) {	
					    $('.form'+r).submit();
					  } else {
					    //swal("Your imaginary file is safe!");
					    return false;
					  }
				});
	});
</script>
@endsection