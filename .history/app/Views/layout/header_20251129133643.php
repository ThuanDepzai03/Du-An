<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Electro - HTML Ecommerce Template</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="../Public/css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="../Public/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="../Public/css/slick-theme.css" />

	<link type="text/css" rel="stylesheet" href="../Public/css/nouislider.min.css" />

	<link rel="stylesheet" href="../Public/css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="../Public/css/style.css" />

</head>

<body>
	<header>
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> 0817963936</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> thuanngu@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> Hải Phòng</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
					<li><a href="#"><i class="fa fa-user-o"></i> Tài Khoản</a></li>
				</ul>
			</div>
		</div>
		<div id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php?action=home" class="logo">
								<img src="../Public/img/logo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Category 01</option>
									<option value="1">Category 02</option>
								</select>
								<input class="input" placeholder="Tìm+76y Kiếm Sản Phẩm">
								<button class="search-btn">Tìm Kiếm</button>
							</form>
						</div>
					</div>
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="index.php?action=cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ Hàng</span>
									<div class="qty">3</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<div class="product-widget">
											<div class="product-img">
												<img src="../Public/img/product01.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>

										<div class="product-widget">
											<div class="product-img">
												<img src="../Public/img/product02.png" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
											</div>
											<button class="delete"><i class="fa fa-close"></i></button>
										</div>
									</div>
									<div class="cart-summary">
										<small>3 Item(s) selected</small>
										<h5>SUBTOTAL: $2940.00</h5>
									</div>
									<div class="cart-btns">
										<a href="index.php?action=cart">View Cart</a>
										<a href="index.php?action=checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<nav id="navigation">
		<div class="container">
			<div id="responsive-nav">
				<ul class="main-nav nav navbar-nav">
					<li><a href="index.php?action=home">Trang Chủ</a></li>
					<li><a href="index.php?action=shop">Cửa Hàng</a></li>
					<li><a href="#">Liên Hệ</a></li>
					<li><a href="#">Giới Thiệu</a></li>
				</ul>
			</div>
		</div>
	</nav>