@extends('layouts.home')
@section('content')

  {!! Former::open()->action(route('users.update',$user->id))->class('container')->method('PATCH') !!}
  @csrf
  <div class="form-group">
    {!! Former::text('name')->class("form-control ") !!}
  </div>
  <div class="form-group">
    {!! Former::text('middlename')->class("form-control ") !!}
  </div>
  <div class="form-group">
    {!! Former::text('last_name')->class("form-control ") !!}
  </div>
  <div class="form-group">
    {!! Former::text('email')->class("form-control ") !!}
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">select city</label>
    <select class="form-control" name="city" id="exampleFormControlSelect1">
      <option value="ahmedabad" @if($user->city == 'ahmedabad') selected @endif>Ahmedabad</option>
      <option value="surat" @if($user->city == 'surat') selected @endif>surat</option>
      <option value="rajkot" @if($user->city == 'rajkot') selected @endif>Rajkot</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">select state</label>
    <select class="form-control" name="state" id="exampleFormControlSelect1">
      <option value="gujarat" @if($user->state == 'gujarat') selected @endif>Gujarat</option>
      <option value="rajsthan" @if($user->state == 'rajsthan') selected @endif>Rajsthan</option>
      <option value="panjab" @if($user->state == 'panjab') selected @endif>Panjab</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
    <select class="form-control" name="country" id="exampleFormControlSelect1">
      <option value="india" @if($user->country == 'india') selected @endif>india</option>
      <option value="us" @if($user->country == 'us') selected @endif>Us</option>
      <option value="canada" @if($user->country == 'canada') selected @endif>Canada</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">dob</label>
    <input type="date" class="form-control" value="{!! $user->dob !!}" name="dob" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      Hobby
    </label><br>
    @foreach($hobbies as $key => $hobby)
      <input class="form-check-input" type="checkbox" value="{!! $hobby !!}" name="hobby[]" @if(in_array($key, $user_hobby)) checked @endif>{!! $key !!}
    @endforeach
  </div><br>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      Status
    </label>
    <input type="hidden" name="status" value="0">
    <input class="form-check-input" type="checkbox" value="1" name="status" @if($user->status == 1) checked @endif>
  </div>
  <button type="submit" value="Update" class="btn btn-primary">Update</button>
{!! Former::close() !!}
@endsection