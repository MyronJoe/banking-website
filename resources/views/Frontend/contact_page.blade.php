@include('Frontend.includes.header')
<!-- End header -->

@include('Frontend.includes.nav')
<!-- End Navbar Area -->


<!-- Start Page Title Area -->
<div class="page-title-area item-bg2 jarallax" data-jarallax="{" speed": 0.3}">
    <div class="container">
        <div class="page-title-content">
            <h2>Contact Us</h2>
            <p>If you have an idea, we would love to hear about it.</p>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="contact-area ptb-70">
    <div class="container">
        <div class="section-title">
            <h2>Drop us message for any query</h2>
            <div class="bar"></div>

        </div>

        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="contact-info">
                    <ul>
                        @foreach($utilities as $item)
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>Address</span>
                            {{$item->address}}
                        </li>

                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span>Email</span>
                            <a >{{$item->email}}</a>
                        </li>

                        <li>
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <span>Phone</span>
                            <a href="{{$item->phone}}">{{$item->phone_no}}</a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-7 col-md-12">
                <div class="contact-form">
                    <form  method="POST" action="{{route('send_message')}}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone_no" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="content" class="form-control" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <div class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Contact Area -->


@include('Frontend.includes.footer')
<!-- Start Footer Area -->