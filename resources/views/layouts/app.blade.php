<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- title --}}
    <title>IFM Invetory Management System</title>

    {{-- fonts  --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @livewireStyles

    {{-- Styles  --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invetory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet">
</head>
<body>

    {{-- the top navigation here --}}
    <nav class="navbar navbar-expand-sm topNav navbar-dark shadow-sm">
        <a class="navbar-brand mr-2" href="#"> <img src="images/logo2.png" style="width: 35px" alt=""> IFM Invetory</a>
            
        <form class="form-inline my-2 d-none d-md-block d-sm-none my-lg-0" action="{{url('search')}}"  method="POST">
            @csrf
            <input class="form-control mr-sm-2" type="text" placeholder="Search device.." name="search">
            <button class="btn btn-outline-secondary text-white my-2 my-sm-0" type="submit">Search </button>
        </form>

    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

           
            @if(session()->get('user')['status'] == "admin")
            <li class="nav-item {{request()->is('/')?'active':''}}">
                <a class="nav-link" href="/"><i class="mdi mdi-speedometer"></i>  Dashboard </a>
                {{-- <span class="sr-only">(current)</span> --}}
            </li>
            <li class="nav-item {{request()->is('users') ? 'active': ''}}">
                <a class="nav-link" href="/users"><i class="mdi mdi-account-multiple"></i>  Users</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{request()->is('addItem') ? 'active': ''}}" href="/addIte" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-database-plus"></i> Add New</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/addItem"><i class="mdi mdi-database-plus-outline"></i> Device</a>
                    <a class="dropdown-item" href="/newUser"><i class="mdi mdi-account-multiple-plus-outline"></i> Users</a>
                    <a class="dropdown-item" href="/cartegory"><i class="mdi mdi-format-list-bulleted"></i>Cartegory</a>
                </div>
            </li>
            
            <li class="nav-item {{request()->is('devices*')?'active':''}}">
                <a class="nav-link" href="/devices"><i class="mdi mdi-memory "></i> Devices</a>
            </li>
            
            <li class="nav-item {{request()->is('allocations')?'active':''}}">     
                    <a class="nav-link" href="{{url('allocations')}}"><i class="mdi mdi-account-cog-outline"></i> Re-Allocations</a>
                     
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account-circle"></i> Admin</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/profile"><i class="mdi mdi-account-cog-outline"></i> My Profile</a>
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout"></i> Logout</a>
                </div>
            </li>

            @endif

            @if(session()->get('user')['status']=="viewer")
            <li class="nav-item {{request()->is('wellcome*')?'active':''}}">
                <a class="nav-link" href="/wellcome"><i class="mdi mdi-speedometer"></i>  Home </a>
            </li>
            <li class="nav-item {{request()->is('devices*')?'active':''}}">
                <a class="nav-link" href="/devices"><i class="mdi mdi-memory "></i> Devices</a>
            </li>
            <li class="nav-item {{request()->is('allocations*') ? 'active': ''}}">
                <a class="nav-link" href="/allocations"><i class="mdi mdi-autorenew"></i>  Re-Allocation</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account-circle"></i> Viewer</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/profile"><i class="mdi mdi-account-cog-outline"></i> My Profile</a>
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout"></i> Logout</a>
                </div>
            </li>
            @endif

            @if(session()->get('user')['status'] == "manager")
          
            <li class="nav-item {{request()->is('wellcome*')?'active':''}}">
                <a class="nav-link" href="/wellcome"><i class="mdi mdi-speedometer"></i>  Home </a>
            </li>
            <li class="nav-item {{request()->is('devices*')?'active':''}}">
                <a class="nav-link" href="/devices"><i class="mdi mdi-memory "></i> Devices</a>
            </li>

            <li class="nav-item {{request()->is('allocations*') ? 'active': ''}}">
                <a class="nav-link" href="/allocations"><i class="mdi mdi-autorenew"></i>  Re-Allocation</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{request()->is('addItem') ? 'active': ''}}" href="/addIte" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-database-plus"></i> Add New</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/addItem"><i class="mdi mdi-database-plus-outline"></i> Device</a>
                    <a class="dropdown-item" href="/cartegory"><i class="mdi mdi-format-list-bulleted"></i>  Cartegory</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-account-circle"></i> Manager</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="/profile"><i class="mdi mdi-account-cog-outline"></i> My Profile</a>
                    <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout"></i> Logout</a>
                </div>
            </li>
            @endif

        </ul>
    </div>
    </nav>
    {{-- end of the navigation bar here --}}
   
    
    {{-- search modal here --}}
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search Device Here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline my-lg-0" action="search" method="POST">
                        <div class="input-group">
                           <input type="text" name="search" id="" class="form-control">
                            <button class="btn topNav text-white" type="submit">search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end of the modal search here --}}

    {{-- all of the users pages will be yield here --}}
    {{-- includes the pages for devices  --}}
    {{-- both admin and users pages --}}
    {{-- ---------------------------------------------- --}}
                 @yield('pages')
     {{-- --------------------------------------- --}}
    {{-- end of page yielding contents --}}

    {{-- footer here --}}
        <div class="container">
            <div class="row d-flex justify-content-center sticky-bottom mt-5">
                <p class="text-ifm">IFM Invetory Management System 2021</p>
            </div>
        </div>
    {{-- end of footer here --}}

    @livewireScripts
    {{-- script  --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
