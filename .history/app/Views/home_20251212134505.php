<div id="aside" class="col-md-3">

	<form action="index.php" method="GET">
		<input type="hidden" name="action" value="shop">

		<!-- CATEGORIES -->
		<div class="aside">
			<h3 class="aside-title">CATEGORIES</h3>
			<div class="checkbox-filter">

				<!-- Tất cả -->
				<div class="input-checkbox">
					<input type="radio" id="cat-0" name="iddm" value="0"
						<?= (!isset($_GET['iddm']) || $_GET['iddm'] == 0) ? 'checked' : '' ?>>
					<label for="cat-0">
						<span></span> Tất cả
					</label>
				</div>

				<!-- Danh mục động -->
				<?php foreach ($danhmuc as $dm): ?>
					<div class="input-checkbox">
						<input type="radio" id="cat-<?= $dm['id'] ?>" name="iddm" value="<?= $dm['id'] ?>"
							<?= (isset($_GET['iddm']) && $_GET['iddm'] == $dm['id']) ? 'checked' : '' ?>>
						<label for="cat-<?= $dm['id'] ?>">
							<span></span> <?= htmlspecialchars($dm['name']) ?>
						</label>
					</div>
				<?php endforeach; ?>

			</div>
		</div>

		<!-- PRICE -->
		<div class="aside">
			<h3 class="aside-title">PRICE</h3>
			<div class="price-filter">
				<div id="price-slider"></div>
				<div class="input-number price-min">
					<input type="number" name="min_price"
						value="<?= $_GET['min_price'] ?? 0 ?>">
					<span class="qty-up">+</span>
					<span class="qty-down">-</span>
				</div>
				<div class="input-number price-max">
					<input type="number" name="max_price"
						value="<?= $_GET['max_price'] ?? 99900000 ?>">
					<span class="qty-up">+</span>
					<span class="qty-down">-</span>
				</div>
			</div>
		</div>

		<!-- BUTTONS -->
		<button type="submit" class="primary-btn" style="width:100%; margin-top:20px;">
			ÁP DỤNG LỌC
		</button>

		<a href="index.php?action=shop"
			class="btn btn-default"
			style="width:100%; margin-top:10px;">
			Bỏ lọc
		</a>

	</form>
</div>