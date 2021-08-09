@extends('Layout.master')

@section('title')
    <title>Transaction Details</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}" />
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper">
	@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper" id="transactions">
			<div class="page-content">
			<div class="row">
				<div class="col">
					<div class="card radius-10">
						<div class="text-end">
							<button @click="confirmTransaction(transaction.id)" type="button" style="color:white; background:navy; box-shadow:3px 4px 3px grey;" class="btn px-5">
								<i class="fas fa-check-circle"></i>&nbsp;&nbsp;Confirm Transaction</button>
						</div>
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Transaction ID</p>
									<strong class="text-center">{{ $transaction->txn_id }}</strong>
									<!-- <hr> -->
									<p class="text-warning"><strong>{{ $transaction->status }}</strong></p>
									<hr>
									<button class="btn btn-md" style="color:white; background:orangered;"><small>Cancel</small></button>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="input-group mb-3">
							<!-- <input type="text" class="form-control" placeholder="{{ $transaction->crypto_address }}"> -->
							<textarea class="form-control" rows="1" disabled aria-label="With textarea">{{ $transaction->crypto_address }}</textarea>
							<button class="input-group-text" for="inputGroupSelect02" title="copy address"><i class="fas fa-copy"></i></button>
						</div>		
					</div>
				</div>		
			</div>
		
			
			<textarea name="" id="confirmTransaction" cols="30" rows="10" style="display:none;">{{ route('admin.approve.transaction') }}</textarea>
		</div>
	 </div>
		<!--end page wrapper -->
		<!--start overlay-->
     @endsection
	</div>
	<!--end wrapper-->
	<!--start switcher-->

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{ asset('assets/js/app/transactions.js') }}"></script>
	@endsection

</body>
</html>