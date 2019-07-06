@extends('front.include.basic')
@section('content')
		<!-- content -->
			<main id="content" class="light-color">

		<header class="page-header">


			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<ol class="breadcrumb text-left">
							<li><a href="#">Home</a></li>
							<li><a href="#">Clothing</a></li>
							<li><a href="#">Jackets</a></li>
							<li class="active">Edena Leather Biker Jacket</li>
						</ol>

					</div>
				</div>
			</div>

		</header>
		<section class="pt pb-medium">
			<div class="container">
				<div class="row">

					<div class="col-md-2 col-sm-4">

						<div class="row  product-gallery">

							
							<div class="col-sm-12 col-xs-3">
								<img src="{{ asset('/front/images/shop/product-single-3.jpg') }}"class="responsive mb-small product-item product-active" alt="Edena product"/>
							</div>

							<div class="col-sm-12 col-xs-3">
								<img src="{{ asset('/front/images/shop/product-single-2.jpg') }}"class="responsive mb-small product-item" alt="Edena product"/>
							</div>

							<div class="col-sm-12 col-xs-3">
								<img src="{{ asset('/front/images/shop/product-single-1.jpg') }}"class="responsive mb-small product-item" alt="Edena product"/>
							</div>

						</div>
					</div>

					<div class="col-md-6 col-sm-8 mb-xs">
						<img src="{{ asset('/front/images/shop/product-single-3.jpg') }}" class="responsive product-item-large" alt="Edena product"/>
					</div>

					<div class="col-md-4">
						<h1><span>Product code: AZDD5f6</span>Edena Leather Biker Jacket</h1>
						<h2 class="h1 large no-shadow text-main-color">$55</h2>
						<ul class="list-unstyled border">
							<li><strong>Brand:</strong> Edena Urban Fashion</li>
							<li><strong>Availability:</strong> in stock</li>
						</ul>
						<form>
							<label>Size</label>
							<select class="form-control">
								<option value="36">36</option>
								<option value="38">38</option>
								<option value="40">40</option>
								<option value="42">42</option>
								<option value="44">44</option>
							</select>
						</form>
						<a href="#" class="btn large default mt-small">Add to cart</a>
						<a href="#" class="btn primary small mt-small"><i class="icon-glyph-52"></i>Add to wishlist</a>
						<h2 class="h3">Product infos</h2>
						<p class="small">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						<p>
							<h3>Duis aute irure dolor in reprehenderit</h3>
						<p class="small">
							In voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>

		</section>



	</main>
@endsection
<!-- / content -->
@section('javascript')
<script type="text/javascript">
</script>
@endsection