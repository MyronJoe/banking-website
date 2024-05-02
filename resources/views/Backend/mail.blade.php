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
                        <h4 class="card-title">Send Mail</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="{{route('send_user_email', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                <label class="reg-label" for="image">Account Number</label>
                                <input type="number" min="0" name="account" id="account" placeholder="Account Number" class="form-control" value="{{old('account')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('account')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                           

                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Create Account</button>
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
<script src="backend/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="backend/assets/vendors/chart.js/Chart.min.js"></script>
<script src="backend/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="backend/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="backend/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="backend/assets/js/off-canvas.js"></script>
<script src="backend/assets/js/hoverable-collapse.js"></script>
<script src="backend/assets/js/misc.js"></script>
<script src="backend/assets/js/settings.js"></script>
<script src="backend/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="backend/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->

@include('Backend.includes.sweetalert')
</body>

</html>