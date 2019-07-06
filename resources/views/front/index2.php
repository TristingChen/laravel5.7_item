<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from edena-creative-multipurpose-bootstrap-theme.little-neko.com/files/shop-home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2015 04:30:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

	<!-- Basic Page Needs ================================================== -->
	<meta charset="utf-8">
	<title>云城</title>
	<meta name="description" content="neko-description">

	<!-- Mobile Specific Metas ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS ================================================== -->

	<!-- web font  -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
	<!-- External plugins -->
	<!-- Revolution slider  -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/front/js-plugins/rs-plugin/css/settings.css') }}" media="screen" />


	<!-- Neko framework  -->
	<link type="text/css" rel="stylesheet" href="{{ asset('/front/custom-icons/css/custom-icons.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('/front/neko-framework/external-plugins/external-plugins.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('/front/neko-framework/css/layout/neko-framework-layout.css') }}">
	<link type="text/css" rel="stylesheet" id="color" href="{{ asset('/front/neko-framework/css/color/neko-framework-color.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('/front/css/custom.css') }}">

	<!-- Favicons ================================================== -->
	<link rel="shortcut icon" href="{{ asset('/front/images/favicon.ico') }}">
	<link rel="apple-touch-icon" href="{{ asset('/front/images/apple-touch-icon.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/front/images/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/front/images/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/front/images/apple-touch-icon-144x144.png') }}">

	<script src="{{ asset('/front/neko-framework/external-plugins/modernizr/modernizr.custom.js') }}"></script>

</head>
<body class="activate-appear-animation header-7 pre-header-on">

	<!-- global-wrapper -->
	<div id="global-wrapper">
		<!-- header -->

		<header class="menu-header navbar-fixed-top" role="banner">
			<section id="pre-header" class="dark-main-color shop-pre-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-8">
							<ul class="quick-menu">
								<li><a href="#" class="linkLeft">My account</a></li>
								<li><a href="login.html">Sign in</a></li>
								<li><a href="register.html">Sign up</a></li>
							</ul>					
						</div>
						<div class="col-xs-4 text-right">

							<a href="#" class="btn default cart"><i class="icon-glyph-13"></i> <span class="hidden-xs">Shopping</span> cart</a>
							<div class="shopping-cart-view animated-fast">
								<table>
									<thead>
										<tr>
											<th class="hidden-xs"></th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Total</th>
										</tr>
									</thead>

									<tbody>

										<tr>
											<td class="hidden-xs"><img src="{{ asset('/front/images/shop/cart-product-1.jpg') }}" alt="edena"></td>
											<td>French coat</td>
											<td>2</td>
											<td>$44</td>
											<td>$88</td>
										</tr>
										<tr>
											<td class="hidden-xs"><img src="{{ asset('/front/images/shop/cart-product-2.jpg') }}" alt="edena"></td>
											<td>Silk dress</td>
											<td>1</td>
											<td>$259</td>
											<td>$259</td>
										</tr>
										<tr class="shopping-cart-total">
											<td colspan="5">
												<strong class="text-uppercase">Total: $357</strong>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="btn-group">
									<a href="#" class="btn primary small">View cart</a>
									<a href="#" class="btn default small">Check out</a>
								</div>



							</div>
						</div>
					</div>
				</div>
			</section>
			
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<!-- hamburger button -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- / hamburger button -->

						<!-- Logo -->
						<a class="navbar-brand" href="index.html"><img src="{{ asset('/front/images/main-logo.png') }}" alt="EDENA website template"/></a>
						<!-- /Logo -->
					</div>
					<div class="collapse navbar-collapse">
						<!-- Main navigation -->
						<ul class="nav navbar-nav navbar-right">
							<li class="neko-mega-menu-trigger">
								<a href="index.html" class="has-sub-menu">Home</a>
							</li>

							<li><a href="download.html">Download</a></li>
							

						</ul>
						<!-- / End main navigation -->
					</div>


				</nav>
			</div>

		</header>
		<!-- header -->

		<!-- content -->
		<main id="content">
			<!--revolution slider -->
			<section id="rs-slider-elements" class="light-color custom-neko-skin pt shop-slider">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="tp-banner-container">
								<div class="tp-banner" >
									<ul>
										<!-- SLIDE  -->
										<li data-transition="fade" data-slotamount="5" data-masterspeed="700"  >
											<!-- MAIN IMAGE -->
											<img src="{{ asset('/front/images/shop/shop-slider-1.jpg') }}"   alt="slidebg1"  data-bgfit="cover" data-bgposition="top center" data-bgrepeat="no-repeat">

											<!-- LAYERS -->
											<!-- LAYER NR. 1 -->
											<div class="tp-caption sfb"
												data-x="center"
												data-y="center"
												data-hoffset="0"
												data-voffset="-60"
												data-speed="1000"
												data-start="500"
												data-easing="Back.easeInOut"
												data-endspeed="300"
												style="z-index: 6">
												<h1 class="x-large text-light">EDENA FASHION</h1>
											</div>

											<!-- LAYER NR. 2 -->
											<div class="tp-caption sfl"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="0"
												data-speed="700"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><h2 class="text-light">Store for modern women</h2>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption sfb slider-btn-wrapper"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="50"
												data-speed="1000"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><a href="shop-products.html" class="btn default">See collections</a>
											</div>


										</li>
										<!-- SLIDE  -->
										<li data-transition="fade" data-slotamount="5" data-masterspeed="700"  >
											<!-- MAIN IMAGE -->
											<img src="{{ asset('/front/images/shop/shop-slider-2.jpg') }}"   alt="slidebg1"  data-bgfit="cover" data-bgposition="top center" data-bgrepeat="no-repeat">

											<!-- LAYERS -->
											<!-- LAYER NR. 1 -->
											<div class="tp-caption sfb"
												data-x="center"
												data-y="center"
												data-hoffset="0"
												data-voffset="-60"
												data-speed="1000"
												data-start="500"
												data-easing="Back.easeInOut"
												data-endspeed="300"
												style="z-index: 6">
												<h1 class="x-large text-light">Winter sales</h1>
											</div>

												<!-- LAYER NR. 2 -->
											<div class="tp-caption sfl"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="0"
												data-speed="700"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><h2 class="text-light">50% Off on all the collections</h2>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption sfb slider-btn-wrapper"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="50"
												data-speed="1000"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><a href="shop-products.html" class="btn default">Shop now</a>
											</div>


										</li><!-- SLIDE  -->
										<li data-transition="fade" data-slotamount="5" data-masterspeed="700"  >
											<!-- MAIN IMAGE -->
											<img src="{{ asset('/front/images/shop/shop-slider-3.jpg') }}"   alt="slidebg1"  data-bgfit="cover" data-bgposition="top center" data-bgrepeat="no-repeat">

											<!-- LAYERS -->
											<!-- LAYER NR. 1 -->
											<div class="tp-caption sfb"
												data-x="center"
												data-y="center"
												data-hoffset="0"
												data-voffset="-60"
												data-speed="1000"
												data-start="500"
												data-easing="Back.easeInOut"
												data-endspeed="300"
												style="z-index: 6">
												<h1 class="x-large text-light">Shop now!</h1>
											</div>

											<!-- LAYER NR. 2 -->
											<div class="tp-caption sfl"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="0"
												data-speed="700"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><h2 class="text-light">Stylish and casual wear</h2>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption sfb slider-btn-wrapper"
												data-x="center"
												data-y="center"
												data-hoffset="0" 
												data-voffset="50"
												data-speed="1000"
												data-start="1200"
												data-easing="Power4.easeOut"
												data-endspeed="300"
												data-endeasing="Power1.easeIn"
												data-captionhidden="off"
												style="z-index: 6"><a href="shop-products.html" class="btn default">Collections</a>
											</div>


										</li>

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

<!-- / revolution slider -->


<!-- sales -->
<section id="sales" class="pt pb">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 mb-xs">
				<figure class="caption-over">
					<img src="{{ asset('/front/images/shop/shop-ad-1.jpg') }}" alt="ad-1" class="responsive" />
					<figcaption class="box text-light">
						<h1><span>new arrivals</span>Winter collection</h1>
						<a href="shop-products.html" class="btn default">Shop now</a>
					</figcaption>
				</figure>

			</div>

			<div class="col-sm-6">
				<div class="row">
					<div class="col-md-12 mb mb-xs">
						<figure class="caption-over">
							<img src="{{ asset('/front/images/shop/shop-ad-2.jpg') }}" alt="ad-2" class="responsive" />
							<figcaption class="box text-light">
								<h1>Lifestyle</h1>
								<a href="shop-products.html" class="btn default">Shop now</a>
							</figcaption>
						</figure>
					</div>
					<div class="col-md-12">
						<figure class="caption-over center">
							<img src="{{ asset('/front/images/shop/shop-ad-3.jpg') }}" alt="ad-3" class="responsive" />
							<figcaption class="box text-light">
								<h1 class="x-large"><span>shoes</span>50%</h1>
								<h2 class="no-margin">off</h2>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>

	</div>


</section>


<!-- Featured -->
<section id="featured" class="rollover effect-zoe">
	<div class="container">
		<div class="row">

			<div class="col-md-3 col-sm-6">

				<article class="mb shop-product">

					<figure>
						<img src="{{ asset('/front/images/shop/product-1.jpg') }}" alt="EDENA premium website template" class="responsive">
						<figcaption>
							<div class="rollover-content">

								<p class="icon-links btn-group responsive">

									<a href="shop-item.html" title="product">
										<span class="icon-glyph-16"></span>view
									</a>
									<a href="#" title="cart">
										<span class="icon-glyph-13"></span> Add to cart
									</a>
								</p>
							</div>
						</figcaption>
					</figure>

					<div class="pt-small">
						<h2><span>Light Blue Denim Top</span>
							<span class="text-main-color large">$160</span>
						</h2>
					</div>

				</article>

			</div>

			<div class="col-md-3 col-sm-6">

				<article class="mb shop-product">

					<figure>
						<img src="{{ asset('/front/images/shop/product-2.jpg') }}" alt="EDENA premium website template" class="responsive">
						<figcaption>
							<div class="rollover-content">

								<p class="icon-links btn-group responsive">

									<a href="shop-item.html" title="product">
										<span class="icon-glyph-16"></span>view
									</a>
									<a href="#" title="cart">
										<span class="icon-glyph-13"></span> Add to cart
									</a>
								</p>
							</div>
						</figcaption>
					</figure>

					<div class="pt-small">
						<h2><span>Tan Leather Sleeve Coat</span>
							<span class="text-main-color large">$295</span>
						</h2>
					</div>

				</article>

			</div>

			<div class="col-md-3 col-sm-6">

				<article class="mb shop-product">

					<figure>
						<img src="{{ asset('/front/images/shop/product-3.jpg') }}"alt="EDENA premium website template" class="responsive">
						<figcaption>
							<div class="rollover-content">

								<p class="icon-links btn-group responsive">

									<a href="shop-item.html" title="product">
										<span class="icon-glyph-16"></span>view
									</a>
									<a href="#" title="cart">
										<span class="icon-glyph-13"></span> Add to cart
									</a>
								</p>
							</div>
						</figcaption>
					</figure>

					<div class="pt-small">
						<h2><span>Classic balck and white dress</span>
							<span class="text-main-color large">$295</span>
						</h2>
					</div>

				</article>


			</div>

			<div class="col-md-3 col-sm-6">

				<article class="mb shop-product">

					<figure>
						<img src="{{ asset('/front/images/shop/product-4.jpg') }}" alt="EDENA premium website template" class="responsive">
						<figcaption>
							<div class="rollover-content">

								<p class="icon-links btn-group responsive">

									<a href="shop-item.html" title="product">
										<span class="icon-glyph-16"></span>view
									</a>
									<a href="#" title="cart">
										<span class="icon-glyph-13"></span> Add to cart
									</a>
								</p>
							</div>
						</figcaption>
					</figure>

					<div class="pt-small">
						<h2><span>Long Sleeve T-Dress</span>
							<span class="text-main-color large">$270</span>
						</h2>
					</div>

				</article>


			</div>

		</div>							
	</div>
</section>
<!-- / sales -->

<!-- Social icons -->
<section>
	<div class="container">

		<div class="row mb" data-nekoanim="fadeInUp" data-nekodelay="200">
			<div class="col-md-12 text-center">
				<div class="main-color pt-medium pb-medium">
					<h2>Follow us</h2>

					<ul class="social-icons light-color circle large">
						<li><a href="#" class="rss" title="rss"><i class="icon-glyph-342"></i></a></li>
						<li><a href="#" class="facebook" title="facebook"><i class="icon-glyph-320"></i></a></li>
						<li><a href="#" class="twitter" title="twitter"><i class="icon-glyph-339"></i></a></li>
						<li><a href="#" class="gplus" title="gplus"><i class="icon-glyph-317"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- / Social icons -->

<!-- references -->
<section class="pb">
	<div class="container">

		<div class="row mb" data-nekoanim="fadeInUp" data-nekodelay="200">
			<div class="col-md-2 col-xs-6">
				<div class="mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo1.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo2.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo3.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class="mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo4.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>

			<div class="col-md-2 col-xs-6">
				<div class="mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo5.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<div class=" mb-xs mb-sm">
					<img src="{{ asset('/front/images/clients/logo6.png') }}" alt="EDENA premium website template" class="img-responsive"/>
				</div>
			</div>

		</div>


	</div>

</section>
<!-- / references -->


</main>
<!-- / content -->

<!-- footer -->
<footer id="main-footer">

	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="footer-widget">
					<img class="responsive" src="{{ asset('/front/images/logo-footer.png') }}" alt="" />
				</div>
			</div>

			<div class="col-sm-3">
				<div class="footer-widget clearfix">

					<h3>About us</h3>

					<ul class="list-unstyled list-icon arrow border">
						<li class="no-pt">Find a store</li>
						<li>Carreers</li>
						<li>Our brands</li>
						<li>Lifestyle</li>
						<li>Contact us</li>
					</ul>

				</div>

			</div>

			<div class="col-sm-3">
				<div class="footer-widget">

					<h3>New arrivals</h3>
					<ul class="list-unstyled list-icon arrow border">
						<li class="no-pt">Coats</li>
						<li>Shoes</li>
						<li>Handbags</li>
						<li>Sweaters</li>
						<li>Accesories</li>
					</ul>

				</div>
			</div>


			<div class="col-sm-3">
				<div class="footer-widget">
					<h3>Support</h3>
					<ul class="list-unstyled list-icon arrow border">
						<li class="no-pt">My account</li>
						<li>My order</li>
						<li>International shipping</li>
						<li>Return and exchange</li>
						<li>Gift cards</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</footer>
<!-- / footer -->
</div>
<!-- global wrapper -->

<!-- End Document ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{ asset('/front/neko-framework/js/jquery/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/front/neko-framework/js/jquery-ui/jquery-ui-1.8.23.custom.min.js') }}"></script>

<!-- external framework plugins -->
<script type="application/javascript" src="{{ asset('/front/neko-framework/external-plugins/external-plugins.min.js') }}"></script>
<!-- neko framework script -->
<script type="text/javascript" src="{{ asset('/front/neko-framework/js/neko-framework.js') }}"></script>

<!-- external custom plugins -->

<!-- Revolution slider -->
<script type="text/javascript" src="{{ asset('/front/js-plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/front/js-plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- neko custom script -->	
<script src="{{ asset('/front/js/custom.js') }}"></script>

</body>

<!-- Mirrored from edena-creative-multipurpose-bootstrap-theme.little-neko.com/files/shop-home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2015 04:31:46 GMT -->
</html>
