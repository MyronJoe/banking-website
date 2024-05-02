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
            <h5 style="color:white">- LET'S GET STARTED -</h5>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Login Area -->
<section class="login-area">

    <div class="row m-0 register" style="justify-content: center; align-items:center;">
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content register">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
                            <form method="POST" action="{{route('store_user')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="reg-label" for="image">Select Title</label>
                                    <select name="title" id="" class="form-control">
                                        <option value="{{old('title')}}">{{old('title')}}</option>
                                        <option value="Master">Master</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Other">Other</option>
                                        <!-- <option value=""></option> -->
                                    </select><br>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">Firts Name</label>
                                    <input type="text" min="0" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{old('first_name')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Last Name</label>
                                    <input type="text" min="0" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{old('last_name')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Email</label>
                                    <input type="email" min="0" name="email" id="email" placeholder="Email" class="form-control" value="{{old('email')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Phone Number</label>
                                    <input type="phone" min="0" name="phone" id="phone" placeholder="Phone Number" class="form-control" value="{{old('phone')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="dob">Date Of Birth</label>
                                    <input type="date" min="0" name="dob" id="dob" class="form-control" style="font-family: Arial,  Helvetica, sans-serif;" value="{{old('dob')}}">

                                    @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Select Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="{{old('gender')}}">{{old('gender')}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                        <!-- <option value=""></option> -->
                                    </select><br>
                                    @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">Next Of Kin</label>
                                    <input type="text" min="0" name="next_kin" id="next_kin" placeholder="Next Of Kin" class="form-control" value="{{old('next_kin')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('next_kin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Select Account Type</label>
                                    <select name="account_type" id="" class="form-control">
                                        <option value="{{old('account_type')}}">{{old('account_type')}}</option>
                                        <option value="Saving Acount">Saving Acount</option>
                                        <option value="Current Account">Current Account</option>

                                        <option value="Business Account">Business Account</option>
                                        <option value="Checking Account">Checking Account</option>
                                        <option value="Checking Account">Non Resident Account</option>
                                        <option value="Checking Account">Cryptocurrency Account</option>

                                        <option value="Self Bound Fixed Deposit Account">Self Bound Fixed Deposit Account</option>
                                        <!-- <option value=""></option> -->
                                    </select><br>

                                    @error('account_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">Address</label>
                                    <input type="text" value="{{old('address')}}" min="0" name="address" id="address" placeholder="Enter Your Address" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">City</label>
                                    <input type="text" value="{{old('city')}}" min="0" name="city" id="city" placeholder="Enter Your City" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">Country</label>
                                    <input type="text" min="0" value="{{old('country')}}" name="country" id="country" placeholder="Enter Your Country" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="reg-label" for="image">Zip Code</label>
                                    <input type="text" min="0" value="{{old('zip_code')}}" name="zip_code" id="zip_code" placeholder="Enter Valid Zip Code" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('zip_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Passport</label>
                                    <input type="file" min="0" name="image" id="image" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Your Password" class="form-control">

                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="reg-label" for="image">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="password" placeholder="Confirm Your Password" class="form-control">

                                    @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Create Account</button>

                                <div class="forgot-password">
                                    <a href="{{route('login')}}">Already have an account? Sign In</a>
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