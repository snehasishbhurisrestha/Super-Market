<!DOCTYPE html>
<html>
<head>
    <title>Super Market | Checkout</title>
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
</head>
	
<body>
<!-- header -->
@include("site_inc/header")
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span>{{count($cart)}} Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<!-- <th>SL No.</th>	 -->
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>

					@foreach($cart as $c)
					<tr class="rem1">
						<!-- <td class="invert"></td> -->
						<td class="invert-image"><a href="single.html"><img src="{{url('product_images')}}/{{$c->p_image}}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">{{$c->p_name}}</td>
						<td class="invert">{{$c->product_price - $c->p_offer_price}}</td>
						<td class="invert">
							<div class="rem">
								<a href="{{url('/deltocart')}}/{{$c->crt_id}}"><div class="close1"> </div></a>
							</div>
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
						</td>
					</tr>
					@endforeach
					

					<!--quantity-->
						<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
							divUpd.text(newVal);
						});
						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
						});
						</script>
					<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						@foreach($cart as $c)
						<li>{{$c->p_name}} <i>-</i> <span>{{$c->product_price - $c->p_offer_price}} </span></li>
						@endforeach
						<li>Total Service Charges <i>-</i> <span>@php echo 5*count($cart) @endphp</span></li>
						<li>
							Total <i>-</i> 
							<span>
								@php 
									$ans = 0
								@endphp
									@foreach($cart as $cr)
										@php $ans += ($cr->product_price - $cr->p_offer_price) @endphp
									@endforeach
								@php
									echo $ans + (5*count($cart))
								@endphp
							</span>
						</li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<a href="/product"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
<!-- //footer -->
@include("site_inc/footer")
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="{{ url('site/js/bootstrap.min.js') }}"></script>
<!-- top-header and slider -->
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