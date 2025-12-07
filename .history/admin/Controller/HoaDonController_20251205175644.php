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
            $id = $_GET['id']
            $hoaDon = $this->hoaDon->getOne($);
            include_once("./views/hoadon/list.php");
        }
    }
}
