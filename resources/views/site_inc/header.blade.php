<div class="agileits_header">
	<div class="container">
		<div class="w3l_offers">
			<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="/product">SHOP NOW</a></p>
		</div>
		<div class="agile-login">
			<ul>
				@if(!Auth::check())
				<li><a href="/register"> Create Account </a></li>
				<li><a href="/login">Login</a></li>
				<li><a href="/contact">Help</a></li>
				@endif
				@if(Auth::check())
				<li><a href="/logout">Logout</a></li>
				<li><a href="/contact">Help</a></li>
				@endif
				
			</ul>
		</div>
		<div class="product_list_header">  
			<!-- <form action="#" method="post" class="last">  -->
				<button class="w3view-cart"><a href="/cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></button>
			<!-- </form>   -->
		</div>
		<div class="product_list_header">  
			@if(Auth::check())
			<a href="/profile"><img src="{{url('site/images/man-user-profile-fotor-2023082493715.png')}}" style="width:40px;"></a>
			@endif
			
			
		</div>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="logo_products">
	<div class="container">
		<div class="w3ls_logo_products_left1">
			<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
			</ul>
		</div>
		<div class="w3ls_logo_products_left">
			<h1><a href="/">super Market</a></h1>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
	<div class="container">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header nav_2">
				<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/" class="act">Home</a></li>	
					<!-- Mega Menu -->
					@foreach($catagory as $c)
					<li class="dropdown">
						<a href="#" onclick="req({{$c->cat_id}});" class="dropdown-toggle" data-toggle="dropdown">{{$c->cname}}<b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="row">
								<div class="multi-gd-img">
									<ul class="multi-column-dropdown" id="dropdown{{$c->cat_id}}"></ul>
								</div>	
							</div>
						</ul>
					</li>
					@endforeach
					<li><a href="gourmet.html">Gourmet</a></li>
					<li><a href="/offer">Offers</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<script>
	function req(id){
		// alert(id)
		$('#dropdown'+id).html('');
		$.ajax({
			url:'/getid/'+id,
			type:'GET',
			data: {},
			success:function(resp){
				// alert(JSON.stringify(resp))
                $.each(resp.obj, function (i) {
					// alert(resp.obj[i])
					$.each(resp.obj[i], function (j,k) {
                    	$('#dropdown'+id).append('<li><a href="/products/'+k+'">'+k+'</a></li>');
						// alert(k);
                	});
				});
			}
		})
	}
</script>