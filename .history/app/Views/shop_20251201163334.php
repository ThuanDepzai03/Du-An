<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">All Sản Phẩm</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php foreach ($danhmuc as $index => $dm): ?>
                                <li class="<?= $index === 0 ? 'active' : '' ?>">
                                    <a data-toggle="tab" href="#tab<?= $dm['id'] ?>">
                                        <?= htmlspecialchars($dm['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="row g">
                <?php if (!empty($newProducts)): ?>
                    <?php foreach ($newProducts as $sp): ?>
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="product">
                                <div class="product-img">
                                    <img src="admin/" alt="">
                                    <img src="<?= htmlspecialchars($sp['img'] ?? 'default.png') ?>" alt="<?= htmlspecialchars($sp['name']) ?>" class="img-fluid">
                                    <div class="product-label">
                                        <span class="new">NEW</span>
                                    </div>
                                </div>

                                <div class="product-body">
                                    <p class="product-category"><?= htmlspecialchars($sp['category_name']) ?></p>

                                    <h3 class="product-name">
                                        <a href="#"><?= htmlspecialchars($sp['name']) ?></a>
                                    </h3>
                                    <h4 class="product-price"><?= number_format($sp['price']) ?> ₫</h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i></button>
                                        <button class="quick-view"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>

                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Hiện chưa có sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

---

<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>