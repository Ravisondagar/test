@extends('layouts.home')
@section('content')

  {!! Former::open()->action(route('users.store'))->class('container')->method('post') !!}
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
      <option value="ahmedabad">Ahmedabad</option>
      <option value="surat">surat</option>
      <option value="rajkot">Rajkot</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">select state</label>
    <select class="form-control" name="state" id="exampleFormControlSelect1">
      <option value="gujarat">Gujarat</option>
      <option value="rajsthan">Rajsthan</option>
      <option value="panjab">Panjab</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
    <select class="form-control" name="country" id="exampleFormControlSelect1">
      <option value="india">india</option>
      <option value="us">Us</option>
      <option value="canada">Canada</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">dob</label>
    <input type="date" class="form-control" name="dob" id="exampleFormControlInput1" placeholder="">
  </div>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      Hobby
    </label><br>
    @foreach($hobbies as $key => $hobby)
    <input class="form-check-input" type="checkbox" value="{!! $hobby !!}" name="hobby[]" id="defaultCheck1">{!! $key !!}
    @endforeach
  </div><br>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      Status
    </label>
    <input type="hidden" name="status" value="0">
    <input class="form-check-input" type="checkbox" value="1" name="status" id="defaultCheck1">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
{!! Former::close() !!}
@endsection