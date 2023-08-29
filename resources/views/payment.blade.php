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
<head>
<body>
    @include("site_inc/header")
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
    @if(Auth::user()->address != "")

    <div class="login-form-grids">
    @if(Session::has('amount'))
    <form action="{{url('/pay')}}" method="post">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_test_Hkd4fncpEeGIv1"
        data-amount="{{Session::get('amount')}}"
        data-currency="INR"
        data-order_id="{{Session::get('order_id')}}"
        data-buttontext="Pay with Razorpay"
        data-name="Super Market"
        data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
        data-prefill.name="Gaurav Kumar"
        data-prefill.email="gaurav.kumar@example.com"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" custom="Hidden Element" name="hidden"/>
    </form>
    @endif
    </div>
    @endif

    @if(Auth::user()->address == "")
    <div class="login-form-grids">
        <h5>Shipping Address</h5>
        <form action="{{url('/incaddar')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
			<input type="hidden" name="name" value="{{Auth::user()->name}}">
			<input type="hidden" name="pnum" value="{{Auth::user()->phone}}">
			<input type="hidden" name="email" value="{{Auth::user()->email}}">
            <input type="text" name="address" placeholder="Enter Address....." required>
            <input type="submit" id="submit">
        </form>
    </div>
    @endif

    <!-- //footer -->
    @include("site_inc/footer")
    <!-- //footer -->	
</body>
</html>