@include('Frontend.includes.header')
<!-- End header -->

@include('Frontend.includes.nav')
<!-- End Navbar Area -->

<!-- Start Page Title Area -->
<div class="page-title-area item-bg1 jarallax" data-jarallax="{" speed": 0.3}">
    <div class="container">
        <div class="page-title-content">
            <div class="logo white-logo">

                <a href="/">@foreach($utilities as $item)
                    <img src="frontend/assets/uploads/{{$item->whiteLogo}}" width="200px" alt="logo">
                    @endforeach</a>
            </div>
            <div class="bar"></div>
            <h5 style="color:white">- USER LOGIN -</h5>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Login Area -->
<section class="login-area">
    <div class="row m-0" style="justify-content: center; align-items:center;">
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">

                            <form method="POST" action="{{route('loginUser')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="number" min="0" name="acc_number" id="acc_number" placeholder="Your Account Number" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Your password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Login</button>

                                <div class="forgot-password" style="display: flex; justify-content:space-between">
                                    <a href="{{url('forgot-password')}}">Forgot Password</a>

                                    <a href="{{route('custormer_register')}}">New here? Register</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

@include('Frontend.includes.footer')
<!-- End Footer Area -->