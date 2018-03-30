<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Me & Family Bootstrap Template</title>

    <!-- Bootstrap -->
    <link href="{{ asset('guest/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('guest/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('guest/css/jquery.bxslider.css') }}">
	<link href="{{ asset('guest/css/style.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js') }} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
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
				<a class="navbar-brand" href="index.html"><span>Colinares Family</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation"  class="active"><a href="index.html">Home</a></li>
						<li role="presentation"><a href="{{ url('ourstory') }}">Our Story</a></li>
						<li role="presentation"><a href="{{ url('events') }}">Events</a></li>
						<li role="presentation"><a href="{{ url('gallery') }}">Gallery</a></li>
						<li role="presentation"><a href="{{ url('contact') }}">Contact</a></li>						
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
						<a href="index.html"><h1>Me & Family</h1></a>
						<p>We possess within us two minds. So far I have written only of the conscious mind. I would now like to introduce you to your second mind, the hidden and mysterious subconscious. Our subconscious mind contains such power.</p>
						
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Latest Posts</h3>
						<ul>
							<li><a href="#">This is awesome post title</a></li>
							<li><a href="#">Awesome features are awesome</a></li>
							<li><a href="#">Create your own awesome website</a></li>
							<li><a href="#">Wow, this is fourth post title</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> example@gmail.com</p></a>
						<p><i class="fa fa-phone"></i>  +345 578 59 45 416</p>
						<p><i class="fa fa-home"></i> Me & Family inc  |  PO Box 23456 
							Little Lonsdale St, New York <br>
							Victoria 8011 USA</p>
					</div>
				</div>
			</div>
		</div>
			
		<div class="last-div">
			<div class="container">
				<div class="row">					
					<div class="copyright">
						© 2014 Me & Family Multi-purpose theme | <a href="http://bootstraptaste.com">Bootstraptaste</a>
					</div>	
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=MeFamily
                    -->				
				
		
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
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
  </body>
</html>