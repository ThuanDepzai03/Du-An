<?php
// KHỞI TẠO SESSION AN TOÀN
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Đảm bảo giỏ hàng tồn tại
$cart = $_SESSION['cart'] ?? [];
$cartQty = array_sum(array_column($cart, 'soLuong'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Electro Store</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="../Public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../Public/css/slick.css" />
	<link rel="stylesheet" href="../Public/css/slick-theme.css" />
	<link rel="stylesheet" href="../Public/css/nouislider.min.css" />
	<link rel="stylesheet" href="../Public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Public/css/style.css" />

</head>

<body>
	<header>
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a><i class="fa fa-phone"></i> 0817963936</a></li>
					<li><a><i class="fa fa-envelope-o"></i> thuanngu@email.com</a></li>
					<li><a><i class="fa fa-map-marker"></i> Hải Phòng</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a><i class="fa fa-dollar"></i> VND</a></li>
					<li><a><i class="fa fa-user-o"></i> Tài Khoản</a></li>
				</ul>
			</div>
		</div>

		<div id="header">
			<div class="container">
				<div class="row">

					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php?action=home" class="logo">
								<img src="../Public/img/logo.png">
							</a>
						</div>
					</div>

					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
								</select>
								<input class="input" placeholder="Tìm kiếm sản phẩm">
								<button class="search-btn">Tìm Kiếm</button>
							</form>
						</div>
					</div>

					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							
							<!-- GIỎ HÀNG -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="index.php?action=showcart">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ Hàng</span>
									<div class="qty"><?= $cartQty ?></div>
								</a>

								<div class="cart-dropdown">
									<div class="cart-list">

										<?php if (empty($cart)): ?>
											<p class="text-center p-3">Giỏ hàng trống</p>
										<?php else: ?>

											<?php foreach ($cart as $item): ?>
												<div class="product-widget">
													<div class="product-img">
														<img src="/admin/<?= $item['img'] ?>">
													</div>
													<div class="product-body">
														<h3 class="product-name">
															<a href="#"><?= $item['name'] ?></a>
														</h3>
														<h4 class="product-price">
															<span class="qty"><?= $item['soLuong'] ?>x</span>
															<?= number_format($item['price']) ?>₫
														</h4>
													</div>
													<a href="index.php?action=removecart&id=<?= $item['id'] ?>" class="delete">
														<i class="fa fa-close"></i>
													</a>
												</div>
											<?php endforeach; ?>

										<?php endif; ?>

									</div>

									<div class="cart-summary">
										<h5>
											Tổng tiền: 
											<strong class="text-danger">
												<?= number_format(array_sum(array_map(
													fn($i)=>$i['soLuong'] * $i['price'], 
													$cart
												))) ?>₫
											</strong>
										</h5>
									</div>

									<div class="cart-btns">
										<a href="index.php?action=showcart">Xem Giỏ Hàng</a>
										<a href="index.php?action=showcheckout">Thanh Toán <i class="fa fa-arrow-circle-right"></i></a>
									</div>

								</div>
							</div>

							<!-- MENU -->
							<div class="menu-toggle">
								<a href="#"><i class="fa fa-bars"></i><span>Menu</span></a>
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
					<li><a href="http://localhost:3000/app/index.php?action=contact">Liên Hệ</a></li>
					<li><a href="http://localhost:3000/app/index.php?action=about">Giới Thiệu</a></li>
				</ul>
			</div>
		</div>
	</nav>
