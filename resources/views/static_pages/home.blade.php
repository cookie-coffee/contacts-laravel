@extends('static_pages.default')
@section('content')
<div class="jumbotron grey-panel-home">
    <h1>Contacts</h1>
    <div>
        <p>
        <a class="btn btn-lg btn-success" href="{{ route('create') }}" role="button">Add Contact</a>

        <a class="btn btn-lg btn-primary" href="{{ route('contacts.index') }}" role="button">Contact List</a>
        </p>
    </div>
</div>
@stop