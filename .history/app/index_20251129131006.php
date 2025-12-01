<?php
include_once("Controller/HomeController.php");
include_once("Views/layout/header.php");
include_once("Controller/ShopController.php");

$homeController = new HomeController(); // khởi tạo controller mặc định
$shopController = new ShopController(); // khởi tạo controller mặc định

if (isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch ($action) {
        case 'home':
            $homeController->home();
            break;
        case 'shop':                //  ⭐ THÊM MỚI
            $shopController->Shop();    //  ⭐ GỌI HÀM shop() TRONG CONTROLLER
            break;

        default:
            echo "404 Not Found";
            break;
    }
} else {
    $controller->index(); // mặc định
}
include_once("Views/layout/footer.php");
