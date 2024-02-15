<nav class="navbar navbar-expand-lg border bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Letters</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('letters.create') }}">Create Letter</a>
          </li>
        </ul>
        @if( strlen(Auth::user()?->name)>0)
            <div class="d-flex">
              <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i> {{ Auth::user()?->name }}
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                    </li>
                    <li>
                      <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" onclick="return confirm('Are You Sure you want to logout?')" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>          
            </div> 
        @else
            <div class="d-flex">
              <a class="btn btn-primary" href="{{ route('register') }}">Register</a>&nbsp;
              <a class="btn btn-success me-2" href="{{ route('login') }}">Login</a>
            </div>
        @endif
      </div>
    </div>
</nav>