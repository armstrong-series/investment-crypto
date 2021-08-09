@extends('Layout.settings-master')
@section('title')
<title>Clusterwink | Settings</title>
@endsection


@section('styles')
<style>
    .fileUpload {
      position: relative;
      overflow: hidden;
      margin: 10px;
      }
    .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
    }
    * {
    box-sizing: border-box;
    }

    img.np-preview {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 5px;
        height: 230px;
        width: 400px;
        margin: 10px;
      }

</style>
@endsection
@section('content')
        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
           @include('Includes.main-header')
            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid" id="profile">      
                	<div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card mb-30">
                                   <!-- <div class="profile-cover-img np-image-preview" v-if="imageFile != null && imageFile.length != 0" >
                                        <img class="np-preview" :src="imageFile" />
                                    </div> -->
                                <img src="{{ asset('UI-assets/img/blog-img/4.jpg') }}" class="profile-cover-img" alt="thumb">
                                <div class="card-body text-center">
                                    <h6 class="font-20 mb-1">{{ Auth::user()->name }}</h6>
                                    @if(Auth::user()->user_type === 'admin')
                                        <p class="font-13 text-dark">Admin</p>
                                    @elseif(Auth::user()->user_type === 'support')
                                        <p class="font-13 text-dark">Support</p>
                                        @elseif(Auth::user()->user_type === 'regular')
                                        <p class="font-13 text-dark">Regular</p>
                                    @endif
                               
                                     <div  class="hire fileUpload px-5 py-2 mr-2 mb-2" title="upload a profile">
                                         <!-- <span>Change Picture</span>&nbsp;&nbsp;<i v-if="!imageFile" class="fas fa-file-image"></i> -->
                                         <img src="{{ asset('UI-assets/icons/camera.svg')}}"  width="80px" height="80px;" alt="change-profile">
								        <input  type="file" id="uploadBtn file"  name="slides" @change="showImagePreview(event)" accept="image/*"   ref="file" class="form-control upload">
							        </div>

                                    <div class="col">
                                             <a href="{{ route('auth.logout') }}" title="Logout"><img src="{{ asset('UI-assets/icons/turn-off.svg')}}"  width="60px" height="60px;" alt="logout"></a>                                               
                                       </div> 
                                    
                                </div>
                            </div>
                            <!-- ./profile -->

                        </div>

                        <div class="col-12 col-md-8">
                            <div class="profile-crm-area">
                                <div class="card mb-30">
                                    <div class="card-body">
                                      
                                        <div class="tab-content" id="myTabContent">
                                            <!--first tab-->
                                            <div class="tab-pane fade active show" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                                <div class="card-body">
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Name</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                           <input type="text" class="form-control" placeholder="Enter Name">
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Email</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <span class="profile-info">{{ Auth::user()->email }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Password</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <input type="password" class="form-control" placeholder="Enter Password">
                                                        </div>
                                                    </div>
                                                    

                                                   
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Confirm Password</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <input type="password" class="form-control" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        
                                                        <div class="col-xl-7 col-sm-9">
                                                            <button class="btn btn-sm btn-primary" type="button">Update</button>
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
                </div>

                <!-- Footer Area -->
                @include('Includes.footer')
            </div>
        </div>
@endsection

@section('script')
<script src="{{ asset('assets/js/app/settings/profile.js') }}"></script>
@endsection