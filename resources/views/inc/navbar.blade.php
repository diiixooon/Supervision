<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @if (Auth::guard('web')->check())
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @elseif(Auth::guard('supervisor')->check())
                <a class="navbar-brand" href="{{ url('/supervisor') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @endif
            
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            {{-- Supervisor only --}}
            <ul class="nav navbar-nav">
                @if (Auth::guard('supervisor')->check())
                <li class="nav-item">
                    <a href="/studentlists">Student List</a>
                </li>
                <li class="nav-item">
                    <a href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="/approve">Approval</a>
                </li>
                @endif

                {{-- Student only --}}
                @if (Auth::guard('web')->check())
                <li class="nav-item">
                    <a href="/userprofile">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="/upload">Approval</a>
                </li>
                @endif
                
                @if (Auth::guard('web')->check() || Auth::guard('supervisor')->check())
                
                <li class="nav-item">
                    <a href="/discussion">Discussion</a>
                </li>
                @endif
                
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (!Auth::guard('supervisor')->check() || !Auth::guard('supervisor')->check())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @if (Auth::guard('web')->check())
                                {{ Auth::user()->name }} <span class="caret"></span>   
                            @endif
                            @if (Auth::guard('supervisor')->check())
                                {{ Auth::guard('supervisor')->user()->name }} <span class="caret"></span>
                            @endif
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @if (Auth::guard('web')->check())
                                    <a href="/userprofile">profile</a>
                                @endif
                                @if (Auth::guard('supervisor')->check())
                                    
                                @endif
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>