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
	<style>
		.mtstyle{
			margin-top:40px;
		}
	</style>
</head>
	
<body>
<!-- header -->
	@include("site_inc/header")
<!-- //navigation -->
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="{{ url('site/images/11.jpg') }}" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Buy Rice Products Are Now On Line With Us</h3>
				</div>
			</li>
			<li>
				<img src="{{ url('site/images/22.jpg') }}" alt="" />
				  <div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
			
			<li>
				<img src="{{ url('site/images/44.jpg') }}" alt="" />
				<div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top selling offers</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Advertised this week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($products as $p)
								<div class="col-md-4 top_brand_left mtstyle">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												@if($p->p_offer_price > 0)
												<img src="{{ url('site/images/offer.png') }}" alt=" " class="img-responsive">
												@endif
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure >
													<div class="snipcart-item block">
														<div class="snipcart-thumb" onclick="modal({{$p->p_id}})">
															<a><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></a>		
															<p>{{$p->p_name}}</p>
															<p style="margin-top:0;">
																@php
																	$ret = $p->p_rating;
																	$nret = 5-$ret;
																@endphp
																@for($i = 1;$i<=$ret;$i++)
																	<i class="fa fa-star blue-star" aria-hidden="true"></i>
																@endfor
																@for($i = 1;$i<=$nret;$i++)
																	<i class="fa fa-star gray-star" aria-hidden="true"></i>
																@endfor
															</p>
															@if($p->p_offer_price > 0)
															<h4>₹{{$p->p_price - $p->p_offer_price}} <span>₹{{$p->p_price}}</span></h4>
															@endif
															@if($p->p_offer_price <= 0)
															<h4>₹{{$p->p_price}} <span></span></h4>
															@endif
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="{{url('/product')}}" method="get">
																<fieldset>
																	<input type="submit" name="submit" value="Add to cart" class="button">
																</fieldset>
															</form>
														</div>
													</div>
												</figure>
                    			                <div class="modal h2" id="myModal{{$p->p_id}}">
                    			                    <div class="modal-dialog">
                    			                        <div class="modal-content">
                    			                            <!-- Modal Header -->
                    			                            <div class="modal-header">
                    			                                <h4 class="modal-title"><strong style="font-size: 30px;">{{$p->p_name}}</strong></h4>
                    			                                <!-- <button type="button" style="font-size: 44px;" class="close" data-dismiss="modal">&times;</button> -->
                    			                            </div>
                    			                            <!-- Modal body -->
                    			                            <div class="modal-body" style="display:flex;">
																<div class="image" style="display:flex;"><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></div>
																<div class="des">
																	{!! $p->p_deacription !!}
																	<div class="stars">
																	@php
																		$ret = $p->p_rating;
																		$nret = 5-$ret;
																	@endphp
																	@for($i = 1;$i<=$ret;$i++)
																		<i class="fa fa-star blue-star" aria-hidden="true"></i>
																	@endfor
																	@for($i = 1;$i<=$nret;$i++)
																		<i class="fa fa-star gray-star" aria-hidden="true"></i>
																	@endfor
																	</div>
																</div>
                    			                            </div>
                    			                            <!-- Modal footer -->
                    			                            <div class="modal-footer">
                    			                                <button type="button" style="font-size: 20px;" class="btn btn-danger" data-dismiss="modal">Close</button>
                    			                            </div>
                    			                        </div>
                    			                    </div>
                    			                </div>
											</div>
										</div>
									</div>
								</div>
                    			@endforeach
								<div class="clearfix"> </div>
							</div>
							<!-- <div class="agile_top_brands_grids"> -->
								
								
							<!-- </div> -->
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>This week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($products as $p)
								<div class="col-md-4 top_brand_left mtstyle">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												@if($p->p_offer_price > 0)
												<img src="{{ url('site/images/offer.png') }}" alt=" " class="img-responsive">
												@endif
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure >
													<div class="snipcart-item block">
														<div class="snipcart-thumb" onclick="modal({{$p->p_id}})">
															<a><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></a>		
															<p>{{$p->p_name}}</p>
															<p style="margin-top:0;">
																@php
																	$ret = $p->p_rating;
																	$nret = 5-$ret;
																@endphp
																@for($i = 1;$i<=$ret;$i++)
																	<i class="fa fa-star blue-star" aria-hidden="true"></i>
																@endfor
																@for($i = 1;$i<=$nret;$i++)
																	<i class="fa fa-star gray-star" aria-hidden="true"></i>
																@endfor
															</p>
															@if($p->p_offer_price > 0)
															<h4>₹{{$p->p_price - $p->p_offer_price}} <span>₹{{$p->p_price}}</span></h4>
															@endif
															@if($p->p_offer_price <= 0)
															<h4>₹{{$p->p_price}} <span></span></h4>
															@endif
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="{{url('/product')}}" method="get">
																<fieldset>
																	<input type="submit" name="submit" value="Add to cart" class="button">
																</fieldset>
															</form>
														</div>
													</div>
												</figure>
                    			                <div class="modal h2" id="myModal{{$p->p_id}}">
                    			                    <div class="modal-dialog">
                    			                        <div class="modal-content">
                    			                            <!-- Modal Header -->
                    			                            <div class="modal-header">
                    			                                <h4 class="modal-title"><strong style="font-size: 30px;">{{$p->p_name}}</strong></h4>
                    			                                <!-- <button type="button" style="font-size: 44px;" class="close" data-dismiss="modal">&times;</button> -->
                    			                            </div>
                    			                            <!-- Modal body -->
                    			                            <div class="modal-body" style="display:flex;">
																<div class="image" style="display:flex;"><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></div>
																<div class="des">
																	{!! $p->p_deacription !!}
																	<div class="stars">
																	@php
																		$ret = $p->p_rating;
																		$nret = 5-$ret;
																	@endphp
																	@for($i = 1;$i<=$ret;$i++)
																		<i class="fa fa-star blue-star" aria-hidden="true"></i>
																	@endfor
																	@for($i = 1;$i<=$nret;$i++)
																		<i class="fa fa-star gray-star" aria-hidden="true"></i>
																	@endfor
																	</div>
																</div>
                    			                            </div>
                    			                            <!-- Modal footer -->
                    			                            <div class="modal-footer">
                    			                                <button type="button" style="font-size: 20px;" class="btn btn-danger" data-dismiss="modal">Close</button>
                    			                            </div>
                    			                        </div>
                    			                    </div>
                    			                </div>
											</div>
										</div>
									</div>
								</div>
                    			@endforeach
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.html"> <img class="first-slide" src="{{ url('site/images/b1.jpg') }}" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="personalcare.html"> <img class="second-slide " src="{{ url('site/images/b3.jpg') }}" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="household.html"><img class="third-slide " src="{{ url('site/images/b1.jpg') }}" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="{{ url('site/images/p2.jpg') }}" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="{{ url('site/images/p3.jpg') }}" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="{{ url('site/images/p4.jpg') }}" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="{{ url('site/images/111.jpg') }}" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
<!--banner-bottom-->

<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>New offers</h3>
				<div class="agile_top_brands_grids">
					@foreach($product as $p)
					<div class="col-md-3 top_brand_left mtstyle">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									@if($p->p_offer_price > 0)
									<img src="{{ url('site/images/offer.png') }}" alt=" " class="img-responsive">
									@endif
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure >
										<div class="snipcart-item block">
											<div class="snipcart-thumb" onclick="modal({{$p->p_id}})">
												<a><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></a>		
												<p>{{$p->p_name}}</p>
												<p style="margin-top:0;">
													@php
														$ret = $p->p_rating;
														$nret = 5-$ret;
													@endphp
													@for($i = 1;$i<=$ret;$i++)
														<i class="fa fa-star blue-star" aria-hidden="true"></i>
													@endfor
													@for($i = 1;$i<=$nret;$i++)
														<i class="fa fa-star gray-star" aria-hidden="true"></i>
													@endfor
												</p>
												@if($p->p_offer_price > 0)
												<h4>₹{{$p->p_price - $p->p_offer_price}} <span>₹{{$p->p_price}}</span></h4>
												@endif
												@if($p->p_offer_price <= 0)
												<h4>₹{{$p->p_price}} <span></span></h4>
												@endif
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="{{url('/product')}}" method="get">
													<fieldset>
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
											</div>
										</div>
									</figure>
                                    <div class="modal h2" id="myModal{{$p->p_id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><strong style="font-size: 30px;">{{$p->p_name}}</strong></h4>
                                                    <!-- <button type="button" style="font-size: 44px;" class="close" data-dismiss="modal">&times;</button> -->
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body" style="display:flex;">
													<div class="image" style="display:flex;"><img title=" " alt=" " src="{{url('product_images')}}/{{$p->p_image}}"></div>
													<div class="des">
														{!! $p->p_deacription !!}
														<div class="stars">
														@php
															$ret = $p->p_rating;
															$nret = 5-$ret;
														@endphp
														@for($i = 1;$i<=$ret;$i++)
															<i class="fa fa-star blue-star" aria-hidden="true"></i>
														@endfor
														@for($i = 1;$i<=$nret;$i++)
															<i class="fa fa-star gray-star" aria-hidden="true"></i>
														@endfor
														</div>
													</div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" style="font-size: 20px;" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->
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

		function modal(id){
			$('#myModal'+id).modal('show');
			// alert('clicked')
		}
</script>	
<!-- //main slider-banner --> 
</body>
</html>