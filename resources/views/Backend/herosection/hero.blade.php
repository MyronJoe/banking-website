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
                        <h4 class="card-title">Update Hero Section</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        @foreach($heros as $key => $item)
                        <form class="forms-sample" action="{{route('update_hero', $item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="title" name="title" class="form-control text-light" id="exampleInputtitle1" placeholder="title" value="{{ $item->title }}">

                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Sub Title</label>
                                <textarea class="form-control text-light" name="subtitle" id="exampleTextarea1" rows="4">{{$item->subtitle}}</textarea>
                            </div>

                            <div class="form-group">
                                <img src="../frontend/assets/uploads/{{$item->image}}" alt="image" width="100px">
                                <br>
                                <label for="image" class="mt-1">Background Image</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control text-light file-upload-info" placeholder="Upload Background Image" name="image">
                                </div>

                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Update Hero</button>
                            <!-- <button class="btn btn-dark">Cancel</button> -->
                        </form>
                        @endforeach
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