@include('Frontend.includes.header')
<!-- End header -->

@include('Frontend.includes.nav')
<!-- End Navbar Area -->
<style>
    .send-box {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .send-box h4 {
        font-family: Arial, Helvetica, sans-serif;
    }

    .right {
        text-align: right;
    }
</style>
<!-- Start Login Area -->
<section class="login-area">


    <div style="height: 75px; width:100%; background:#44CD6F">

    </div>


    <div class="row m-0" style="justify-content: center; align-items:center;">
        <div class="container col-md-12 p-0">

            <div class="currency-transfer-provider-with-background-color">



                <!-- Start Services Area -->
                <div class="ctp-services-area pt-100 pb-75">
                    <div class="container">

                        <div class="top" style="display: flex; justify-content:space-between; align-items:center;">
                            <a href="{{route('send_money')}}" class="btn btn-primary">Send Money</a>

                            <div style="display: flex; justify-content:flex-end; align-items:flex-end; flex-direction:column;">
                                <img src="frontend/assets/uploads/{{Auth::user()->image}}" alt="partner" style="height: 45px; width:45px; border-radius:100px; object-fit:cover">
                                <h5 class="mt-[2px]">{{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
                            </div>
                        </div>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="ctp-services-card">
                                    <h3>
                                        <div class="icon">
                                            <img src="frontend/fonts/mobile-payment.svg" alt="image">
                                        </div>
                                        Account
                                    </h3>
                                    <p>TOTAL BALANCE</p>

                                    <h4 style="font-family: Arial, Helvetica, sans-serif;">$@convert(Auth::user()->amount)</h4>
                                </div>
                            </div>

                        </div>

                        <h4 class="card-title mb-2">All Transactions</h4>

                        @foreach($transactions as $key => $item)
                        <div class="row mb-3">
                            @if($item->type == 'credit')
                            <a href="{{route('credict_reciept', $item->id)}}">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{route('credict_reciept', $item->id)}}" class="send-box">
                                                <div class="left">
                                                    @if($item->type == 'credit')
                                                    <h4>Money received</h4>
                                                    @else
                                                    <h4>Money sent</h4>
                                                    @endif

                                                    <p>{{$item->created_at->format('jS F Y')}} | {{$item->recipient_name}}</p>
                                                </div>

                                                <div class="right">
                                                    
                                                    @if($item->type == 'credit')
                                                    <h4>+$@convert($item->amount)</h4>
                                                    @else
                                                    <h4>-$@convert($item->amount)</h4>
                                                    @endif

                                                    @if($item->status == '1')
                                                    <p class="text-success">Successfull</p>
                                                    @else
                                                    <p class="text-primary">Processing</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @else
                            <a href="{{route('download_reciept', $item->id)}}">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{route('download_reciept', $item->id)}}" class="send-box">
                                                <div class="left">
                                                    @if($item->type == 'credit')
                                                    <h4>Money received</h4>
                                                    @else
                                                    <h4>Money sent</h4>
                                                    @endif

                                                    <p>{{$item->created_at->format('jS F Y')}} | {{$item->recipient_name}}</p>
                                                </div>

                                                <div class="right">
                                                @if($item->type == 'credit')
                                                    <h4>+$@convert($item->amount)</h4>
                                                    @else
                                                    <h4>-$@convert($item->amount)</h4>
                                                    @endif

                                                    @if($item->status == '1')
                                                    <p class="text-success">Successfull</p>
                                                    @else
                                                    <p class="text-primary">Processing</p>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif


                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Services Area -->


            </div>

        </div>
    </div>
</section>
<!-- End Login Area -->

@include('Frontend.includes.footer')
<!-- End Footer Area -->