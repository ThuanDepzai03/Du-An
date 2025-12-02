<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">

                <div class="aside-widget">
                    <h3 class="aside-title">Lọc theo giá</h3>
                    <form action="" method="GET">
                        <div class="price-filter">
                            <div class="input-group">
                                <span class="input-group-addon">Từ:</span>
                                <input type="number" name="min_price" class="form-control" placeholder="0" value="<?= $_GET['min_price'] ?? '' ?>">
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group-addon">Đến:</span>
                                <input type="number" name="max_price" class="form-control" placeholder="Max" value="<?= $_GET['max_price'] ?? '' ?>">
                            </div>
                            <input type="hidden" name="action" value="shop">
                            <button type="submit" class="primary-btn btn-sm mt-15 w-100">Áp dụng</button>
                        </div>
                    </form>
                </div>
                <div class="aside-widget">
                    <h3 class="aside-title">Danh mục</h3>
                    <div class="checkbox-filter">
                        <?php foreach ($danhmuc as $dm): ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-<?= $dm['id'] ?>">
                                <label for="category-<?= $dm['id'] ?>">
                                    <span></span>
                                    <?= htmlspecialchars($dm['name']) ?>
                                    <small>(120)</small> </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div id="store" class="col-md-9">
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sắp xếp:
                            <select class="input-select">
                                <option value="0">Phổ biến</option>
                                <option value="1">Giá tăng dần</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <?php if (!empty($newProducts)): ?>
                        <?php foreach ($newProducts as $sp): ?>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="../admin/<?= htmlspecialchars($sp['img'] ?? 'default.png') ?>" alt="<?= htmlspecialchars($sp['name']) ?>">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                            <?php if ($sp['price'] > 15000000): ?>
                                                <span class="sale">-30%</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= htmlspecialchars($sp['category_name']) ?></p>
                                        <h3 class="product-name"><a href="#"><?= htmlspecialchars($sp['name']) ?></a></h3>
                                        <h4 class="product-price"><?= number_format($sp['price']) ?> ₫
                                            <del class="product-old-price"><?= number_format($sp['price'] * 1.2) ?> ₫</del>
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu thích</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem nhanh</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <p class="alert alert-warning">Không tìm thấy sản phẩm nào trong khoảng giá này.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>