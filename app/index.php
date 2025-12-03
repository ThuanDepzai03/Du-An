<?php
include_once("Controller/HomeController.php");
include_once("Controller/ShopController.php");
include_once("Controller/ProductController.php");

// Khởi tạo các controller
$homeController = new HomeController();
$shopController = new ShopController();
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
            // Kiểm tra kỹ bên ShopController tên hàm là Shop() hay shop() nhé
            $shopController->Shop();
            break;
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
