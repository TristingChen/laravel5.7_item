@extends('front.include.basic')

@section('content')

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
												style="z-index: 6"><a href="{{ route('shop-products') }}" class="btn default">See collections</a>
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
												style="z-index: 6"><a href="{{ route('shop-products') }}" class="btn default">Shop now</a>
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
												style="z-index: 6"><a href="{{ route('shop-products') }}" class="btn default">Collections</a>
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
						<a href="{{ route('shop-products') }}" class="btn default">Shop now</a>
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
								<a href="{{ route('shop-products') }}" class="btn default">Shop now</a>
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

									<a href="{{route('shop-item')}}" title="product">
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

									<a href="{{route('shop-item')}}" title="product">
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

									<a href="{{route('shop-item')}}" title="product">
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

									<a href="{{route('shop-item')}}" title="product">
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
@endsection
<!-- / content -->
@section('javascript')
<script type="text/javascript">
console.log('11');
</script>
@endsection
