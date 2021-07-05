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
                    <!--breadcrumb-->
                    <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <button type="button" style="border-radius: 50%; box-shadow: 3px 4px 4px grey;"  class="btn btn-md btn-primary"data-bs-toggle="modal"
                            data-bs-target="#users" >+</button>

                    </div> -->
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="mb-0"></h6>
                            <hr/>
                            <!-- <div class="card"> -->
                                <!-- <div class="card-body"> -->
                                    <table class="table mb-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">TxnId</th>
                                                <th scope="col">Type</th>
                                                <!-- <th scope="col">Coin</th>            -->
                                                <th scope="col">Email</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">ROI</th>
                                                <th scope="col">Txn_Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="transaction in transaction_details">
                                                <td v-cloak>@{{ transaction.txn_id }}</td>
                                                <td v-cloak>@{{ transaction.trans_type }}</td>
                                                <!-- <td>@{{ transaction.coin }}</td> -->
                                                <td v-cloak>@{{ transaction.email }}</td>
                                                <td v-cloak>@{{ transaction.amount }}</td>
                                                <td v-cloak>@{{ transaction.crypto_address }}</td>
                                                <td v-cloak>@{{ transaction.increment }}</td>
                                                <td v-cloak>@{{ transaction.txn_date }}</td>
                                                <td v-cloak>@{{ transaction.status }}</td>
                                                <td>
                                                  <button v-cloak style="box-shadow:4px 3px 4px grey; width: 50px; height:24px;" title="approval" @click="approve()" type="button" class="btn">
                                            
                                                        <i style="color:lime; padding:10px;" class="fadeIn animated bx bx-caret-right"></i>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                    <!--end row-->

                    <textarea name="" id="allTransactions" cols="30"  style="display:none;" rows="10">{{ json_encode($transactions) }}</textarea>
                    <textarea name="" id="approve" cols="30"  style="display:none;" rows="10">{{ route('admin.approve.transaction') }}</textarea>
                   
            </div>
        </div>
    @endsection
	</div>

    	<!--end page wrapper -->
	@section('script')
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/js/app/transactions.js') }}"></script>
	@endsection
</body>
</html>
