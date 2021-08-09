@extends('Layout.new-master')
@section('title')
<title>Transactions Details</title>
@endsection

@section('content')
        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
           @include('Includes.main-header')
            <!-- Main Content Area -->
            <div class="main-content">  
                <div class="container-fluid">
                    <div class="row">
                        <!-- Your Balence -->
                        <div class="col-xl-4 box-margin height-card">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="wallet-bal-usd">
                                                <h4 class="card-title font-20 m-0">Your Balence</h4>
                                                <p class="font-12">15 Oct 2019</p>
                                                <h4 class="text-success">$86953.00</h4>
                                            </div>
                                            <p class="font-15 text-danger mb-4">+ $355.00
                                                <span class="font-12 text-dark">(6.2%)</span></p>
                                            <div class="text-right"><button class="btn btn-success btn-sm mb-2">Receive</button>
                                                <button class="btn btn-danger btn-sm mb-2">Send</button>
                                                <button class="btn btn-primary btn-sm mb-2">+ Invest</button></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-body pt-0">
                                    <ul class="list-group wallet-bal-crypto">
                                        <li class="list-group-item align-items-center d-flex justify-content-between">
                                            <div class="media">
                                                <img src="img/currency-img/1.png" class="mr-3 thumb-sm align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <div class="coin-bal">
                                                        <h3 class="m-0 font-20">5.18400</h3>
                                                        <p class="font-14 mb-0">$ 4277.360</p>
                                                    </div>
                                                </div>
                                                <!--end media body-->
                                            </div><span class="badge badge-outline-info">Bitcoin</span>
                                        </li>
                                        <li class="list-group-item align-items-center d-flex justify-content-between">
                                            <div class="media">
                                                <img src="img/currency-img/5.png" class="mr-3 thumb-sm align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <div class="coin-bal">
                                                        <h3 class="m-0 font-20">8.189400</h3>
                                                        <p class="font-14 mb-0">$ 7277.360</p>
                                                    </div>
                                                </div>
                                                <!--end media body-->
                                            </div><span class="badge badge-outline-success">Ethereum</span>
                                        </li>
                                        <li class="list-group-item align-items-center d-flex justify-content-between">
                                            <div class="media">
                                                <img src="img/currency-img/3.png" class="mr-3 thumb-sm align-self-center rounded-circle" alt="...">
                                                <div class="media-body align-self-center">
                                                    <div class="coin-bal">
                                                        <h3 class="m-0 font-20">6.184400</h3>
                                                        <p class="font-14 mb-0">$ 3277.360</p>
                                                    </div>
                                                </div>
                                                <!--end media body-->
                                            </div><span class="badge badge-outline-warning">Ripple</span>
                                        </li>
                                    </ul>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>

                        <!-- Statistics Chart -->
                        <div class="col-xl-8 box-margin height-card">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="mb-2">BTC Price</p>
                                            <h3 class="font-18">$8896.25</h3>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="mb-2">Market Cap</p>
                                            <h3 class="font-18">$12,896.25</h3>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="mb-2">Volume (24h)</p>
                                            <h3 class="font-18">$12596.25</h3>
                                        </div>
                                    </div>
                                    <!-- Chart -->
                                    <div id="line-area2" class="Stackchart height-400"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 box-margin height-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Bitcoin Wallet</h4>
                                    <div class="wallet-card mt-3">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="copy-wallet">
                                                        <label>Walllet Address</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text input-text-btc"><i class="fa fa-btc" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input id="input3" type="text" placeholder="1FfmbHfnpaZjKFvyi1okTjJJusN455paPH" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                            <div class="input-group-append">
                                                                <button data-clipboard-target="#input3" class="btn btn-primary btn-flat clipboard-btn" title="Copy to clipboard" type="button" id="button-addon1"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="wallet-info">
                                                <p class="text-success"><strong>1 BTC = 8,520 USD</strong></p>
                                                <p>Total Selling Amount: $ 1,25,500</p>
                                                <p>Total Buying Amount: $ 1,17,750</p>
                                                <button type="submit" class="btn btn-primary btn-sm mr-3">Withdraw
                                                </button><button type="submit" class="btn btn-outline-primary btn-sm">Deposit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 box-margin height-card">
                            <div class="card">
                                <div class="card-body">
                                   
                                    <div class="wallet-card mt-3">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="copy-wallet">
                                                        <label>Copy Address</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <!-- <span class="input-group-text input-text-eth"><i class="fa fa-google-wallet" aria-hidden="true"></i></span> -->
                                                            </div>
                                                            <input id="input1" type="text" placeholder="1FfmbHfnpaZjKFvyi1okTjJJusN455paPH" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                            <div class="input-group-append">
                                                                <button data-clipboard-target="#input1" class="btn btn-flat clipboard-btn"style="background:grey;" title="Copy to Address" type="button" id="button-addon1"><i class="fas fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        
                    </div>
                </div>
                <!-- Footer Area -->
                @include('Includes.footer')
            </div>
        </div>
@endsection

@section('scripts')
   
@endsection