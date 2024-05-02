@include('Frontend.includes.header')
<!-- End header -->

@include('Frontend.includes.nav')
<!-- End Navbar Area -->

<!-- Start Login Area -->
<section class="login-area">


    <div style="height: 75px; width:100%; background:#44CD6F">

    </div>
    <div class="row m-0" style="justify-content: center; align-items:center;" >
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content register" style="padding-top: 0px;">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
    
                            <!-- <h3>Transfer Money</h3> -->


                            <form method="POST" action="{{route('transferMoney')}}" style="text-align: left;">
                                @csrf
                                <div class="form-group">
                                    <label for="">Transfer From*</label>
                                    <div class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                    {{Auth::user()->fname}} {{Auth::user()->lname}} -- ({{Auth::user()->acc_number}})
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                    $@convert(Auth::user()->amount)
                                    </div>
                                </div>
                                <h4></h4>
                                <div class="form-group">
                                <label for="">Transfer To*</label>
                                    <input type="number" min='0' name="recipient_account_number" id="acc_number" required placeholder="Recipient Account Number" class="form-control" value="{{ old('recipient_account_number') }}" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="text" min='0' name="recipient_name" id="acc_number" required placeholder="Recipient Name" value="{{ old('recipient_name') }}" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="number" min='0' name="amount" id="acc_number" required placeholder="Amount" value="{{ old('amount') }}" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="number" min='0' name="zip_code" id="acc_number" required placeholder="Zip Code" value="{{ old('zip_code') }}" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="number" min='0' name="swift_code" id="acc_number" required placeholder="Swift Code" value="{{ old('swift_code') }}" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="number" min='0' name="routine_number" id="acc_number" required placeholder="Routine Number" value="{{ old('routine_number') }}" class="form-control" style="font-family: Arial, Helvetica, sans-serif;">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="recipient_bank" id="password" required placeholder="Recipient Bank" value="{{ old('recipient_bank') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="remark" id="password" placeholder="what's this for?(Optional)" value="{{ old('remark') }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Send Money</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

@include('Frontend.includes.footer')
<!-- End Footer Area -->