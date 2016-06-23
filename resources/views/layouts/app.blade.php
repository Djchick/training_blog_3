<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    @include('layouts.css')
    @include('layouts.js')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top nav-remove-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">{{ trans('user/titles.menu') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">{{ trans('user/titles.home') }}</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('getLogin') }}">{{ trans('user/labels.login') }}</a></li>
                        <li><a href="{{ route('getRegister') }}">{{ trans('user/labels.register') }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-book"></i>{{ trans('entry/labels.my_entry') }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('entry.index') }}">
                                        <i class="fa fa-btn fa-clone"></i>{{ trans('entry/labels.list_entry') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('entry.create') }}">
                                        <i class="fa fa-btn fa-edit"></i>{{ trans('entry/labels.page_add_entry') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('user.show', Auth::user()->id) }}">
                                        <i class="fa fa-btn fa-user"></i>{{ trans('user/labels.user_info') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <i class="fa fa-btn fa-sign-out"></i>{{ trans('user/labels.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    
</body>
</html>