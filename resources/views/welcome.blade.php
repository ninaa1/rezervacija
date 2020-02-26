<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    </head>
    <body>
    <ul>
    <!-- Authentication Links -->
    @if(isset(Auth::user()->name))
        @if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'moderator')
        <li><a href="{{route('admin.index')}}" class="nav-item">Administration</a></li>
        @endif
    @endif
    @guest
        <li class="nav-item">
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item">
            <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li class="nav-item">
            <a href="{{ route('screenings') }}">Screenings</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.reservations') }}">Reservations</a>
        </li>
    @endguest
    <li><a href="#">Vizija</a></li>
    <li><a class="active"  href="#home">Početna</a></li>

  </ul>


<!-- <div class="hero-image" style="height: 300px"> 
  <div class="hero-text">
    <form>
 </form>
   
  </div>
</div>

<div id="footer"> -->

@yield('content')
 
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
