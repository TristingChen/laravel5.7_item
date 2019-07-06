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
								<li><a href="#">Home</a></li>
								<li class="active">Register</li>
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
							<h4>Register:</h4>

							@if(count($errors)>0)
            <div style="margin-bottom:20px;margin-top:30px;color: red;text-align: center">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
		        @endif
		            @if(session('ms'))
		                <p style="color:red ;text-align: center">{{session('ms')}}</p>
		            @endif
						</div>
						<form action="{{url('home/register/store')}}" method="post" id="contactfrm" role="form" class="form-minimal">
							@csrf
							<div class="col-sm-4"> 
								<div class="form-group">
									<label for="username">Name</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Enter username"  title="Please enter your name (at least 2 characters)"/>
									<div class="form-line"></div>
								</div>

								<div class="form-group">
									<label for="nickname">Nickname</label>
									<input type="test" class="form-control" name="nickname" id="nickname" placeholder="Enter nickname" title="Please enter nickname"/>
									<div class="form-line"></div>
								</div>

								<div class="form-group">
									<label for="mobile">Mobile</label>
									<input name="mobile" class="form-control required digits" type="tel" id="mobile" size="30" value="" placeholder="Enter email mobile" title="Please enter a valid mobile number (at least 10 characters)">
									<div class="form-line"></div>
								</div>

							</div>
							<div class="col-sm-4 form-group">
								<label for="password">Password</label>
									<input name="password" class="form-control required " type="password" id="password" size="30" value="" placeholder="Enter password" title="Please enter your password(at least 5 characters)">
									<div class="form-line"></div>
							</div>                        
							<div class="col-sm-4 form-group">
								<label for="password1">RePassword</label>
									<input name="password1" class="form-control required " type="password" id="password1" size="30" value="" placeholder="Enter password again" title="Please enter your password (at least 5 characters)">
									<div class="form-line"></div>
							</div>                        
							<div class="col-md-8 col-md-offset-4">
								<button name="submit" type="submit" class="btn large primary" style="background-color: #ccc;" id="submit"> Submit</button>
								<input type="hidden" name="status" value="1">
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