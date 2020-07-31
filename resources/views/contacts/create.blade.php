@extends('static_pages.default')
@section('title', 'Create')
@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Add Contact</h5>
    </div>
    <div class="card-body">

        @include('shared._errors')
      <form method="POST" action="{{ route('contacts.store') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="name">First Name: </label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
          </div>

          <div class="form-group">
            <label for="name">Last Name: </label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
          </div>

          <div class="form-group">
            <label for="name">Mobile: </label>
            <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
          </div>

          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="email">Postcode</label>
            <input type="text" name="postcode" class="form-control" value="{{ old('postcode') }}">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@stop