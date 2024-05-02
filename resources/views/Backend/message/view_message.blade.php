@include('Backend.includes.head')


@include('Backend.includes.sidebar')

<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('Backend.includes.nav')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">



            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Message form {{$message->name}}</h4>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" disabled value="{{$message->name}}" style="background: none; color:gray;" class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" disabled value="{{$message->email}}" style="background: none; color:gray;" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Phone Number</label>
                                <input type="text" style="background: none; color:gray;" class="form-control" disabled value="{{$message->phone_no}}" id="exampleInputPassword4" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputCity1">Subject</label>
                                <input type="text" disabled value="{{$message->subject}}" style="background: none; color:gray;" class="form-control" id="exampleInputCity1" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Message Details</label>
                                <textarea style="background: none; color:gray;" class="form-control" disabled id="exampleTextarea1" rows="4">{{$message->content}}</textarea>
                            </div>
                            <a href="{{route('all_messages')}}" class="btn btn-primary mr-2">Go Back</a>
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
<script src="{{ asset('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('backend/app-assets/js/scripts/extensions/ext-component-sweet-alerts.min.js') }}"></script>


@include('Backend.includes.sweetalert')
</body>

</html>