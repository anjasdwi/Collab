<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Bootstrap 4 CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-top: 14px; padding-bottom: 14px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/ajukan-pesanan">Ajukan Pesanan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/list-pesanan">List Pesanan</a>
					</li>
			    </ul>
		    	<!-- <ul class="navbar-nav ml-auto">
				    <li class="nav-item">
				    	<a class="nav-link" href="https://www.google.com/">
				    		<button
						      	type="button"
						      	class="btn"
						      	style="
						      		border: 1px solid white;
						      		background: transparent;
						      		color: white;"
						    >
						    	Login
						    </button>
				    	</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" href="https://www.google.com/">
				    		<button
						      	type="button"
						      	class="btn"
						      	style="
						      		border: 1px solid white;
						      		background: white;
						      		color: black;"
						    >
						    	Register
						    </button>
				    	</a>
				    </li>
				 </ul> -->
		  </div>
		</nav>
	</header>

	<div style="margin-top: 60px; margin-bottom: 60px; margin-right: 16px; margin-left: 16px;">
		@yield('content')
	</div>


	<!-- <footer>
		<div align="center" style="background: #343a40!important;">
			<p
				style="
					color: white;
					margin: 0;
					padding-top: 4px;
					padding-bottom: 6px;
					font-size: 14px;
				"
			>
				@Copyright 2019
			</p>
		</div>
	</footer> -->

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
