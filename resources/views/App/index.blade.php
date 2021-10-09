@extends('Layout.new-master')
@section('title')
<title>All Resources</title>
@endsection

@section('content')
        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
           @include('Includes.main-header')
            <!-- Main Content Area -->
            <div class="main-content">  
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <div class="col-12">
                            <div class="card mb-30">
                                <div class="card-body py-5">
                                    <div class="d-flex align-items-center">
                                        <div class="icon font-30 text-primary">
                                            <img src="{{ asset('UI-assets/icons/profile-user.svg') }}" alt="" width="50" height="50">
                                            
                                        </div>
                                        <div class="icon-text pl-4">
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                    <p class="mt-4 mb-0">i accis totam, adipisci repudiandae
                                         doloremque temporibus!</p> <span class="btn btn-sm btn-primary rounded-pill hover-translate-y-n3 mt-4">{{ $total_roi }}&nbsp;&nbsp;BTC</span>
                                </div>
                            </div>
                        </div>      
                    </div>
                    <!-- end row -->

                    <!-- <div class="row">
                        <div class="col-12 height-card box-margin">
                            <div class="card text-center bg-boxshadow">
                                <div class="card-header border-bottom-0">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5>Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                <div class="card-footer  border-top-0 text-muted">
                                    6 days ago
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Footer Area -->
                @include('Includes.footer')
            </div>
        </div>
@endsection

@section('script')

@endsection