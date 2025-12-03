<div class="container">
    <div class="row">

        <!-- Product Images -->
        <div class="col-md-5">
            <div class="product-img">
                <img src="../admin/<?= htmlspecialchars($product['img'] ?? 'default.png') ?>" 
                     alt="<?= htmlspecialchars($product['name']) ?>" 
                     class="img-fluid">
            </div>
        </div>
        <!-- /Product Images -->

        <!-- Product details -->
        <div class="col-md-7">
            <div class="product-details">
                <h2 class="product-name"><?= htmlspecialchars($product['name']) ?></h2>

                <!-- Rating -->
                <div>
                    <div class="product-rating">
                        <?php 
                        $rating = $product['rating'] ?? 5;
                        for ($i=1; $i<=5; $i++):
                            if ($i <= $rating) echo '<i class="fa fa-star"></i>';
                            else echo '<i class="fa fa-star-o"></i>';
                        endfor;
                        ?>
                    </div>
                    <a class="review-link" href="#tab3">10 Review(s) | Add your review</a>
                </div>

                <!-- Price -->
                <div>
                    <h3 class="product-price">
                        <?= number_format($product['price']) ?> ₫
                        <?php if (!empty($product['old_price'])): ?>
                            <del class="product-old-price"><?= number_format($product['old_price']) ?> ₫</del>
                        <?php endif; ?>
                    </h3>
                    <span class="product-available">In Stock</span>
                </div>

                <!-- Description -->
                <p><?= htmlspecialchars($product['mota'] ?? 'Chưa có mô tả') ?></p>

                <!-- Options -->
              
                <!-- Add to cart -->
                <div class="add-to-cart">
                    <div class="qty-label">
                        Qty
                        <div class="input-number">
                            <input type="number" value="1">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                        <button class="add-to-cart-btn" onclick="location.href='index.php?action=addcart&idsp=<?= $product['id'] ?>'">
								<i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>

                <!-- Wishlist & Compare -->

                <!-- Category -->
                <ul class="product-links">
                    <li>Category:</li>
                    <li>
                        <a href="index.php?action=shop&iddm=">
                            <?= htmlspecialchars($product['category_name']) ?>
                        </a>
                    </li>
                </ul>

                <!-- Share -->
                <ul class="product-links">
                    <li>Share:</li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- /Product details -->

        <!-- Tabs: Description, Details, Reviews -->
        <div class="col-md-12">
            <div id="product-tab">
                <ul class="tab-nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                    <li><a data-toggle="tab" href="#tab2">Details</a></li>
                    <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                </ul>

                <div class="tab-content">
                    <!-- Description -->
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <p><?= htmlspecialchars($product['mota'] ?? 'Chưa có mô tả') ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div id="tab2" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Thông tin chi tiết sản phẩm sẽ hiển thị ở đây (tùy chỉnh theo database)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div id="tab3" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-3">
                                <div id="rating">
                                    <div class="rating-avg">
                                        <span><?= $product['rating'] ?? '0' ?></span>
                                        <div class="rating-stars">
                                            <?php 
                                            $rating = $product['rating'] ?? 0;
                                            for ($i=1; $i<=5; $i++):
                                                if ($i <= $rating) echo '<i class="fa fa-star"></i>';
                                                else echo '<i class="fa fa-star-o"></i>';
                                            endfor;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="reviews">
                                    <ul class="reviews">
                                        <li>
                                            <div class="review-heading">
                                                <h5 class="name">John</h5>
                                                <p class="date">27 DEC 2018, 8:0 PM</p>
                                                <div class="review-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div id="review-form">
                                    <form class="review-form">
                                        <input class="input" type="text" placeholder="Your Name">
                                        <input class="input" type="email" placeholder="Your Email">
                                        <textarea class="input" placeholder="Your Review"></textarea>
                                        <div class="input-rating">
                                            <span>Your Rating: </span>
                                            <div class="stars">
                                                <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                            </div>
                                        </div>
                                        <button class="primary-btn">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Reviews -->
                </div>
            </div>
        </div>
        <!-- /Tabs -->

    </div>
</div>
