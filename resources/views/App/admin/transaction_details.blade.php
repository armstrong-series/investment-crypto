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
            <div class="main-content"  id="transactions">  
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 box-margin height-card">
                            <div class="card">
                                <div class="card-body">
                                <p class="mb-0 text-secondary">Transaction ID</p>
									<h6 style="color:darkblue;">{{ $transaction->txn_id }}</h6>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 box-margin height-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="wallet-card mt-3">
                                    <img src="https://www.bitcoinqrcodemaker.com/api/?style=bitcoin&amp;address=bc1qlqfgvl2sm5faw5jc66e9jgc08rcassypyg3m20" 
                                    height="300" width="300" alt="Bitcoin QR Code" />
                                        <!-- <img src="{{ asset('UI-assets/icons/btc.png') }}" alt="">      -->
                                       
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
                                                        
                                                            <input id="input1" type="text" placeholder="bc1qlqfgvl2sm5faw5jc66e9jgc08rcassypyg3m20" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                            <div class="input-group-append">
                                                                <button data-clipboard-target="#input1" class="btn btn-flat clipboard-btn" style="background:grey; color:white;" title="Copy to Address" type="button" id="button-addon1"><i class="fas fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wallet-info">
                                                        <h6 class="text-success"><strong>STEP GUIDE</strong></h6>
                                                        <p>1. Copy/Scan the Address</p>
                                                        <p>2. Send your BTC to that address</p>
                                                        <p>3. Wait 3 minutes to confirm transaction</p>
                                                        
                                                        <p class="text-info"><strong>{{ $transaction->status }}</strong></p>
                                                        <button type="submit" class="btn btn-secondary btn-sm mr-3">Cancel</button>
                                                        <button @click="confirmTransaction(transaction.id)" type="button" style="color:white;
                                                            background:navy; box-shadow:3px 4px 3px grey;" class="btn px-5"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;Confirm Transaction
                                                            </button>
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
   <script>
       function copyAddress(){
           const copy = document.getElementById("copy");
           copy.select();
           document.execCommand("copy");
       }
   </script>
   	<script src="{{ asset('assets/js/app/transactions.js') }}"></script>
@endsection