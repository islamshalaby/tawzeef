<!DOCTYPE html>
<html lang="en">
<head>
	@include('head')
</head>
<body id="bg">
<div id="loading-area"></div>
<div class="page-wraper">
	<!-- header -->
    @include('header')
    <!-- header END -->
    @yield('content')
	<!-- Footer -->
    @include('footer')
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
@include('scripts')
@yield('formsubmit')

</body>
</html>