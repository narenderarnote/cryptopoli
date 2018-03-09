@extends('layouts.app')
@section('content')

	<!-- Breadcumb area-->
	<div class="breadcumb_area">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="bc_inner">
	                    <!-- <p><span>Login</span> for Educators</p> -->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- Login area-->
	<main class="educator-thankyoupage text-center">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
			        <div class="thankyou-images"> <img src="images/logo.png"></div>
			        <div class="thankyou-content text-left">
			         	<p>Welcome to cryptopoli! Thanks so much for joining us.
		                <br>
		                You will be redirected to dashboard page in 5 sec.</p>
			        </div>
	               <br><br><br>
					<script type="text/javascript">
						var redirected = "{{ url('/') }}";
						@if(Session::has('redirected'))
						redirected = "{{ Session::get('redirected') }}";
						@endif

						function Redirect() {
							window.location= redirected;
						}
						setTimeout('Redirect()', 5000);
				    </script>
	            </div>
	        </div>
	    </div>
	</main>

	<!-- Footer area -->

@endsection