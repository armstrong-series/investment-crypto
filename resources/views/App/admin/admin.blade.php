@extends('Layout.new-master')
@section('title')
<title>Administrator</title>
@endsection

@section('content')

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo mr-3 mr-sm-4">
                        <a href="index.html"><img src="img/core-img/small-logo.png" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="ecaps-triggers mr-1 mr-sm-3">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class="fa fa-reorder"></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">
                        <!-- Left Side Nav -->
                        <li class="hide-phone app-search">
                            <form role="search" class=""><input type="text" placeholder="Search..." class="form-control"> <button type="submit" class="mr-0"><i class="fa fa-search"></i></button></form>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Top Message Area -->
                                <div class="top-message-area">
                                    <!-- Heading -->
                                    <div class="top-message-heading">
                                        <div class="heading-title">
                                            <h6>Messages</h6>
                                        </div>
                                        <span>07 New</span>
                                    </div>
                                    <div class="message-box" id="messageBox">
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/10.png" alt="">
                                            <span class="message-text">
                                                <span>Jhon Lina</span>
                                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, voluptas!</span>
                                            </span>
                                        </a>
                                        <span class="message-heading">New Messages</span>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/11.png" alt="">
                                            <span class="message-text">
                                                <span>Google Ads: You'll get a refund soon</span>
                                                <span>27 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/7.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/8.png" alt="">
                                            <span class="message-text">
                                                <span>The Complete JavaScript Handbook</span>
                                                <span>1 hour ago</span>
                                            </span>
                                        </a>
                                        <span class="message-heading">Hot Messages</span>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/9.png" alt="">
                                            <span class="message-text">
                                                <span>New comment: ecaps Template</span>
                                                <span>2 days ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/10.png" alt="">
                                            <span class="message-text">
                                                <span>6-hour video course on Angular</span>
                                                <span>3 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/11.png" alt="">
                                            <span class="message-text">
                                                <span>Google Ads: You'll get a refund soon</span>
                                                <span>27 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/12.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="active-status"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Top Notifications Area -->
                                <div class="top-notifications-area">
                                    <!-- Heading -->
                                    <div class="notifications-heading">
                                        <div class="heading-title">
                                            <h6>Notifications</h6>
                                        </div>
                                    </div>

                                    <div class="notifications-box" id="notificationsBox">
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/1.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/2.png" alt="">
                                            <span class="message-text">
                                                <span>Andrew Done Project</span>
                                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, quam.</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/3.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/4.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/5.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/6.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <img src="img/member-img/7.png" alt="">
                                            <span class="message-text">
                                                <span>New Feature: HTTP Method Selection</span>
                                                <span>56 min ago</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/member-img/4.png" alt=""></button>
                            <div class="dropdown-menu header-profile dropdown-menu-right">
                                <!-- User Profile Area -->
                                <div class="user-profile-area">
                                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-account profile-icon" aria-hidden="true"></i> My profile</a>
                                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-email-open profile-icon" aria-hidden="true"></i> Messages</a>
                                    <a href="#" class="dropdown-item"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i> Account settings</a>
                                    <a href="#" class="dropdown-item"><i class="ti-unlink profile-icon" aria-hidden="true"></i> Sign-out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xl-4">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="float-right"><i class="fa fa-id-badge text-primary font-30"></i></div>
                                    <span class="badge badge-primary">Sessions</span>
                                    <h4 class="my-3">{{ $count_regulars }}</h4>
                                    <p class="mb-0"><span class="text-success"></span>Regular(s)</p>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="float-right"><i class="fa fa-bar-chart-o font-30"></i></div><span class="badge badge-success">Avg.Sessions</span>
                                    <h4 class="my-3">00:28</h4>
                                    <p class="mb-0"><span class="text-danger"><i class="fa fa-level-down mr-1" aria-hidden="true"></i>1.4%</span>Supported Coin</p>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                        <div class="col-xl-4">
                            <div class="card box-margin">
                                <div class="card-body">
                                    <div class="float-right"><i class="fa fa-codiepie text-warning font-30"></i></div><span class="badge badge-warning">Bounce Rate</span>
                                    <h4 class="my-3">$2500</h4>
                                    <p class="mb-0"><span class="text-danger"><i class="fa fa-level-down mr-1" aria-hidden="true"></i>45%</span> Bounce Rate Weekly</p>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>


                </div>

              
            </div>
        </div>
 @endsection

@section('script')

@endsection
 