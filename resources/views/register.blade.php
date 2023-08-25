<!DOCTYPE html>
<html>
<head>
    <title>Super Market | Registered</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{ url('site/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ url('site/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="{{ url('site/css/font-awesome.css') }}" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{{ url('site/js/jquery-1.11.1.min.js') }}"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ url('site/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ url('site/js/easing.js') }}"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
    		$(".scroll").click(function(event){		
    			event.preventDefault();
    			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    		});
    	});
    </script>
    <!-- start-smoth-scrolling -->
	<style>
		.validation{
			display: none;
			background: #3399cc;
			padding: 10px;
			margin-top: 10px;
			border: 1px solid #DBDBDB;
			transition: 0.5s;
		}
		.validation ul{
			position: relative;
			display: flex;
			flex-direction: column;
			gap: 8px
		}
		.validation ul li{
			position: relative;
			list-style: none;
			color: red;
			font-size: 0.85em;
			transition: 0.5s;
		}
		.validation ul li.valid{
			color: rgba(255, 255, 255, 0.5);
		}
		.validation ul li::before{
			content: '\f192';
			width: 20px;
			height: 10px;
			font-family: fontAwesome;
			display: inline-flex;
		}
		.validation ul li.valid::before{
			content: '\f00c';
			color: #0f0;
		}
	</style>
</head>
	
<body>
<!-- header -->
@include("site_inc/header")
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="{{url('/getregister')}}" method="post">
					@csrf
					<input type="text" placeholder="Name..." name="name" required>
					<input type="number" placeholder="Phone Number..." name="pnum" required>
				
					<h6>Login information</h6>
					<input type="email" placeholder="Email Address" name="email" required>
					<input type="password" onkeyup="checkPass(this.value)" id="pass" placeholder="Password" name="pass" required>
					<div class="validation" id="val">
						<ul>
							<li id="lower">At least one lowercase character</li>
							<li id="upper">At least one uppercase character</li>
							<li id="number">At least one number</li>
							<li id="special">At least one special character</li>
							<li id="length">At least 8 character</li>
						</ul>
					</div>
					<input type="password" placeholder="Password Confirmation" onkeyup="confirmPass(this.value)" name="cpass" id="cpass" required>
					<span id="massage" style="color:red;"></span>
					<span id="massage2" style="color:green;"></span>
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" id="submit" value="Register" disabled>
				</form>
			</div>
			<div class="register-home">
				<a href="/">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<!-- //footer -->
@include("site_inc/footer")
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="{{ url('site/js/bootstrap.min.js') }}"></script>
<!-- top-header and slider -->

<!-- validation -->
<script>
	$('#pass').click(function(){
		$('#val').css({
			'display':'block'
		});
	});
	$('#cpass').click(function(){
		$('#val').css({
			'display':'none'
		});
	});

	let lowerCase = document.getElementById('lower');
	let upperCase = document.getElementById('upper');
	let digit = document.getElementById('number');
	let spacialChar = document.getElementById('special');
	let minLength = document.getElementById('length');

	function checkPass(data){
		const lower = new RegExp('(?=.*[a-z])');
		const upper = new RegExp('(?=.*[A-Z])');
		const number = new RegExp('(?=.*[0-9])');
		const special = new RegExp('(?=.*[!@#\$%\^&\*])');
		const length = new RegExp('(?=.{8,})');

		if(lower.test(data)){
			document.getElementById('submit').disabled = false;
			lowerCase.classList.add('valid');
		}else{
			document.getElementById('submit').disabled = true;
			lowerCase.classList.remove('valid');
		}

		if(upper.test(data)){
			document.getElementById('submit').disabled = false;
			upperCase.classList.add('valid');
		}else{
			document.getElementById('submit').disabled = true;
			upperCase.classList.remove('valid');
		}

		if(number.test(data)){
			document.getElementById('submit').disabled = false;
			digit.classList.add('valid');
		}else{
			document.getElementById('submit').disabled = true;
			digit.classList.remove('valid');
		}

		if(special.test(data)){
			document.getElementById('submit').disabled = false;
			spacialChar.classList.add('valid');
		}else{
			document.getElementById('submit').disabled = true;
			spacialChar.classList.remove('valid');
		}

		if(length.test(data)){
			document.getElementById('submit').disabled = false;
			minLength.classList.add('valid');
		}else{
			document.getElementById('submit').disabled = true;
			minLength.classList.remove('valid');
		}
	}

	function confirmPass(data){
		var pw1 = document.getElementById('pass').value;
		if(pw1 != "" && pw1 == data){
			$('#massage').css({
				'color':'green'
			});
			document.getElementById('submit').disabled = false;
			document.getElementById('massage').innerHTML = "Password Matched";
		}else{
			$('#massage').css({'color':'red'});
			document.getElementById('submit').disabled = true;
			document.getElementById('massage').innerHTML = "**Password not Matched";
		}
	}
</script>

<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{ url('site/js/minicart.min.js') }}"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="{{ url('site/js/skdslider.min.js') }}"></script>
<link href="{{ url('site/css/skdslider.css') }}" rel="stylesheet">
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
					
		jQuery('#responsive').change(function(){
		  $('#responsive_wrapper').width(jQuery(this).val());
		});
	});
	
</script>	
<!-- //main slider-banner --> 



</body>
</html>