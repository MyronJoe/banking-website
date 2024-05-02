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
                        <h4 class="card-title">Create User Account</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="{{route('create_admin_account')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="reg-label" for="image">Email</label>
                                <input type="email" min="0" name="email" id="email" placeholder="Email" class="form-control" value="{{old('email')}}" style="font-family: Arial, Helvetica, sans-serif;">

                                @error('email')
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
                            <button type="submit" class="btn btn-primary mr-2">Create Admin</button>
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