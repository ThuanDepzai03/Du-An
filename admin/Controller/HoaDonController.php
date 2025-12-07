<?php
include_once("Model/HoaDon.php");
class HoaDonController
{
    private $hoaDon;

    public function __construct()
    {
        $this->hoaDon = new HoaDon();
    }

    // Phương thức list
    public function index()
    {
        $allHoaDon = $this->hoaDon->getAll();
        include_once("./views/hoadon/list.php");
    }
    public function chiTietHoaDon()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoaDon = $this->hoaDon->getOne($id);
            $allCTHD = $this->hoaDon->getAllCthdByIdHoaDon($id);
            include_once("./views/hoadon/detail.php");
        }
    }
    public function update_status()
    {
        if (isset($_POST['id']) && isset($_POST['trangthai'])) {
            $id = $_POST['id'];
            $trangthai = $_POST['trangthai'];

            // Gọi Model cập nhật
            $this->hoaDon->updateStatus($id, $trangthai);

            // Cập nhật xong reload lại trang chi tiết
            echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href='index.php?action=chitiethoadon&id=$id';</script>";
        }
    }
}
