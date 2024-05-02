<body>
    <div class="preloader">
        <div class="loader">
            <div class="shadow"></div>
            <div class="box"></div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="luvion-responsive-nav">
            <div class="container">
                <div class="luvion-responsive-menu">
                    <div class="logo">
                        <a href="/">
                            @foreach($utilities as $item)
                            <img src="frontend/assets/uploads/{{$item->whiteLogo}}" width="150px" alt="logo">
                            <img src="frontend/assets/uploads/{{$item->blackLogo}}" width="150px" alt="logo">
                            @endforeach
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="luvion-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/">
                        @foreach($utilities as $item)
                        <img src="frontend/assets/uploads/{{$item->whiteLogo}}" width="180px" alt="logo">
                        <img src="frontend/assets/uploads/{{$item->blackLogo}}" width="180px" alt="logo">
                        @endforeach
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link active">Home</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link active">Investment Hub <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('wealth')}}" class="nav-link">Wealth Management</a></li>

                                    <li class="nav-item"><a href="{{route('investment')}}" class="nav-link">Investment Bank</a></li>
                                    <li class="nav-item"><a href="{{route('investment_option')}}" class="nav-link">Investment options</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('services')}}" class="nav-link active">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('about')}}" class="nav-link active">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contact')}}" class="nav-link active">Contact Us</a>
                            </li>
                            
                            

                            @if (Route::has('login'))
                            @auth
                            @if(Auth::user()->user_type == 0)
                            <li class="nav-item"><a href="{{route('my_dashboard')}}" class="nav-link active">Dashboard</a></li>
                            @else
                            <li class="nav-item"><a href="{{route('home')}}" class="nav-link active">Dashboard</a></li>
                            @endif
                            @endauth
                            @endif

                        </ul>

                        <div class="others-options">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{route('logout')}}" class="login-btn"><i class="flaticon-user"></i> Logout</a>
                            @else
                            <a href="{{route('login')}}" class="login-btn"><i class="flaticon-user"></i> LogIn</a>
                            @endauth
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')