<?php
// Bật output buffering từ đầu file
ob_start();

include_once("Controller/HomeController.php");
include_once("Controller/ShopController.php");
include_once("Controller/CartController.php");
include_once("Controller/CheckOutController.php");
include_once("Controller/ProductController.php");

// Khởi tạo các controller
$homeController = new HomeController();
$shopController = new ShopController();
$cartController = new CartController();
$checkoutController = new CheckOutController();
$productController = new ProductController();


// Phần Header thường nên để Controller gọi bên trong hàm view, 
// nhưng nếu bạn để ở đây thì nó sẽ hiện cho tất cả các trang.
include_once("Views/layout/header.php");

if (isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch ($action) {
        case 'home':
            $homeController->home();
            break;
        case 'shop':
            $shopController->Shop();
            break;
        case 'addcart':  
            $cartController->add();
            break;
        case 'showcart':
            $cartController->index();
            break;
        case 'showcheckout':
            $checkoutController->showCheckout();
            break;
        case 'checkoutsubmit':  
            $checkoutController->checkout();
        case 'about':
            $homeController->about();
            break;
        case 'contact':
            $homeController->contact();
            break;
         case 'detail':
            $productController->detail();   // <-- thêm dòng này
            break;
        default:
            echo "<h1>404 Not Found</h1>";
            break;
    }
} else {
    $homeController->home(); // Mặc định vào trang chủ
}

include_once("Views/layout/footer.php");

// Flush và tắt output buffering, gửi tất cả output ra trình duyệt
ob_end_flush();
?>
