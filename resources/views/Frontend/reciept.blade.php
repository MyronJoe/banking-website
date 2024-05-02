<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">





<div class="row m-0" style="justify-content: center; align-items:center; position:relative">

    <div style="position:absolute; top:0px; width:100%; bottom:0px; left:0px; right:0px; margin:auto; height:100vh">
        @foreach($utilities as $item)
        <img src="../frontend/assets/uploads/{{$item->faveicon}}" alt="logo" style="position:absolute; top:10px;   left:0px; right:0px; margin:auto; opacity:0.1">
        @endforeach
    </div>
    <div class="container col-md-12 p-0">
        <div class="currency-transfer-provider-with-background-color">
            <div class="ctp-services-area pt-100 pb-75">
                <div class="container">

                    <div class="logo black-logo" style="display:flex; justify-content: center; margin-bottom:10px;">
                        <a href="/">
                            @foreach($utilities as $item) <img src="../frontend/assets/uploads/{{$item->blackLogo}}" width="250px" alt="logo">
                            @endforeach
                        </a>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="ctp-services-card" style="display:flex; justify-content: center;">
                                <h2>
                                    Transaction Receipt
                                </h2>
                            </div>
                        </div>

                    </div>

                    <div class="row m-0" style="justify-content: center; align-items:center;">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="login-content">

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Transfer ID</p>

                                    <p style="font-weight:500">{{$refId}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Transaction Date</p>

                                    <p style="font-weight:500">{{$trans->created_at->format('jS F Y | h:i:s')}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Sender Name</p>

                                    <p style="font-weight:500">{{Auth::user()->fname}} {{Auth::user()->lname}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Source</p>

                                    <p style="font-weight:500">*******{{substr(Auth::user()->acc_number, -3)}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Destination Name</p>

                                    <p style="font-weight:500">{{$trans->recipient_name}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Destination</p>

                                    <p style="font-weight:500">{{$trans->recipient_acc_number}}</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Amount</p>

                                    <p style="font-weight:500">$@convert($trans->amount)</p>
                                </div>

                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Receiver's Bank</p>

                                    <p style="font-weight:500">{{$trans->recipient_bank}}</p>
                                </div>

                                @if($trans->remark)
                                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; color:black">
                                    <p style="color: black; font-weight:bold">Reason</p>

                                    <p style="font-weight:500">{{$trans->remark}}</p>
                                </div>
                                @endif

                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="ctp-services-card" style="display:flex; justify-content: center;">
                                            <h4 style="font-family:Arial, Helvetica, sans-serif;">
                                                @foreach($utilities as $item)
                                                {{$item->email}}
                                                @endforeach
                                            </h4>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>