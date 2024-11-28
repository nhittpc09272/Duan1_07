<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Category;
use App\Models\User;
use App\Validations\CategoryValidation;
use App\Validations\UserValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Category\Create;
use App\Views\Admin\Pages\Category\Edit;
use App\Views\Admin\Pages\Category\Index;
use App\Views\Admin\Pages\User\Create as UserCreate;
use App\Views\Admin\Pages\User\Edit as UserEdit;
use App\Views\Admin\Pages\User\Index as UserIndex;

class UserController
{


    // hiển thị danh sách
    public static function index()
    {
        $user = new User();
        $data = $user->getAllUser();

        // Debug dữ liệu trả về
        if (empty($data)) {
            error_log('Không có dữ liệu trả về từ bảng users');
        } else {
            error_log('Dữ liệu trả về: ' . print_r($data, true));
        }

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        UserIndex::render($data);
        Footer::render();
    }


    //hiển thị giao diện form thêm
    public static function create()
    {
        // var_dump($_SESSION);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form thêm
        UserCreate::render();
        // Create::render();
        Footer::render();
    }



    // // xử lý chức năng thêm
    public static function store()
    {
        // echo 'Thực hiện lưu vào database';
        //validation cac truong du lieu
        $is_valid = UserValidation::create();

        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm người dùng thất bại');
            header('location: /admin/users/create');
            exit;
        }

        $username = $_POST['username'];
        // $status=$_POST['status'];
        //kiem tra ten dang nhap co ton tai chua khong duoc trung ten
        $user = new User();
        $is_exist = $user->getOneUserByUsername($username);

        if ($is_exist) {
            $_SESSION['error'] = 'Tên người dùng đã tồn tại'; // Lưu thông báo lỗi
            $_SESSION['form_data'] = $_POST; // Lưu dữ liệu form vào session
            header('location: /admin/users/create');
            exit;
        }                

        // echo'okkilaa';
        //thuc hien them 
        $data = [
            'username' => $username,
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'status' => $_POST['status']
        ];

        var_dump($data);

        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        $result = $user->createUser($data);

        if ($result) {
            NotificationHelper::success('store', 'Thêm người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('store', 'Tên người dùng đã tồn tại');
            header('location: /admin/users/create');
        }
    }


    // // hiển thị chi tiết
    // public static function show()
    // {
    // }


    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {

        $user = new User();
        $data = $user->getOneUser($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem ngươi dùng này');
            header('location: /admin/users');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        // Edit::render($data);
        UserEdit::render($data);
        Footer::render();
    }


    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        // echo 'Thực hiện lưu vào database';
        //validation cac truong du lieu
        $is_valid = UserValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
            exit;
        }



        $user = new User();

        //thuc hien cap nhat

        // echo'okkilaa';

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'status' => $_POST['status']

        ];

        if ($_POST['password'] !== '') {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $is_upload = UserValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        $result = $user->updateUser($id, $data);

        if ($result) {
            NotificationHelper::success('update', 'Cập nật người dùng thành công');
            header('location: /admin/users');
        } else {
            NotificationHelper::error('update', 'Cập nhật người dùng thất bại');
            header("location: /admin/users/$id");
        }
    }


    // // thực hiện xoá
    public static function delete(int $id)
    {
        // echo 'Thực hiện xoá';
        $user = new User();
        $result = $user->deleteUser($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xoá người dùng thành công');
        } else {
            NotificationHelper::error('delete', 'xoá người dùng thất bại');
        }
        header('location: /admin/users');
    }
}
