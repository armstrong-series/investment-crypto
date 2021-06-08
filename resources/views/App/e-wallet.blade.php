@extends('Layout.master')

@section('title')
    <title>Transactions</title>
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper" id="investment">
            @section('content')
		<!--start page wrapper -->
		<div class="page-wrapper" id="investment">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#withdraw"  style="box-shadow: 4px 3px 4px grey;">Withdraw</button>
					<div class="ms-auto">	
					    <button type="button" data-bs-toggle="modal"
                         data-bs-target="#makeInvestment" style="box-shadow: 4px 3px 4px grey;" class="btn btn-success">Invest</button>		
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-12 col-lg-3">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-0 text-primary text-center font-weight-bold">Balance</h5>
								
								</p>
								<div class="progress mt-3" style="height:7px;">
									<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
									<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
									<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="mt-3"></div>
								<div class="d-flex align-items-center">
									<div class="flex-grow-1 ms-2">
										<h3 class="mb-0 text-secondary font-weight-bold">1,756 USD</h3>
									</div>	
								</div>
                                <div class="progress mt-3" style="height:7px;">
									<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
									<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
									<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								
								
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-9">
						<div class="card">
							<div class="card-body">
                            <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                <th>Transaction ID</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody><tr>
                                <td>Iphone 5</td>
                                <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
                                <td>#9405822</td>
                                
                                <td>$1250.00</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info">Details</button> 
                                </td>
                                </tr>
                             </tbody>
                            </table>
					        </div>
					        </div>
								
									
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
             <!-- Modal -->
             <div class="modal fade" id="makeInvestment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter a Name</label>
                                    <input type="text" v-model="investment.name" class="form-control" 
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a descriptive Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input @keyup="percentageIncrement()" type="text" v-model="investment.amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount in USD">  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Increment</label>
                                    <input  v-model="investment.increment" type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" placeholder="20% Monthly Increment">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button v-on:click="invest()" type="button" class="btn btn-primary">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <!-- /End Modal -->

              <!-- Modal -->
              <div class="modal fade" id="withdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input  type="text" class="form-control" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" placeholder="Enter Amount in USD">
                                   
                                </div>
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Modal -->
		</div>
		<!--end page wrapper -->
		<!--start overlay-->      
        <textarea name="" style="display: none;" id="createInvestment" cols="30" rows="10">{{ route('users.invest') }}</textarea>
	</div>
        @endsection
		<!--end page wrapper -->
		<!--start overlay-->
	

    @section('script')
        <script src="{{ asset('assets/js/app/investment.js') }}"></script>
    @endsection
</html>