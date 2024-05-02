@include('Backend.includes.head')


@include('Backend.includes.sidebar')

<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('Backend.includes.nav')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update User Account</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="{{route('update_account', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputName1">Account Number</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="acc_number" name="acc_number" value="{{$user->acc_number}}" readonly style="background:none; outline:none; color:red">

                                @error('acc_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Balance</label>
                                <input type="number" class="form-control" id="exampleInputName1" placeholder="amount" name="amount" required value="{{$user->amount}}" style="background:none; outline:none; color:red">

                                @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Update Title</label>
                                <select name="title" id="" class="form-control">
                                    <option value="{{$user->title}}">{{$user->title}}</option>
                                    <option value="Master">Master</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Other">Other</option>
                                    <!-- <option value=""></option> -->
                                </select>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">Firts Name</label>
                                <input type="text" min="0" name="first_name" id="first_name" placeholder="Enter First Name" class="form-control" value="{{$user->fname}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Last Name</label>
                                <input type="text" min="0" name="last_name" id="last_name" placeholder="Enter Last Name" class="form-control" value="{{$user->lname}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Email</label>
                                <input type="email" min="0" name="email" id="email" placeholder="Email" class="form-control" value="{{$user->email}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Phone Number</label>
                                <input type="phone" min="0" name="phone" id="phone" placeholder="Phone Number" class="form-control" value="{{$user->phone}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="dob">Date Of Birth</label>
                                <input type="date" min="0" name="dob" id="dob" class="form-control" style="font-family: Arial,  Helvetica, sans-serif;" value="{{$user->dob}}">

                                @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Select Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="{{$user->gender}}">{{$user->gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                    <!-- <option value=""></option> -->
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">Next Of Kin</label>
                                <input type="text" min="0" name="next_kin" id="next_kin" placeholder="Next Of Kin" class="form-control" value="{{$user->next_kin}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('next_kin')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="reg-label" for="image">Select Account Type</label>
                                <select name="account_type" id="" class="form-control">
                                    <option value="{{$user->acc_type}}">{{$user->acc_type}}</option>
                                    <option value="Saving Acount">Fixed Acount</option>
                                    <option value="Saving Acount">Saving Acount</option>
                                    <option value="Current Account">Current Account</option>

                                    <option value="Business Account">Business Account</option>
                                    <option value="Checking Account">Checking Account</option>
                                    <option value="Checking Account">Non Resident Account</option>
                                    <option value="Checking Account">Cryptocurrency Account</option>

                                    <option value="Self Bound Fixed Deposit Account">Self Bound Fixed Deposit Account</option>
                                    <!-- <option value=""></option> -->
                                </select>

                                @error('account_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">Address</label>
                                <input type="text" value="{{$user->address}}" min="0" name="address" id="address" placeholder="Enter Your Address" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">City</label>
                                <input type="text" value="{{$user->city}}" min="0" name="city" id="city" placeholder="Enter Your City" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">Country</label>
                                <input type="text" min="0" value="{{$user->country}}" name="country" id="country" placeholder="Enter Your Country" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="reg-label" for="image">Zip Code</label>
                                <input type="text" min="0" value="{{$user->zip_code}}" name="zip_code" id="zip_code" placeholder="Enter Valid Zip Code" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <img src="../frontend/assets/uploads/{{$user->image}}" alt="faveicon" width="100px">
                                <br>
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

                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Update Account</button>
                            <!-- <button class="btn btn-dark">Cancel</button> -->
                        </form>
                    </div>
                </div>
            </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('Backend.includes.footer')
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('backend/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('backend/assets/js/misc.js') }}"></script>
<script src="{{ asset('backend/assets/js/settings.js') }}"></script>
<script src="backend/assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
</body>

</html>