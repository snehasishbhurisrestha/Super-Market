<!DOCTYPE html>
<html>
<head>
    <title>Super Market | Home </title>
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
<br><br>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Hello, {{Auth::user()->name}}</h1></div>
    </div>
    <br><br>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
          
        </div><!--/col-3-->
    	<div class="col-sm-12">
            <ul class="nav nav-tabs">
            </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                    <form class="form" action="{{url('/incprofile')}}" method="post" id="registrationForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="text-center">
                            @if(Auth::user()->image)
                                <img src="{{url('profile_images')}}/{{$user->image}}" style="width:300px;" class="avatar img-circle img-thumbnail" alt="avatar">
                            @endif
                            @if(!Auth::user()->image)
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                            @endif
                            <br><h6>Upload a different photo...</h6><br>
                            <input type="file" name="img" class="text-center center-block file-upload">
                        </div></hr><br>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name"><h4>Name</h4></label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="first_name" placeholder="First Name" title="enter your name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" value="{{$user->phone}}" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6 mb-3">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="location"><h4>Location</h4></label>
                                <input type="text" class="form-control" name="location" value="{{$user->address}}" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                        </div>
              	    </form>
                <hr>
            </div><!--/tab-pane-->
            
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
</div>
<br><br>
<div class="container">
    <h2 style="text-align:center;padding:20px 0;">Orders</h2>           
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Payment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $o)
            <tr>
                <td><img src="{{url('product_images')}}/{{$o->p_image}}" style="width:100px">{{$o->p_name}}</td>
                <td>{{$o->product_price}}</td>
                <td>{{$o->product_quantity}}</td>
                <td style="color:green;font-weight: bold;">Successful</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br>
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
<!-- <script src="{{ url('site/js/minicart.min.js') }}"></script> -->
<!-- <script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script> -->
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