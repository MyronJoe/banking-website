<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

                @foreach($utilities as $item)
                <a href="/"><img src="../frontend/assets/uploads/{{$item->whiteLogo}}" width="180px" alt="logo"></a>
                @endforeach
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="{{asset('backend/assets/images/faces/face15.jpg')}}" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
                                <span>{{Auth::user()->email}}</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-flex d-lg-none search" method="GET" action="{{route('search')}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Go</button type="submit">
                        <input type="text" class="form-control" name="search" placeholder="Search products">
                    </form>
                </li>

                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('home')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Accounts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('all_accounts')}}">All Accounts</a></li>

                            <li class="nav-item"> <a class="nav-link" href="{{route('register-account')}}">Create Acount</a></li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Sections</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('hero_setting')}}"> Hero </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('all_messages')}}"> Banner </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('all_messages')}}"> About-Us </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('all_messages')}}"> Services </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('all_messages')}}"> Testimonial </a></li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item nav-category">
                    <span class="nav-link">Transaction Section</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('all_transaction')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Transactions</span>
                    </a>
                </li>

                <li class="nav-item nav-category">
                    <span class="nav-link">Site Section</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('site_setting')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Site Settings</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('all_messages')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Messages</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('create_admin')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Create Admin</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{route('all_admin')}}">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">All Addmin</span>
                    </a>
                </li>

            </ul>
        </nav>