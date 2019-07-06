@extends('front.include.basic')
@section('content')
		<!-- content -->
		<main id="content" class="light-color">
			<header class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1>Register your account</h1>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li><a href="/">Home</a></li>
								<li class="active">Sign in</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<!-- contact form -->
			<section class="mt-medium">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<h4>Sign in:</h4>

		            @if(session('ms'))
		                <p style="color:red ;text-align: center">{{session('ms')}}</p>
		            @endif
						</div>
						<form action="{{url('home/login')}}" method="post" id="contactfrm" role="form" class="form-minimal">
							@csrf
							<div class="col-sm-4"> 
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Enter username"  title="Please enter your name (at least 2 characters)"/>
									<div class="form-line"></div>
								</div>

								<div class="form-group">
									<label for="password">password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" title="Please your password"/>
									<div class="form-line"></div>
								</div>

							</div>
							<div class="col-md-8 col-md-offset-4">
								<button name="submit" type="submit" class="btn large primary" style="background-color: #ccc;" id="submit"> Submit</button>
								<div class="result"></div>
							</div>
						</form>
					</div>
				</div>
			</section>
			<!-- / contact form -->
		</main>
@endsection
<!-- / content -->
@section('javascript')
<script type="text/javascript">
</script>
@endsection

