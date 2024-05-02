@include('Backend.includes.head')


@include('Backend.includes.sidebar')

<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('Backend.includes.nav')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">



            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All User Accouts</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> S/N </th>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Phone </th>
                                            <th> Subject </th>
                                            <th> Content </th>
                                            <th> View </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($message as $key => $message)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->phone_no}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{ Str::limit($message->content, 10) }}</td>
                                            <td>
                                                <a href="{{route('view_message', $message->id)}}" class="badge btn-warning">Details</a>
                                            </td>
                                            <td>
                                                <a href="{{route('delete-message', $message->id)}}" class="badge badge-danger" onclick="confirmation(event)">Delete</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
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