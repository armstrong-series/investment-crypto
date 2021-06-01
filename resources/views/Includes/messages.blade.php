<!-- 
<style>
.alert-danger{
    background-color: none;
}
.alert{
    color: maroon;
    font-family: sans-serif;
}
</style> -->

@if(Session::has('successMessage'))

<div class="alert alert-success">
  {{Session::get('successMessage')}}
</div>
 {{Session::forget('successMessage')}}

@endif

@if(Session::has('errorMessage'))
  <div class="alert alert-danger">
    {{Session::get('errorMessage')}}
  </div>
   {{Session::forget('errorMessage')}}
@endif

@if(count($errors)>0)
    <div class="alert alert-danger col-md-12">
        <div class="col-md-12" style="font-size: 12px;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
@endif
