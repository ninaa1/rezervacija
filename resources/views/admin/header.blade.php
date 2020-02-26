<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('movies.index')}}">Movies<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('halls.index')}}">Halls<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('screenings.index')}}">Screening<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('seats.index')}}">Seat<span class="sr-only">(current)</span></a>
      </li>
      @if(Auth::user()->role->name == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="{{route('movies.create')}}">Add movie <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('halls.create')}}">Add Hall<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('screenings.create')}}">Add screening<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('seats.create')}}">Add seat<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      @endif
        <a class="nav-link" href="{{route('admin.reservations')}}">Reservations<span class="sr-only">(current)</span></a>
      </li>
      @if(Auth::user()->role_id === 4)
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.users')}}">Korisnici</a>
      </li>
      @endif

      <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>

      </li>
    </ul>
  </div>
</nav>