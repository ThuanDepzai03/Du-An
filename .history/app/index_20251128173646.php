<?php 
include_once("Controller/HomeController.php");
include_once("Views/layout/header.php");

$controller = new HomeController(); // khởi tạo controller mặc định

if(isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];
    switch($action) {
        case 'home':
            $controller->index();
            break;
        default:
            echo "404 Not Found";
            break;
    }   
} else {
    $controller->index(); // mặc định
}
include_once("Views/layout/footer.php");
?>