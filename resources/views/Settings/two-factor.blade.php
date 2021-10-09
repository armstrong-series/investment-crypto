@extends('Layout.settings-master')
@section('title')
<title>Security| Two Factor</title>
@endsection

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    @section('content')

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
            @include('Includes.main-header')
            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 box-margin">
                            <div class="card mb-30">
                                <img src="{{ asset('UI-assets/img/blog-img/4.jpg') }}" class="profile-cover-img" alt="thumb">
                                <div class="card-body text-center">
                                    <h6 class="font-20 mb-1">Jhon Alin Deo</h6>
                                    <p class="font-13 text-dark">Web Developer</p>

                                    <div class="hire">
                                        <!-- <button class="btn btn-danger btn-sm mr-2 mb-2">Hire me</button> -->
                                        <strong class="text-info text-center">Enable Two Factor Authentication</strong>
                                        <div class="new-checkbox">
                                        <!-- Rectangular switch -->
                                    
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- ./profile -->
                        </div>

                        <div class="col-md-6 box-margin">
                            <div class="profile-crm-area">
                                <div class="card mb-30">
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs profile-tab" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">Basic</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false">Invoice</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <!--first tab-->
                                            <div class="tab-pane fade active show" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                                <div class="card-body">
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Full Name</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <span class="profile-info">Jhon Alin Deo</span>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Gender</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <span class="profile-info">Male</span>
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


@section('scripts')

@endsection
