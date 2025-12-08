<?php

class CheckOutController {

    private $cartModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        include_once("Model/CartModel.php");
        $this->cartModel = new CartModel();
    }

    // Hiển thị trang checkout
    public function showCheckout() {

        $cart = $_SESSION['cart'] ?? [];

        // Lấy dữ liệu sản phẩm từ DB
        foreach ($cart as $key => $item) {
            $product = $this->cartModel->getAllProductById($item['id']);

            if ($product) {
                $_SESSION['cart'][$key]['name'] = $product['name'];
                $_SESSION['cart'][$key]['price'] = $product['price'];
                $_SESSION['cart'][$key]['img'] = $product['img'];
            }
        }

        include_once("./Views/checkout.php");
    }

    // Xử lý nút "Thanh toán"
    public function checkout() {

        if (empty($_SESSION['cart'])) {
            echo "<script>alert('Giỏ hàng trống!'); window.location.href='index.php?action=showcart';</script>";
            return;
        }

        if (empty($_POST['ten']) || empty($_POST['diachi']) || empty($_POST['sdt'])) {
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin!'); history.back();</script>";
            return;
        }

        $ten = $_POST['ten'];
        $diaChi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $pttt = $_POST['pttt'] ?? 0;

        // Tính tổng tiền
        $tongTien = 0;
        foreach ($_SESSION['cart'] as $item) {
            $tongTien += $item['price'] * $item['soLuong'];
        }

        // ⭐ TẠO HÓA ĐƠN TRƯỚC
        $hoaDonId = $this->cartModel->insertHoaDon($ten, $diaChi, $sdt, $tongTien, $pttt);

        // Lưu chi tiết hóa đơn
        foreach ($_SESSION['cart'] as $item) {
            $this->cartModel->insertCTHoaDon($hoaDonId, $item['id'], $item['soLuong'], $item['price']);
        }

        // Nếu thanh toán online → chuyển sang trang QR
        if ($pttt == 1) {

            // 1. Tạo hóa đơn trước, trạng thái: 0 = chờ thanh toán
            $hoaDonId = $this->cartModel->insertHoaDon($ten, $diaChi, $sdt, $tongTien, $pttt);

            // 2. Lưu chi tiết hóa đơn
            foreach ($_SESSION['cart'] as $item) {
                $this->cartModel->insertCTHoaDon($hoaDonId, $item['id'], $item['soLuong'], $item['price']);
            }

            // 3. Chuyển sang trang QR
            header("Location: index.php?action=momo&amount={$tongTien}&order={$hoaDonId}");
            exit;
        }


        // Nếu thanh toán COD
        $_SESSION['cart'] = [];
        echo "<script>
                alert('Đặt hàng thành công (Thanh toán khi nhận hàng)!');
                window.location.href='index.php?action=home';
              </script>";
    }

}

?>
