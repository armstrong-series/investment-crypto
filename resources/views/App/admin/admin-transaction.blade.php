@extends('Layout.master')

@section('title')
    <title>Transactions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<body>
	<!--wrapper-->
	<div class="wrapper">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
        <div id="transactions"> 
            <div class="page-wrapper">
                <div class="page-content">
                
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0"></h6>
                            <hr/>
                            <div v-for="transaction in transaction_details">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h5 class="mb-0">Tooltips Examples</h5> -->
                                        
                                        <div class="row row-cols-auto g-3">
                                            <div class="col">
                                                <a v-cloak :href="`/transaction-details/${transaction.txn_id}`" data-bs-toggle="tooltip" data-bs-placement="top" style="color:navy;" title="View Transaction">View Transaction&nbsp&nbsp;<i class="lni lni-eye"></i></a>
                                            </div>
                                            <div class="col">
                                                <a v-cloak href="javascript:void(0);"  class="text-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right"><i>@{{ transaction.email }}</i></a>
                                            </div>
                                            <div class="col">
                                                <a v-cloak href="javascript:void(0);" role="button" class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coin Address">Send to<hr>@{{ transaction.crypto_address }}</a>
                                            </div>
                                            <div class="col">
                                                <button v-cloak type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Date">@{{ transaction.txn_date }}</button>
                                            </div>

                                            <div class="col">
                                                <a href="javascript:void(0);" v-cloak class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="Amount">@{{ transaction.amount }}</a>
                                            </div>
                                            <div class="col">                                                                                      
                                                <button v-cloak type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="left" :title="transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' ">@{{ transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' }}</button>
                                            </div>

                                            <div class="col">
                                                <a href="javascript:void(0);" v-cloak  class="text-primary"   data-bs-toggle="tooltip" data-bs-placement="left" title="Status"><strong>@{{ transaction.status }}</strong></a>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:void(0);" v-cloak  class="btn text-secondary"  @click="adminDeleteTransaction(transaction.txn_id)" data-bs-toggle="tooltip" data-bs-placement="left" title="Delete"><i class="fas fa-trash" style="color:red;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                        </div>
                    </div>
                </div>
                    <!--end row-->
                 <textarea name="" id="allTransactions" cols="30"  style="display:none;" rows="10">{{ json_encode($transactions) }}</textarea>
                   
                   
            </div>
        </div>
    @endsection
	</div>

    	<!--end page wrapper -->
	@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/js/app/transactions.js') }}"></script>
	@endsection
</body>
</html>
