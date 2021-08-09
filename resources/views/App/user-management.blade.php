@extends('Layout.new-master')
@section('title')
<title>User Management</title>
@endsection

@section('content')
        <!-- Page Content -->
<div class="ecaps-page-content">
    <!-- Top Header Area -->
    @include('Includes.main-header')
    <!-- Main Content Area -->
    <div class="main-content" id="auth">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="animated-progressbar">
                        <div class="card">
                            <div class="card-body"> 
                                <button class="btn btn-info mt-15" data-toggle="modal" data-target="#createUser"><i class="fas fa-user-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @csrf
                <div class="col-lg-6 col-xl-4 height-card box-margin" v-for="(user, index) in users">
                    <div class="card">                
                        <div class="card-body">
                            <div class="single-smart-card d-flex">
                                <div class="icon mr-3">
                        
                                    <img src="{{ asset('UI-assets/icons/profile-user.svg')}}" width="40" height="40" alt="">
                                </div>
                                <div class="text">
                                    <h5 v-cloak>@{{ user.name }}</h5>
                                    <smaill v-cloak>@{{ user.user_type === "admin" ? "Admin" : "Regular" }}</small>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="dropdown right">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-ul"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:void(0);" @click="dialog(index)" data-toggle="modal" title="Edit" data-target="#editUser"><i class="fas fa-pen-fancy" style="width:15px; height:15px;"></i></a>
                            <hr>
                                <a class="dropdown-item" @click="deleteUser(user.id)" title="delete" href="javascript:void(0);"><i class="fas fa-trash" style="width:15px; color:red; height:15px;"></i></a>
                            <hr>
                        </div>
                    </div>  
                    </div>
                        
                </div>

                <!-- Modal  -->
                <div class="modal inmodal" id="createUser" tabindex="-1" role="dialog" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                            
                            </div>
                            <div class="modal-body">
                                <div class="form-group"><input type="text" v-model="account.name"  placeholder="Enter Name" class="form-control"></div>
                                <div class="form-group"><input type="text" v-model="account.email" placeholder="Enter Email Address" class="form-control"></div>
                                <div class="form-group"><input type="text" v-model="account.nationality" placeholder="Enter Nationality" class="form-control"></div>
                                <div class="form-group"><input type="text" v-model="account.mobile" placeholder="Enter Mobile Number" class="form-control"></div>
                                <div class="form-group"><input type="password"  v-model="account.password" placeholder="Enter Password" class="form-control"></div>
                                <div class="form-group"><input type="password"  v-model="account.password_confirmation" placeholder="Confrim Password" class="form-control"></div>

                                <div class="form-group">
                                    <select name="" id="" class="form-control" v-model="account.user_type">
                                        <option value="" disabled>Role</option>
                                        <option value="admin" >Admin</option>
                                        <option value="support">Support</option>
                                        <option value="regular">Regular</option>
                                    </select>
                                </div>
                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button"  @click="createUser()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


        <!-- Edit User Modal -->
            <div class="modal inmodal" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                        
                        </div>
                        <div class="modal-body">
                            <div class="form-group"><input type="text" v-model="editUsers.name" placeholder="Enter Name" class="form-control"></div>
                            <div class="form-group"><input type="text"  v-model="editUsers.email" placeholder="Enter Email Address" class="form-control"></div>
                            <div class="form-group"><input type="text"  v-model="editUsers.nationality" placeholder="Nationality" class="form-control"></div>
                            <div class="form-group"><input type="text"  v-model="editUsers.mobile" placeholder="Enter Mobile" class="form-control"></div>
                            <div class="form-group"><input type="password" v-model="editUsers.password" placeholder="Enter Password" class="form-control"></div>
                            <div class="form-group"><input type="password" v-model="editUsers.password_comfirmation" placeholder="Enter Password" class="form-control"></div>

                            <div class="form-group">
                                <select name="" id="" class="form-control" v-model="editUsers.user_type">
                                    <option value="" disabled>Role</option>
                                    @if(Auth::user()->user_type === "admin")
                                        <option value="admin">Admin</option>
                                    @endif
                                    <option value="support">Support</option>
                                    <option value="regular">Regular</option>
                                </select>
                            </div>
                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" @click="updateUser()" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        <!--/  -->
        </div>


        </div>
        
        <textarea name="" id="create_users" style="display: none;">{{ route('admin.user.create') }}</textarea>
        <textarea name="" id="update_users" style="display: none;">{{ route('admin.user.update') }}</textarea>
        <textarea name="" id="users" style="display: none;" cols="30" rows="10">{{ route('user.admin.management') }}</textarea>
        <textarea name="" id="all-users" style="display: none;">{{ json_encode($users) }}</textarea>

        <!-- Footer Area -->
        @include('Includes.footer')
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/app/user_account.js') }}"></script>    
@endsection
