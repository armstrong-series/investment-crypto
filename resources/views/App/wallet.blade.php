@extends('Layout.new-master')
@section('title')
<title></title>
@endsection

@section('content')
        <!-- Page Content -->
<div class="ecaps-page-content">
    <!-- Top Header Area -->
    @include('Includes.main-header')
    <!-- Main Content Area -->
    <div class="main-content" id="investment">
        <div class="container-fluid">
            <div class="row">
                <!-- Your Balence -->
                <div class="col-xl-8 box-margin height-card">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="wallet-bal-usd">
                                        <h4 class="card-title font-20 m-0">Balance</h4>
                                        <!-- <p class="font-12">15 Oct 2019</p> -->
                                        <h4 class="text-success">{{ $account_balance }} BTC</h4>
                                        <!-- <h4 class="text-success">$86953.00</h4> -->
                                    </div>
                                    <p class="font-15 text-danger mb-4">+ 20%  Monthly Returns</p>
                                    <div class="text-right">
                                        <button class="btn btn-info btn-sm mb-2" data-toggle="modal" data-animation="bounce" data-target="#withdraw">Withdraw&nbsp;&nbsp<i class="fad fa-wallet"></i></button>
                                        <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-animation="bounce" data-target="#Invest">+ Invest&nbsp;&nbsp;<i class="fab fa-medrt"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                        <!-- Modal -->
                      

                        <div class="modal fade" id="Invest" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <div class="form-group"><label for="PhoneNo">Amount</label> <input type="text"  v-model="entered_price" class="form-control" placeholder="Enter Amount" required=""></div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="status-select" class="mr-2">Coin</label>
                                                     <select class="custom-select" id="status-select" v-model="selected_coin">
                                                            <option selected="">Select</option>
                                                            <option v-for="(currency, key) in cryptocurrencies.currencies" v-bind:value="key">@{{ currency.name }}</option>              
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <div class="form-group"><label for="Description">Narration</label> <input type="text" placeholder="Enter Narration" v-model="investment.description" class="form-control" id="LeadEmail" required=""></div>
                                                </div>
                                                <div class="col-md-6">										
													<div class="form-group">		
                                                        <div class="form-group"><label for="currency">USD</label> <input type="text" @keyup="convertedPrice()" v-bind:value="convertedPrice" class="form-control" id="LeadEmail" required=""></div>														
													</div>
												</div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="Address">ROI</label> <input v-model="increment" placeholder="ROI value" type="text"  class="form-control" id="address" required=""></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label v-if="selected_coin" for="Address">Address</label> 
                                                        <input v-if="selected_coin" v-model="investment.crypto_address"
                                                         :placeholder="'Enter your '+ selected_coin.name +' Address'" type="text"  class="form-control" id="address" required=""></div>
                                                </div>
                                            </div>
                                            <!-- <button type="button" @click="invest()" class="btn btn-sm btn-primary">Proceed</button>  -->
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Proceed
                                                </button>
                                                <button type="button" data-dismiss="modal"  class="btn btn-sm btn-secondary">Cancel</button> 

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" @click="invest()" href="javascript:void(0);"><i class="fab fa-bitcoin"></i>&nbsp;Coin</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-wallet"></i>&nbsp;Cash</a>   
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- /end modal -->      
                        
                        
                        <!-- Withdraw -->
                        <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">Withdraw</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <div class="form-group"><label for="PhoneNo">Amount</label> 
												    <input type="text" class="form-control"  v-model="withdrawal.amount"  class="form-control" placeholder="Enter Amount" required=""></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="status-select" class="mr-2">Coin</label>
                                                     <select class="custom-select" id="status-select" v-model="selected_coin">
                                                            <option selected="">Select</option>
                                                            <option v-for="(currency, key) in cryptocurrencies.currencies" v-bind:value="key">@{{ currency.name }}</option>              
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                     <div class="form-group"><label for="Description">Description</label> <input type="text" v-model="investment.description" class="form-control" id="LeadEmail" required=""></div>
                                                </div>
                        
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="Address">Address</label> <input v-if="selected_coin" v-model="withdrawal.address"  :placeholder="'Enter your '+ selected_coin.name +' Address'" type="text"  class="form-control" id="address" required=""></div>
                                                </div>
                                            </div>
                                            <button type="button" @click="withdraw()" class="btn btn-sm btn-primary">Procceed</button> 
                                            <button type="button" data-dismiss="modal"  class="btn btn-sm btn-secondary">Cancel</button> 
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- /Withdraw modal -->
                    </div>
                    <!--end card-->
                </div>      
            </div>
        </div>  

        <textarea name=""  id="initializePayment" style="display:none;" id="" cols="30" rows="10">{{ route('users.invest') }}</textarea>
        <textarea name=""  id="withdrawal" style="display:none;" id="" cols="30" rows="10">{{ route('users.withdrawal') }}</textarea>
        <textarea name=""  id="currencies" style="display:none;" id="" cols="30" rows="10">{{ json_encode($currencies) }}</textarea>

        <!-- Footer Area -->
        @include('Includes.footer')
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app/investment.js') }}"></script>
@endsection
