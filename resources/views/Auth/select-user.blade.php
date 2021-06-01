@extends('Layouts.auth')

@section('title')
<title>Account |Login</title>
@endsection

@section('auth-content')
<div class="page-content">

<!--login start-->

        <section>
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-7 col-12">
                <img class="img-fluid" src="{{ asset('auth/assets/images/login.png') }}" alt="">
            </div>
            <div class="col-lg-5 col-12">
                <div>
                <h2 class="mb-3">How do you want to join us?</h2>
                <div class="dropdown">
						<button class="btn btn-outline-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Make Preference
						</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item"  href="">Regular</a>
                        <a class="dropdown-item"  href="">Agent</a>
                    </div>
					</div>
                <div class="d-flex align-items-center mt-4"> <span class="text-muted me-1">Have an account?</span>
                    <a href="{{ route('login')}}">Signin</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!--login end-->
     

<!--newsletter end-->

</div>
@endsection