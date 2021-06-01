<!DOCTYPE html>
<html lang="en">

<head>

<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="Nairax Delivery service. Bring people to get job" />
<meta name="description" content="Bootstrap 5 Landing Page Template" />
<meta name="author" content="www.themeht.com" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon Icon -->
<link rel="shortcut icon" href="{{ asset('auth/assets/images/favicon.ico') }}" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="{{ asset('auth/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<!--== animate -->
<link href="{{ asset('auth/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

<!--== line-awesome -->
<link href="{{ asset('auth/assets/css/line-awesome.min.css') }}" rel="stylesheet" type="text/css" />

<!--== magnific-popup -->
<link href="{{ asset('auth/assets/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

<!--== owl.carousel -->
<link href="{{ asset('auth/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />

<!--== lightslider -->
<link href="{{ asset('auth/assets/css/lightslider.min.css') }}" rel="stylesheet" type="text/css" />

<!--== spacing -->
<link href="{{ asset('auth/assets/css/spacing.css') }}" rel="stylesheet" type="text/css" />

<!--== theme.min -->
<link href="{{ asset('auth/assets/css/theme.min.css') }}" rel="stylesheet" />

<!-- inject css end -->

</head>
@yield('title')

<body>

<!-- page wrapper start -->

<div class="page-wrapper">
  




<!--hero section start-->



<!--hero section end--> 


<!--body content start-->
@yield('auth-content')

<!--body content end--> 




</div>


<script src="{{ asset('auth/assets/js/theme-plugin.js') }}"></script>
<script src="{{ asset('auth/assets/js/theme-script.js') }}"></script>
@yield('script')
</body>
</html>
