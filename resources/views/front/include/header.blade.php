		<header class="menu-header navbar-fixed-top" role="banner">
			<section id="pre-header" class="dark-main-color shop-pre-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-8">
							<ul class="quick-menu">
								@if(Session::get('user.username'))
								<li><a href="#" class="linkLeft">欢迎你 -- <a style="font-weight: bolder" >{{Session::get('user.username')}}</a></a></li>
								<li><a href="{{url('/home/user')}}" class="linkLeft">My account</a></li>
								<li><a href="{{url('loginout')}}">login out</a></li>
								@else
								<li><a href="{{url('home/login')}}">Sign in</a></li>
								<li><a href="{{url('home/register')}}">Sign up</a></li>
								@endif
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
								<a href="{{ route('home') }}" class="has-sub-menu">Home</a>
							</li>
							@if(Session::get('user.username'))
							<li><a href="#">Download</a></li>
							@endif
							

						</ul>
						<!-- / End main navigation -->
					</div>


				</nav>
			</div>

		</header>
