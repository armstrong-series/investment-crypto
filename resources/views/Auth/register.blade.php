@extends('Layout.auth')

@section('title')
<title>Account | Create</title>

@endsection

@section('auth-content')
<div class="page-content">

<!--login start-->

        <section>
        <div class="container" id="auth">
            <div class="row align-items-center">
            <div class="col-lg-7 col-12">
                <img class="img-fluid" src="{{ asset('assets/images/authentication.svg') }}" alt="">
            </div>
            <div class="col-lg-5 col-12">
                <div>
                <h2 class="mb-3">Create an Account</h2>
                <form method="post" action="">
                 @csrf
                    <div class="messages"></div>
                    <div class="form-group">
                    <input id="form_name" v-model="account.name" type="text" name="name" class="form-control" placeholder="Name" required="required" data-error="Name is required">
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                     <input id="form_email" v-model="account.email" type="text" name="email" class="form-control" placeholder=" Email Address" required="required" data-error="password is required.">
                    <div class="help-block with-errors"></div>
                    </div>
                    <input id="form_phone" v-model="account.nationality" type="text" name="phone" class="form-control" placeholder="Nationality" required="required" data-error="phone number is required.">
                    <div class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group">
                    <input id="form_password" v-model="account.password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                    <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                    <input id="form_password" type="password" v-model="account.password_confirmation"  name="password_confirmation" class="form-control" placeholder="Confirm Password" required="required" data-error="password is required.">
                    <div class="help-block with-errors"></div>
                    </div> 
                    <button type="button" v-on:click="createAccount()" class="btn btn-primary">Signup</button>
                </form>
                <div class="d-flex align-items-center mt-4"> <span class="text-muted me-1">Have an account?</span>
                    <a href="{{ route('login')}}">Signin</a>
                </div>
                </div>
            </div>
            </div>
                  <textarea name=""  style="display:none;" id="create" cols="30" rows="10">{{ route('auth.register.account') }}</textarea>
        </div>
        </section>

        <!--login end-->
     

<!--newsletter end-->

</div>
@endsection

@section('script')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/js/app/user_account.js') }}"></script>
    
    
@endsection