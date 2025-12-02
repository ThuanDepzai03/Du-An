<form action="index.php" method="GET">
    <input type="hidden" name="action" value="shop">
    <div class="aside-widget">
        <h3 class="aside-title">Lọc theo giá</h3>
        <div class="price-filter">
            <div class="input-group">
                <span>Từ:</span>
                <input type="number" name="min_price" class="form-control" value="<?= $_GET['min_price'] ?? '' ?>">
            </div>
            <div class="input-group">
                <span>Đến:</span>
                <input type="number" name="max_price" class="form-control" value="<?= $_GET['max_price'] ?? '' ?>">
            </div>
        </div>
    </div>

    <div class="aside-widget">
        <h3 class="aside-title">Danh mục</h3>
        <div class="checkbox-filter">
            <?php foreach ($danhmuc as $dm): ?>
                <div class="input-checkbox">
                    <input type="radio" name="iddm"
                        id="category-<?= $dm['id'] ?>"
                        value="<?= $dm['id'] ?>"
                        <?= (isset($_GET['iddm']) && $_GET['iddm'] == $dm['id']) ? 'checked' : '' ?>>
                    <label for="category-<?= $dm['id'] ?>">
                        <span></span>
                        <?= htmlspecialchars($dm['name']) ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <button type="submit" class="primary-btn btn-sm mt-15 w-100">ÁP DỤNG LỌC</button>
</form>