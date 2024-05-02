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
                            <h4 class="card-title">All Transactions ({{$transactionsNum}})</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> S/N </th>
                                            <th> Recipient Name </th>
                                            <th> Recipient Acc Number </th>
                                            <th> Amount </th>
                                            <th> Routine Code </th>
                                            <th> Swift Code </th>
                                            <th> Zip Code </th>
                                            <th> Date </th>
                                            <th> Status </th>
                                            <th> Action </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $key => $item)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->recipient_name}}</td>
                                            <td>{{$item->recipient_acc_number}}</td>
                                            <td>$@convert($item->amount)</td>
                                            <td>{{$item->routine_code}}</td>
                                            <td>{{$item->swift_code}}</td>
                                            <td>{{$item->zip_code}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                @if($item->status == '1')
                                                <a href="{{route('notdone', $item->id)}}" class="badge btn-success">Done</a>
                                                @else
                                                <a href="{{route('done', $item->id)}}" class="badge btn-warning">Processing</a>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route('edit-transaction', $item->id)}}" class="badge btn-primary">Edit</a>

                                                <a href="{{route('delete-transaction', $item->id)}}" class="badge btn-danger" onclick="confirmation(event)">Delete</a>
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

            <div class="mt-3 text-center">
                {{ $transactions->onEachSide(2)->links('pagination::bootstrap-4') }}
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