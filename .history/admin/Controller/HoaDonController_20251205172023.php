<?php
include_once("Model/DanhMuc.php");
class DanhMucController
{
    private $danhMuc;

    public function __construct()
    {
        $this->danhMuc = new DanhMuc();
    }

    // Phương thức list
    public function index()
    {
        $allDanhMuc = $this->danhMuc->getAll();
        include_once("./views/danhmuc/list.php");
    }
}
