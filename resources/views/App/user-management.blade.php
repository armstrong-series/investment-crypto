@extends('Layout.master')

@section('title')
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<body>
	<!--wrapper-->
	<div class="wrapper" id="auth">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <button type="button" style="border-radius: 50%; box-shadow: 3px 4px 4px grey;"  class="btn btn-md btn-primary" data-bs-toggle="modal"
                         data-bs-target="#users" >+</button>  
					   
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0"></h6>
						<hr/>
						<div class="card">
							<div class="card-body">
                            <!-- <div class="card">
                                <div class="card-body"> -->
                                    <table class="table mb-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nationality</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(user, index) in users">
                                                <td v-cloak>@{{ user.name }}</td>
                                                <td v-cloak>@{{ user.email }}</td>
                                                <td v-cloak>@{{ user.nationality }}</td>
                                                <td v-cloak>@{{ user.user_type }}</td>
                                                <td v-cloak>
                                    
                                                    <button type="button" @click="dialog(index)" class="btn btn-md" data-bs-toggle="modal" data-bs-target="edit" ><i class="lni lni-pencil"></i></button> 
                                                    <button type="button" class="btn btn-sm"><i class="lni lni-trash"></i></button>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                <!-- </div>
						    </div> -->
                           
					    </div>

                            <!-- Modal -->
                            <div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" v-model="account.name" class="form-control" placeholder="Enter Username">
                                        </div>
                                        <label for="">Email</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="account.email" class="form-control" placeholder="Enter Email Address">
                                        </div>
                                        <label for="">Nationality</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="account.nationality" class="form-control" placeholder="Nationality">
                                        </div>
                                        <label for="">Mobile</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="account.mobile" class="form-control" placeholder="Enter your Mobile">
                                        </div>
                                        <label for="">Password</label>
                                        <div class="form-group">
                                            <input type="password"v-model="account.password" class="form-control" placeholder="Enter Password">
                                        </div>
                                        <label for="">Confirm Password</label>
                                        <div class="form-group">
                                            <input type="password" v-model="account.password_confirmation" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        
                                            <label for="">User Role</label>
                                        <div class="form-group">
                                            <select name="" id="" v-model="account.user_type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="admin">Admin</option>
                                                <option value="support">Support</option>
                                                <option value="regular">Regular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button  @click="createUser()" type="button" class="btn btn-primary btn-md">Proceed</button>

                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /End modal -->

                             <!-- Modal -->
                             <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" v-model="editUsers.name" class="form-control" placeholder="Enter Username">
                                        </div>
                                        <label for="">Email</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="editUsers.email" class="form-control" placeholder="Enter Email Address">
                                        </div>
                                        <label for="">Nationality</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="editUsers.nationality" class="form-control" placeholder="Nationality">
                                        </div>
                                        <label for="">Mobile</label>
                                        <div class="form-group">
                                            <input type="text"  v-model="editUsers.mobile" class="form-control" placeholder="Enter your Mobile">
                                        </div>
                                        <label for="">Password</label>
                                        <div class="form-group">
                                            <input type="password"v-model="editUsers.password" class="form-control" placeholder="Enter Password">
                                        </div>
                                        <label for="">Confirm Password</label>
                                        <div class="form-group">
                                            <input type="password" v-model="editUsers.password_confirmation" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        
                                            <label for="">User Role</label>
                                        <div class="form-group">
                                            <select name="" id="" v-model="editUsers.user_type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="admin">Admin</option>
                                                <option value="support">Support</option>
                                                <option value="regular">Regular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button  @click="createUser()" type="button" class="btn btn-primary btn-md">Proceed</button>

                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /End modal -->
							</div>
						</div>
                        <hr/>
					</div>
				</div>
				<!--end row-->
			</div>

		</div>
        <textarea name="" id="create_users" style="display: none;">{{ route('admin.user.create') }}</textarea>
        <textarea name="" id="update_users" style="display: none;">{{ route('admin.user.update') }}</textarea>
        <textarea name="" id="users" style="display: none;" cols="30" rows="10">{{ route('user.admin.management') }}</textarea>
        <textarea name="" id="all-users" style="display: none;">{{ json_encode($users) }}</textarea>
    	<!--end page wrapper -->
	@endsection


	@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	 <script src="{{ asset('assets/js/app/user_account.js') }}"></script>
	@endsection
</body>
</html>