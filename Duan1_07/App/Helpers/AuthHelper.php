<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{

    public static function register($data)
    {
        // Kiểm tra xem tên đăng nhập có tồn tại trong cơ sở dữ liệu hay không
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);

        if ($is_exist) {
            return false;  // Tên đăng nhập đã tồn tại, trả về false
        }

        // Nếu 'phone' không có giá trị, có thể đặt một giá trị mặc định (ví dụ: rỗng)
        if (empty($data['phone'])) {
            $data['phone'] = ''; // Giá trị mặc định nếu không có số điện thoại
        }

        // Tạo người dùng mới
        $result = $user->createUser($data);

        return $result;  // Trả về true nếu thành công, false nếu thất bại
    }


    // public static function login($data)
    // {
    //     $user = new User();
    //     $is_exist = $user->getOneUserByUsername($data['username']);

    //     // Kiểm tra nếu người dùng không tồn tại hoặc thiếu user_id
    //     if (empty($is_exist)) {
    //         NotificationHelper::error('login', 'Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.');
    //         return false;
    //     }

    //     if (!isset($is_exist['user_id'])) {
    //         // Ghi log lỗi khi thiếu user_id
    //         error_log('Lỗi: user_id không có trong kết quả truy vấn cho username: ' . $data['username']);
    //         NotificationHelper::error('username', 'Không tìm thấy thông tin người dùng');
    //         return false;
    //     }

    //     // Kiểm tra mật khẩu
    //     if (!password_verify($data['password'], $is_exist['password'])) {
    //         NotificationHelper::error('password', 'Mật khẩu không đúng');
    //         return false;
    //     }

    //     // Kiểm tra trạng thái người dùng
    //     if ($is_exist['status'] == 0) {
    //         NotificationHelper::error('status', 'Tài khoản đã bị khóa');
    //         return false;
    //     }

    //     // Lưu thông tin vào session nếu đăng nhập thành công
    //     $_SESSION['user'] = [
    //         'user_id' => $is_exist['user_id'],
    //         'username' => $is_exist['username'],
    //         'email' => $is_exist['email'],
    //         'role' => $is_exist['role'], // có thể lưu thêm các thông tin khác nếu cần
    //     ];

    //     // nếu có, kiểm tra remember => lưu session/ cookie => thông báo thành công, trả về true
    //     if($data['remember']){
    //         // lưu cookie, lưu session
    //         self::updateCookie($is_exist['user_id']);

    //     }else{
    //         //lưu session
    //         self::updateSession($is_exist['user_id']);
    //     }

    //     // NotificationHelper::success('login', 'Đăng nhập thành công');
    //     return true;
    // }
    public static function login($data)
    {
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);

        if (empty($is_exist)) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.'
            ];
            return false;
        }

        if (!password_verify($data['password'], $is_exist['password'])) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Mật khẩu không đúng.'
            ];
            return false;
        }

        if ($is_exist['status'] == 0) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Tài khoản đã bị khóa.'
            ];
            return false;
        }

        // Lưu thông tin người dùng
        $_SESSION['user'] = [
            'user_id' => $is_exist['user_id'],
            'username' => $is_exist['username'],
            'email' => $is_exist['email'],
            'role' => $is_exist['role']
        ];

        if ($data['remember']) {
            self::updateCookie($is_exist['user_id']);
        } else {
            self::updateSession($is_exist['user_id']);
        }

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Đăng nhập thành công!'
        ];

        return true;
    }







    public static function updateCookie(int $id)
    {
        if ($id === null) {
            return; // Hoặc xử lý lỗi
        }
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            // Chuyển array thành string json để lưu vào cookie user
            $user_data = json_encode($result);

            // Lưu cookie
            setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');

            // Lưu session
            $_SESSION['user'] = $result;
        }
    }



    public static function updateSession(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if ($result) {
            // lưu session
            $_SESSION['user'] = $result;
        }
    }

    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);



            $_SESSION['user'] = (array) $user_data;

            return true;
        }

        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }



    public static function logout()
    {
        // xóa cookie
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        if (!isset($_SESSION['user'])) {
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/');
        }
    }

    public static function edit($id): bool
    {
        if (!self::checkLogin()) {
            NotificationHelper::error('login', 'Vui lòng dăng nhập để xem thêm');
            return false;
        }

        $data = $_SESSION['user'];
        $user_id = $data['user_id'];

        if ($user_id != $id) {
            NotificationHelper::error('user_id', 'Không có quyền xem thông tin');
            return false;
        }

        return true;
    }

    public static function update($id, $data)
    {

        $user = new User();
        $result = $user->updateUser($id, $data);

        if (!$result) {
            // NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản thất bại');
            return false;
        }

        if ($_SESSION['user']) {
            self::updateSession($id);
        }
        if ($_COOKIE['user']) {
            self::updateCookie($id);
        }

        // NotificationHelper::success('update_user', 'Cập nhật thông tin tài khoản thành công');
        return true;
    }

    public static function changePassword($id, $data)
    {

        $user = new User();
        $result = $user->getOneUser($id);
        if (!$result) {
            NotificationHelper::error('account', 'Không tồn tại tài khoản');
            return false;
        }

        //Kiểm tra mật khẩu cũ có trùng khớp vói db kh
        if (!password_verify($data['old_password'], $result['password'])) {
            NotificationHelper::error('password_verify', 'Mật khẩu cũ không đúng');
            return false;
        }

        //Mã hóa mật khẩu mới trước khi lưu
        $hashed_password = password_hash($data['new_password'], PASSWORD_DEFAULT);

        $data_update = [
            'password' => $hashed_password,
        ];

        $result_update = $user->updateUser($id, $data_update);
        if ($result_update) {
            if (isset($_COOKIE['user'])) {
                self::updateCookie($id);
            }
            self::updateSession($id);
            // NotificationHelper::success('change-password', 'Đổi mật khẩu thành công');
            return true;
        } else {
            NotificationHelper::error('change-password', 'Đổi mật khẩu thất bại');
            return false;
        }
    }

    public static function forgotPassword($data)
    {

        $user = new User();
        $result = $user->getOneUserByUsername($data['username']);

        return $result;
    }

    public static function resetPassword($data)
    {
        $user = new User();
        $result = $user->updateUserByUsernameAndEmail($data);

        return $result;
    }

    public static function middleware()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        $admin = $admin[1];

        if ($admin == 'admin') {
            // if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !=1) {
            //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
            //     header('location: /login');
            //     exit;
            // }

            if (!isset($_SESSION['user'])) {
                NotificationHelper::error('admin', 'vui lòng đăng nhập');
                header('location: /login');
                exit;
            }

            if ($_SESSION['user']['role'] != 1) {
                NotificationHelper::error('admin', 'vui lòng đăng nhập');
                header('location: /login');
                exit;
            }
        }
    }
}
