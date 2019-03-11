<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('catalog')}}" style="color:#777"><img height="50" width="60" src="{{ url('imagenes/logo-patata.png')}}"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(!Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li>
                    <a class="nav-link" href="{{route('register')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Register
                        </a>
                    </li>
                    <li>
                    <a class="nav-link" href="{{route('login')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Login
                        </a>
                </li>
                </ul>

            </div>
        @endif
        @level(1)
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                   @level(5)
                    
                    <ul class="navbar-nav mr-auto">
 
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Gestiones de Administrador
                                        <i class="fas fa-caret-down"></i>
                                    </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <span>&#10010</span> Nueva película
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('users') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/users')}}">
                            Gestionar usuarios
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('formato/lista') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/formato/lista')}}">
                            Gestionar formatos
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('activity')}}">
                            Logs
                        </a>
                    </li>
                </ul>
                </li>
                    @endlevel
                    
                            {{-- Authentication Links --}}
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">@lang('laravelusers::app.nav.login')</a></li>
                                <li><a href="{{ route('register') }}">@lang('laravelusers::app.nav.register')</a></li>
                            @else
                                {{--<li><a href="{{ route('users') }}">@lang('laravelusers::app.nav.users')</a></li>--}}
                                <li class="dropdown">
                                    <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} 
                                        <i class="fas fa-caret-down"></i>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                @lang('laravelusers::app.nav.logout')
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
        @endlevel
    </div>
</nav>
