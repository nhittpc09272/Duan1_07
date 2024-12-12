<?php

namespace App\Views\Admin\Pages\Category;

use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thêm loại sản phẩm</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <style>
                body {
                    background-color: #f8f9fa;
                }

                .card-title {
                    font-weight: bold;
                    text-transform: uppercase;
                }

                label {
                    font-weight: bold;
                }

                .btn-primary {
                    background-color: #007bff;
                    border-color: #007bff;
                }

                .btn-danger {
                    background-color: #dc3545;
                    border-color: #dc3545;
                }

                .btn:hover {
                    opacity: 0.9;
                }

                .error-message {
                    color: red;
                    font-size: 0.875rem;
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <?php Notification::render(); ?>
            <?php NotificationHelper::unset(); ?>

            <!-- Form thêm loại sản phẩm -->
            <div class="container mt-5">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm loại sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm loại sản phẩm</h4>
                        <form action="/admin/categories" method="POST">
                            <input type="hidden" name="method" value="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên loại sản phẩm..." required>
                                <div class="error-message" id="error-name"></div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái<span class="text-danger">*</span></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" disabled selected>Vui lòng chọn...</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                <div class="error-message" id="error-status"></div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-danger me-2">Làm lại</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

            <!-- Custom Validation -->
            <script>
                document.querySelector('form').addEventListener('submit', function(event) {
                    const name = document.getElementById('name').value.trim();
                    const status = document.getElementById('status').value;

                    let isValid = true;

                    if (!name) {
                        document.getElementById('error-name').innerText = "Tên không được để trống.";
                        isValid = false;
                    } else {
                        document.getElementById('error-name').innerText = "";
                    }

                    if (!status) {
                        document.getElementById('error-status').innerText = "Vui lòng chọn trạng thái.";
                        isValid = false;
                    } else {
                        document.getElementById('error-status').innerText = "";
                    }

                    if (!isValid) {
                        event.preventDefault();
                    }
                });
            </script>
        </body>

        </html>
<?php
    }
}
