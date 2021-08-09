@extends('Layout.new-master')
@section('title')
<title>Transactions</title>
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
                        <div class="col-12">
                            <div class="card mb-30">
                                <!-- Card body -->
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Transactions</h5>
                                    <div class="mb-5" id="card-list-3"> 
                                        <div v-for="transaction in transaction_details">                                 
                                            <div class="card card-progress border mb-30">
                                                <div class="progress h-6">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="card-body row align-items-center">
                                                 <div class="row row-cols-auto g-3">
                                                    <!-- <div class="col">
                                                        <img src="{{ asset('UI-assets/icons/profile-user.svg')}}" width="40" height="40" alt="">  
                                                    </div> -->
                                                    <div class="col">
                                                         <a v-cloak :href="`/transaction-details/${transaction.txn_id}`"
                                                          data-toggle="tooltip" data-placement="top" style="color:navy;" title="View Transaction"><img src="{{ asset('UI-assets/icons/eye.svg')}}" width="40" height="40" alt="">  </a>
                                                     </div>
                                                     <div class="col">
                                                         <a v-cloak href="javascript:void(0);"  class="text-primary" data-toggle="tooltip" data-placement="right" title="email">@{{ transaction.email }}&nbsp&nbsp<i class="zmdi zmdi-email"></i></a>
                                                     </div>
                                                     <div class="col">
                                                         <a v-cloak href="javascript:void(0);" role="button" class="text-secondary" data-toggle="tooltip" data-placement="bottom" title="Coin Address">Send to<br>@{{ transaction.crypto_address }}</a>
                                                     </div>
                                                     <div class="col">
                                                         <button v-cloak type="button" class="btn btn-sm btn-warning text-default" data-toggle="tooltip" style="color:white;" data-placement="top" title="Date"><small>@{{ transaction.txn_date }}</small></button>
                                                     </div>
                                                     <div class="col">
                                                         <a href="javascript:void(0);" v-cloak class="text-secondary" data-toggle="tooltip" data-placement="top" title="Amount">@{{ transaction.amount }}</a>
                                                     </div>
                                                     <div class="col">                                                                                      
                                                          <button v-cloak type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" :title="transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' ">@{{ transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' }}</button>
                                                    </div>
                                                    <div class="col">
                                                         <a href="javascript:void(0);" v-cloak  class="text-primary"   data-toggle="tooltip" data-placement="top" title="Status"><strong>@{{ transaction.status }}</strong></a>
                                                     </div> 
                                                     <div class="col">
                                                         <button v-cloak type="button" @click="adminDeleteTransaction(transaction.id)" data-toggle="tooltip" data-placement="top" title="Delete" class="btn text-secondary"><img src="{{ asset('UI-assets/icons/trash.svg')}}" width="40" height="40" alt=""> </button>
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
                    <textarea name="" id="allTransactions" cols="30"  style="display:none;" rows="10">{{ json_encode($transactions) }}</textarea>                  
                     <textarea name="" id="transactions" cols="30"  style="display:none;" rows="10">{{ route('all-transactions') }}</textarea> 
                </div>
                <!-- Footer Area -->
                @include('Includes.footer')
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app/transactions.js') }}"></script>
@endsection