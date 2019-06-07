  <nav class="navbar navbar-expand-lg navbar-dark probootstrap_navbar" id="probootstrap-navbar" style="position:fixed;">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}"> 
              {{ config('app.name', 'DREAM-TRAVEL') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                      <li class="nav-item" ><a class=" dropdown-item btn btn-outline-light" href="/dream-travel/public/about">About</a></li>
                      <li class="nav-item"><a class= " dropdown-item btn btn-outline-light" href="/dream-travel/public/services">Services</a></li>
                      <li class="nav-item"><a class=" dropdown-item btn btn-outline-light" href="dream-travel/public/locations">Travel With Us</a></li>
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="dropdown-item btn btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="dropdown-item btn btn-outline-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="btn btn-outline-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
                         {{--  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                          </div> --}}
                          <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                              <a class="dropdown-item " href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <a class="dropdown-item" href="public/dashboard"> Dashborad</a>
                              
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>