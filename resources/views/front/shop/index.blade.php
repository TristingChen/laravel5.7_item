@extends('front.include.basic')
@section('content')
		<!-- content -->
		<main id="content">
			<header class="page-header image-background image-16 no-padding">
				<div class="mask opacity-2">
					<div class="container v-align-center">
						<div class="row">
							<div class="col-md-12 text-light pt pb">
								<h1 class="large block">Browse our products</h1>
								<p class="lead block">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.
								</p>
							</div>
						</div>
					</div>
				</div>
			</header>
			<section class="pt light-color">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<form class="form-inline mb-sm" role="form">
								<label>Filter&nbsp;</label>
								<select class="form-control small">
									<option value="1">Best Sellers</option>
									<option value="2">Price - Low to High</option>
									<option value="3">Price - High to Low</option>
									<option value="4">Ratings - High to Low</option>
								</select>
								<label>&nbsp;Items Per Page&nbsp;</label>
								<select class="form-control small">
									<option value="1">10</option>
									<option value="2">20</option>
									<option value="3">50</option>
									<option value="4">100</option>
								</select>
							</form>
						</div>
						<div class="col-md-6">
							<ul class="pagination no-margin pull-right-md">
								<li><a href="#">芦</a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">禄</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
			</section>
			<!-- portfolio -->
			<section class="pt pb-medium rollover effect-zoe">
				<div class="container">
					<div class="row">
						<!-- sidebar -->
						<aside class="col-md-3 mb-sm">
							<section class="widget">
								<h3>Price</h3>
								<nav class="sidebar-menu">
									<ul>
										<li><a href="#">$50 > $100</a></li>
										<li><a href="#">$101 > $150</a></li>
										<li><a href="#">$151 > $200</a></li>
										<li><a href="#">$201 > $300</a></li>
										<li><a href="#">$301 > $400</a></li>
									</ul>
								</nav>
							</section>
							<section class="widget">
								<h3>Type</h3>
								<nav class="sidebar-menu">
									<ul>
										<li><a href="#">Coats and jackets</a></li>
										<li><a href="#">Dresses</a></li>
										<li><a href="#">Skirts</a></li>
										<li><a href="#">Tops</a></li>
									</ul>
								</nav>
							</section>
							<section class="widget">
								<h3>Size</h3>
								<nav class="sidebar-menu">
									<ul>
										<li><a href="#">XL</a></li>
										<li><a href="#">L</a></li>
										<li><a href="#">M</a></li>
										<li><a href="#">S</a></li>
									</ul>
								</nav>
							</section>
						</aside>
						<!-- / sidebar -->
						<div class="col-md-9">
							<div class="row">
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-5.jpg') }}" alt="EDENA premium website template" class="responsive">
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
											<h2><span>Dress in Grey</span>
												<span class="text-main-color large">$289</span>
											</h2>
										</div>
									</article>
								</div>
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-6.jpg') }}" alt="EDENA premium website template" class="responsive">
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
											<h2><span>Winter sweatshirt </span>
												<span class="text-main-color large">$180</span>
											</h2>
										</div>
									</article>
								</div>
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-7.jpg') }}" alt="EDENA premium website template" class="responsive">
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
											<h2><span>Little black Dress</span>
												<span class="text-main-color large">$375</span>
											</h2>
										</div>
									</article>
								</div>
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
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
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-8.jpg') }}" alt="EDENA premium website template" class="responsive">
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
											<h2><span>Chess skirt</span>
												<span class="text-main-color large">$220</span>
											</h2>
										</div>
									</article>
								</div>
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-9.jpg') }}" alt="EDENA premium website template" class="responsive">
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
											<h2><span>Angel dust Dress</span>
												<span class="text-main-color large">$599</span>
											</h2>
										</div>
									</article>
								</div>
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
									<article class="mb shop-product">
										<figure>
											<img src="{{ asset('/front/images/shop/product-3.jpg') }}" alt="EDENA premium website template" class="responsive">
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
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
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
								<!-- / item -->
								<!-- item -->
								<div class="col-sm-6 col-md-4">
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
								<!-- / item -->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- portfolio -->
		</main>
@endsection
<!-- / content -->
@section('javascript')
<script type="text/javascript">
</script>
@endsection
