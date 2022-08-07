<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{__('dictionary.FIND_YOUR_PRODUCT')}}</title>


    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>



    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Styles -->

</head>
<body>



    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('index')}}"><i class="far fa-building"></i></a>
            <a class="navbar-brand" href="{{route('index')}}">Slando</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link {{Request::is('/')?'active-1':''}}" href="{{route('index')}}">{{__('dictionary.main')}} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('stores/index')?'active-1':''}}" href="{{route('stores.index')}}">{{__('dictionary.stores')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{Request::is('products*')?'active-1':''}}" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Товари
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item {{Request::is('products')?'active-1':''}}" href="{{route('products.index')}}">{{__('dictionary.products')}}</a>
                            <a class="dropdown-item {{Request::is('products/add')?'active-1':''}}" href="{{route('products.add')}}">{{__('dictionary.add_products')}}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{Request::is('users*')?'active-1':''}}" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Користувачі
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item {{Request::is('users')?'active-1':''}}" href="{{route('users.index')}}">{{__('dictionary.users')}}</a>
                            <a class="dropdown-item {{Request::is('users/add')?'active-1':''}}" href="{{ route('register') }}">{{__('dictionary.add_users')}}</a>
                        </div>
                    </li>
                    @if(Auth::user() && Auth::user()->role=='ADMIN')
                    <li class="nav-item">
                        <a class="nav-link {{Request::is('users/adminPanel')?'active-1':''}}" href="{{route('admin')}}">AdminPanel</a>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="dropdown">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{__('dictionary.login')}}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{__('dictionary.register')}}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{__('dictionary.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

    </header>
    <!-- <a href="{{route('pars')}}">pars</a><br> -->

    @yield('content')

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="{{route('index')}}">{{__('dictionary.on_main')}}</a>
            </p>
            <p>Copyright © Example.com 2018</p>
        </div>
    </footer>


</body>
</html>
