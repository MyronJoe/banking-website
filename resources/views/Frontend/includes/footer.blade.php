<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        @foreach($utilities as $item)
                        <a href="index.html" class="white-logo"><img src="frontend/assets/uploads/{{$item->whiteLogo}}" width="150px" alt="logo"></a>

                        <a href="index.html" class="black-logo"><img src="frontend/assets/uploads/{{$item->blackLogo}}" width="150px" alt="logo"></a>
                            @endforeach
                    </div>

                    <ul class="social-links">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Company</h3>

                    <ul class="list">
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('services')}}">Our Pricing</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Support</h3>

                    <ul class="list">
                        <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('privacy_policy')}}">Terms & Condition</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Address</h3>

                    @foreach($utilities as $item)
                    <ul class="footer-contact-info">
                        <li><span>Location:</span> {{$item->address}}</li>
                        <li><span>Email:</span> <a><span class="__cf_email__" >{{$item->email}}</span></a></li>
                        <li><span>Phone:</span> <a href="tel:+321984754">{{$item->phone_no}}</a></li>

                    </ul>
                    
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p>Copyright @ 
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="#"> {{$item->site_name}}, </a> All Right Reserved
            </p>
        </div>
    </div>
    @endforeach
    <div class="map-image"><img src="frontend/images/map.png" alt="map"></div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class="fas fa-arrow-up"></i></div>

<!-- Dark/Light Toggle -->
<div class="dark-version">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>

<script src="{{ asset('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('backend/app-assets/js/scripts/extensions/ext-component-sweet-alerts.min.js') }}"></script>

<!-- Links of JS files -->
<script src="frontend/js/jquery.min.js"></script>
<script src="frontend/js/bootstrap.bundle.min.js"></script>
<script src="frontend/js/meanmenu.js"></script>
<script src="frontend/js/nice-select.min.js"></script>
<script src="frontend/js/slick.min.js"></script>
<script src="frontend/js/magnific-popup.min.js"></script>
<script src="frontend/js/appear.min.js"></script>
<script src="frontend/js/odometer.min.js"></script>
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/parallax.min.js"></script>
<script src="frontend/js/wow.min.js"></script>
<script src="frontend/js/form-validator.min.js"></script>
<script src="frontend/js/contact-form-script.js"></script>
<script src="frontend/js/jquery.ajaxchimp.min.js"></script>
<script src="frontend/js/main.js"></script>

<script src="backend/js/sweetalert2.all.min.js"></script>

<!-- <a href="https://themeforest.net/checkout/from_item/24748730?license=regular&amp;support=bundle_6month&amp;_ga=2.127639053.1035807767.1645331073-1425290503.1590986634" class="buy-now-btn" target="_blank"><img src="assets/img/envato.png" alt="envato"></a> -->

<script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>


<script>

    function loadGoogleTranslate(){
        new google.translate.TranslateElement("google_element");
    }

    // $(window).on('load', function() {
    //     if (feather) {
    //         feather.replace({
    //             width: 14,
    //             height: 14
    //         });
    //     }
    // })


    // $(function() {

    //     @if (Session::has('success'))
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Great!',
    //             text: '{{ Session::get('success') }}'
    //         })
    //     @endif
    // });

    // @if (Session::has('error'))
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: '{{ Session::get('error') }}'
    //     })
    // @endif

    // @if (Session::has('warning'))
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Oops...',
    //         text: '{{ Session::get('warning') }}'
    //     })
    // @endif




    // $(window).on('load', function() {
    //     if (feather) {
    //         feather.replace({
    //             width: 14,
    //             height: 10
    //         });
    //     }
    // })


    $(function() {

        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '{{ Session::get('success') }}'
            })
        @endif
    });

    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}'
        })
    @endif

    @if (Session::has('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: '{{ Session::get('warning') }}'
        })
    @endif







    //delete
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "To Deleted This Data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes, Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Data Has Been Deleted Successfully.',
                        'success'
                    )
                    window.location.href = link
                }
            });


        });




    });





    //toastr notification
    // window.addEventListener('alert', event => {
    //     toastr[event.detail.type](event.detail.message,
    //         event.detail.title ?? ''), toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true,
    //     }
    // });



   

    // $(window).ready(function() {
    //     $("form").on("keypress", function(event) {
    //         var keyPressed = event.keyCode || event.which;
    //         if (keyPressed === 13) {
    //             event.preventDefault();
    //             return false;
    //         }
    //     });
    // });

    // window.addEventListener('alert', event => {
    //     toastr[event.detail.type](event.detail.message,
    //         event.detail.title ?? ''), toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true,
    //     }
    // });



    // ClassicEditor
    //     .create(document.querySelector('#editor'))
    //     .then(editor => {
    //         console.log(editor);
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });

    // $(window).ready(function() {
    //     $("form").on("keypress", function(event) {
    //         var keyPressed = event.keyCode || event.which;
    //         if (keyPressed === 13) {
    //             event.preventDefault();
    //             return false;
    //         }
    //     });
    // });
</script>

</body>

</html>