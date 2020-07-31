@extends('static_pages.default')
@section('title', 'Edit Contact')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Edit Contact</h5>
    </div>
      <div class="card-body">

        @include('shared._errors')

        <form method="POST" action="{{ route('contacts.update', $contact->id )}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">First Name: </label>
              <input type="text" name="first_name" class="form-control" value="{{ $contact->first_name }}">
            </div>

            <div class="form-group">
                <label for="name">First Name: </label>
                <input type="text" name="last_name" class="form-control" value="{{ $contact->last_name }}">
            </div>

            <div class="form-group">
                <label for="name">Mobile: </label>
                <input type="text" name="mobile" class="form-control" value="{{ $contact->mobile }}">
            </div>

            <div class="form-group">
              <label for="email">Email：</label>
              <input type="text" name="email" class="form-control" value="{{ $contact->email }}">
            </div>

            <div class="form-group">
                <label for="email">Postcode：</label>
                <input type="text" name="postcode" class="form-control" value="{{ $contact->postcode }}">
              </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
  </div>
</div>
@stop