<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Martin & Ignacia Colinares Family</title>

    <!-- Bootstrap -->
    <link href="{{ asset('guest/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('guest/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('guest/css/jquery.bxslider.css') }}">
	<link href="{{ asset('guest/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom_leo.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js') }} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    @yield('css')
  </head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118957900-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-118957900-1');
	</script>
  <body>
  	<!--facebook comment plugin-->
  	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1956644901035697&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!--end facebook comment plugin-->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}"><span>Martin Ignacia Colinares</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ url('/') }}">Home</a></li>
						<li role="presentation" class="{{ Request::is('ourstory') ? 'active' : ''}}"><a href="{{ url('ourstory') }}">Our Story</a></li>
						<li role="presentation" class="{{ Request::is('events') ? 'active' : ''}}"><a href="{{ url('events') }}">Events</a></li>
						<li role="presentation" class="{{ Request::is('gallery') ? 'active' : ''}}"><a href="{{ url('gallery') }}">Gallery</a></li>
						<li role="presentation" class="{{ Request::is('contact') ? 'active' : ''}}"><a href="{{ url('contact') }}">Contact</a></li>	
						<li role="presentation" class="{{ Request::is('tree') ? 'active' : ''}}"><a href="{{ url('tree') }}">Tree</a></li>						
						<li role="presentation" class="{{ Request::is('movies/category/*') ? 'active' : ''}}"><a href="{{ route('movies.category', ['category'=> 'latest']) }}">Movies</a></li>						
						<li style="display:none" role="presentation" class="{{ Request::is('login') ? 'active' : ''}}"><a href="{{ route('login') }}">Login</a></li>						
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	
	@yield('content')
	
	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 f-about">
						<a href="index.html"><h1>Martin & Ignacia Family</h1></a>
						<p>
							Family isn’t always blood. It’s the people in your life who want you in theirs; the ones who accept you for who you are. 
							The ones who would do anything to see you smile & who love you no matter what.
						</p>
						
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Latest Posts</h3>
						<ul>
							<li><a href="#">Coming soon.</a></li>
							<li><a href="#">Coming soon.</a></li>
							<li><a href="#">Coming soon.</a></li>
							<li><a href="#">Coming soon.</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> support@virneza.com</p></a>
						<p><i class="fa fa-phone"></i>  +966593326104</p>
						<p><i class="fa fa-home"></i> Sacred Heart Village, <br>
							Corazon Catmon <br>
							Cebu Philippines</p>
					</div>
				</div>
			</div>
		</div>
			
		<div class="last-div">
			<div class="container">
				<div class="row">					
					<div class="copyright">
						© 2018 Martin & Ignacia Family | <a href="http://virneza.com">VirNeza</a>
					</div>	
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=MeFamily
                    -->				
				
		
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fab fa-facebook-f fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fab fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fab fa-linkedin-in fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fab fa-pinterest-p fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fab fa-google-plus-g fa-1x"></i></a></li>
					</ul>
				</div>
			</div>
		</div>		
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('guest/js/jquery-2.1.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('guest/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('guest/js/wow.min.js') }}"></script>
	<script src="{{ asset('guest/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('guest/js/jquery.bxslider.min.js') }}"></script>
	<script src="{{ asset('guest/js/jquery.isotope.min.js') }}"></script>
	<script src="{{ asset('guest/js/fancybox/jquery.fancybox.pack.js') }}"></script>
	<script src="{{ asset('guest/js/functions.js') }}"></script>
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>
	@yield('js')
  </body>
</html>