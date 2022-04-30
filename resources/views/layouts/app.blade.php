<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="{{ asset('css/cms.css') }}" rel="stylesheet">
    @toastr_css

    @yield('style')
</head>
<body>
<div id="app">



    <input type="checkbox"   id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brande">
                <img id="logo" src="{{asset('images/site/logo2.png')}}" alt=""    height="38px;">
            </h3>

            <lable for="sidebar-toggle" class="ti-menu-alt pointer" onclick="document.getElementById('sidebar-toggle').checked = !document.getElementById('sidebar-toggle').checked;if(document.getElementById('sidebar-toggle').checked) {document.getElementById('logo').style.cssText='display:none;';document.getElementById('nav-header').style.cssText='  width: calc(100% - 60px);'; }else {document.getElementById('logo').style.cssText='display:block;';document.getElementById('nav-header').style.cssText='  width: calc(100% - 240px);';}"></lable>
        </div>
        <div class="sidebar-menu">
            <ul>

                   <li>
                        <a href="#">
                            <span class="ti-stats-up text-primary b"></span>
                            <span>Dashboard</span>

                        </a>
                    </li>


                    <li>
                        <a href="#">
                            <span class="ti-layers-alt text-secondary b"></span>
                            <span>Manage Roles</span>

                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ti-user text-danger b"></span>
                            <span>users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="ti-home text-success b"></span>
                            <span>Home Screen</span>

                        </a>
                    </li>


                    <li>
                        <a href="#">
                            <span class="ti-align-left text-warning b"></span>
                            <span>Categories</span>
                        </a>
                    </li>

                <li>
                    <a href="#">
                        <span class="ti-shopping-cart  text-danger b"></span>
                        <span>Stores</span>
                    </a>
                </li>
                   <li>
                        <a href="#">
                            <span class="ti-layers-alt  text-success b"></span>
                            <span>trending</span>
                        </a>
                    </li>





                    <li>
                        <a href="#">
                            <span class="ti-time b" style="color: #f66d9b"></span>
                            <span>Towers</span>
                        </a>
                    </li>
                <li>
                        <a href="#">
                            <span class="ti-announcement b" style="color: #6574cd;"></span>
                            <span>Notification Center</span>
                        </a>
                    </li>
                <li>
                    <a href="#">
                        <span class="ti-pie-chart b" style="color: #009688;"></span>
                        <span>AD Center</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="ti-agenda  b" style="color: #ff5722;"></span>
                        <span>Reports</span>
                    </a>
                </li>

                   <li>
                        <a href="#">
                            <span class="ti-settings"></span>
                            <span>Settings</span>
                        </a>
                    </li>
                <li>
                    <a href="#">
                        <span class="ti-shift-right"></span>
                        <span>

                             <span onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"  >  Logout  </span>


                        </span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-content">
        <cheader id="nav-header">
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
            <div class="social-icons">
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>

                <span>   {{ Auth::user()->name }}</span>
                &nbsp;&nbsp;
                <button onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="btn btn-light btn-sm logout-btn">  Logout  <span    class="ti-shift-right-alt"></span></button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </cheader>
        <main>

            @yield('content')
        </main>
    </div>


</div>

@jquery
@toastr_js
@toastr_render

@yield('scripts')

</body>
</html>
