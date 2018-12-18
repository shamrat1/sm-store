
<!DOCTYPE html>
<html>
@include('partials._head')
@yield('css')
<body>
@include('partials._header')
@if(Session::has('message'))
	<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('index') }}">Home</a><span>|</span></li>
				<li>@yield('breadcrumb')</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="{{ route('category.single','apple') }}">Apple</a></li>
						<li><a href="{{ route('category.single','samsung') }}">Samsung</a></li>
						<li><a href="{{ route('category.single','motorola') }}">Motorola</a></li>
						<li><a href="{{ route('category.single','xiaomi') }}">Xiaomi</a></li>

						<li><a href="{{ route('category.single','lenevo') }}">Lenevo</a></li>

						<li><a href="{{ route('category.single','oneplus') }}">OnePlus</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		@yield('content')

@include('partials._footer')
	<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script>
            $(document).ready(function(){
                $(".dropdown").hover(
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                        $(this).toggleClass('open');
                    },
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                        $(this).toggleClass('open');
                    }
                );
            });
		</script>
		<!-- here stars scrolling icon -->
		<script type="text/javascript">
            $(document).ready(function() {
                /*
                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                    };
                */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
		</script>
</body>
</html>