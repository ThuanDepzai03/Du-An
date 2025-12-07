<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Thêm tài khoản Admin / User</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=storeuser" method="post">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="user-input">Tên đăng nhập (Username)</label>
                                    <input required type="text" id="user-input" class="form-control" name="user"
                                        placeholder="Ví dụ: admin123">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="pass-input">Mật khẩu</label>
                                    <input required type="password" id="pass-input" class="form-control" name="pass"
                                        placeholder="Nhập mật khẩu...">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-input">Email</label>
                                    <input required type="email" id="email-input" class="form-control" name="email"
                                        placeholder="name@example.com">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address-input">Địa chỉ</label>
                                    <input type="text" id="address-input" class="form-control" name="address"
                                        placeholder="Nhập địa chỉ...">
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="btn_add" class="btn btn-primary me-1 mb-1">
                                    Thêm tài khoản
                                </button>

                                <a href="index.php?action=listuser" class="btn btn-light-secondary me-1 mb-1">Hủy bỏ</a>
                            </div>