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
      <option value="rajstham">Rajsthan</option>
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
    <input class="form-check-input" type="checkbox" value="1" name="status" id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
      Status
    </label>
    <input type="hidden" name="status" value="0">
  </div>
  <div class="form-check">
    <label class="form-check-label" for="defaultCheck1">
      Hobby
    </label><br>
    <input class="form-check-input" type="checkbox" value="1" name="hobby[]" id="defaultCheck1">game
    <input class="form-check-input" type="checkbox" value="2" name="hobby[]" id="defaultCheck1">song
    <input class="form-check-input" type="checkbox" value="3" name="hobby[]" id="defaultCheck1">dancing
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
{!! Former::close() !!}
@endsection