<?php
include_once("Model/HoaDon.php");
class DanhMucController
{
    private $hoaDon;

    public function __construct()
    {
        $this->hoaDon = new HoaDon();
    }

    // Phương thức list
    public function index()
    {
        $allDanhMuc = $this->danhMuc->getAll();
        include_once("./views/danhmuc/list.php");
    }
}
