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
    @toastr_css

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('css/'.auth()->user()->theme) }}">
    @yield('style')
</head>
<body>
<div id="app">

    <div class="sidebar  ">
        <div class="logo-details">

            <i class='bx bx-cart'></i>
            <span class="logo_name">{{env('APP_NAME')}}</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="{{route('admin.roles.index')}}">
                        <i class='bx bx-link-alt'></i>
                        <span class="link_name">Roles</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Roles</a></li>
                    <li><a href="{{route('admin.roles.create')}}">create role</a></li>
                    <li><a href="{{route('admin.roles.index')}}">roles</a></li>

                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="{{route('admin.users.index')}}">
                        <i class='bx bxs-user'></i>
                        <span class="link_name">Users</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('admin.users.index')}}">Users</a></li>
                    <li><a href="{{route('admin.users.create')}}">Create User</a></li>
                    <li><a href="{{route('admin.users.index')}}">All Users</a></li>
                    <li><a href="#">Top user </a></li>

                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="{{route('admin.markets.index')}}">
                        <i class='bx bx-collection' ></i>
                        <span class="link_name">Markets</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="{{route('admin.markets.index')}}">Markets</a></li>
                    <li><a href="{{route('admin.markets.create')}}">Create Market</a></li>
                    <li><a href="{{route('admin.markets.index')}}">All Markets</a></li>
                </ul>
            </li>



            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-book-alt' ></i>
                        <span class="link_name">Orders</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Orders</a></li>
                    <li><a href="#">all orders</a></li>
                </ul>
            </li>



            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-chat'></i>
                        <span class="link_name">Chats &nbsp;&nbsp;&nbsp; <span class="badge badge-light theme-text-color badge-pill">35</span> </span>

                    </a>

                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Chats</a></li>
                </ul>
            </li>


            <li>
                <a href="#">
                    <i class='bx bxs-bell'></i>
                    <span class="link_name">Notifications  &nbsp;&nbsp;&nbsp; <span class="badge badge-light theme-text-color badge-pill">14</span> </span>

                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Notifications</a></li>

                </ul>
            </li>


            <li>
                <a href="#">
                    <i class='bx bx-history'></i>
                    <span class="link_name">History</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">History</a></li>
                </ul>
            </li>


            <li>
                <a href="{{route('admin.settings.index')}}">
                    <i class='bx bx-cog' ></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('admin.settings.index')}}">Setting</a></li>
                </ul>
            </li>


            <li>
                <div class="profile-details">
                    <a href="{{route('admin.users.profile')}}" style="text-decoration: none;">


                    <div class="profile-content">
                        <img src="{{asset(auth()->user()->image)}}" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name user_profile_name">{{ substr(auth()->user()->name, 0, 8).'..' }}</div>
                        <div class="job">{{auth()->user()->role->name}}</div>
                    </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <i class='bx bx-log-out' onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" ></i>
                </div>
            </li>

        </ul>
    </div>
    <section class="home-section">
        <div class="home-content  ">

                <i class='bx bx-menu' ></i>
                <span class="text user_profile_name">{{auth()->user()->name}}</span>


        </div>

        @yield('content')



    </section>


</div>

@jquery
@toastr_js
@toastr_render
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@yield('scripts')
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");

    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close-side");
    });



</script>

<script>
    function replaceText(obj) {
        if(obj.files.length === 0){
            let status=document.getElementById("upload-status");
            status.innerHTML = '<p id="upload-status"> <i class="bx bx-image-add"  style="font-size: 21px;"></i>  attach image  </p>' ;
            document.getElementById('upload-custom').classList.remove('upload-active');
            return;
        }
        var file = obj.value;
        var fileName = file.split("\\");
        let status=document.getElementById("upload-status");

        //file size
        var _size = obj.files[0].size;
        var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
            i=0;while(_size>900){_size/=1024;i++;}
        var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];


        status.innerHTML = '<span class="ti-file"></span>'+' '+ fileName[fileName.length - 1] + ' - '+exactSize;
        console.log(fileName);
        document.getElementById('upload-custom').classList.add('upload-active');

    }
</script>
</body>
</html>
