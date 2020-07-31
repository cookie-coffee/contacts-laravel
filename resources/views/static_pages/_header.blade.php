<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Contacts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::segment(1) === 'contacts' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('contacts.index') }}">List</a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'create' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('create') }}">Add Contact</a>
      </li>
    </ul>
   
  </div>
</nav>