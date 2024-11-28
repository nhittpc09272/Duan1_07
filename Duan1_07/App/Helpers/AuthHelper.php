<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{

    // public static function register($data){

    //     // bắt lỗi tồn tại username

    //     $user = new User();

    //     $is_exist=$user->getOneUserByUsername($data['username']);

    //     if($is_exist){
    //         NotificationHelper::error('exist_register', 'Tên đăng nhập đã tồn tại');
    //         return false;
    //     }

    //     $result = $user->createUser($data);

    //     if($result){
    //         NotificationHelper::success('register', 'Đăng ký thành công');
    //         return true;
    //     }
    //     NotificationHelper::error('register', 'Đăng ký thất bại');

    //     return false;
    // }
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


    public static function login($data)
    {
        $user = new User();
        $is_exist = $user->getOneUserByUsername($data['username']);

        // Kiểm tra nếu người dùng không tồn tại
        if (empty($is_exist) || !isset($is_exist['user_id'])) {
            NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
            return false;
        }

        // Kiểm tra mật khẩu
        if (!password_verify($data['password'], $is_exist['password'])) {
            NotificationHelper::error('password', 'Mật khẩu không đúng');
            return false;
        }

        // Kiểm tra trạng thái người dùng
        if ($is_exist['status'] == 0) {
            NotificationHelper::error('status', 'Tài khoản đã bị khóa');
            return false;
        }

        // Kiểm tra xem người dùng có muốn "remember me" hay không
        if ($data['remember']) {
            // Kiểm tra nếu user_id là hợp lệ trước khi gọi updateCookie
            if (isset($is_exist['user_id']) && is_int($is_exist['user_id'])) {
                self::updateCookie($is_exist['user_id']);
            } 
        } else {
            // Lưu session
            self::updateSession($is_exist['user_id']);
        }

        NotificationHelper::success('login', 'Đăng nhập thành công');
        return true;
    }



    public static function updateCookie(int $id)
    {
        $user = new User();
        $result = $user->getOneUser($id);

        if (!$result || !isset($result['id'])) {
            // Nếu không có dữ liệu hoặc không có trường 'id'
            error_log("Lỗi: Không tìm thấy người dùng với ID: $id");
            
            return;  // Dừng lại nếu không tìm thấy dữ liệu hợp lệ
        }

        // Tiến hành lưu cookie và session nếu dữ liệu hợp lệ
        $user_data = json_encode($result);
        setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
        $_SESSION['user'] = $result;
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

    public static function checkLogin(): bool{
        if(isset($_COOKIE['user'])){
            $user = $_COOKIE['user'];
            $user_data = (array) json_decode($user);

            self::updateCookie($user_data['id']);

            // $_SESSION['user'] = (array) $user_data;

            return true;
        }

        if(isset($_SESSION['user'])){
            self::updateSession($_SESSION['user']['id']);
            return true;
        }   

        return false;
    }


    public static function logout(){
        // xóa cookie
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        if(!isset($_SESSION['user'])){
            setcookie('user', '', time() - 3600 * 24 * 30 * 12, '/' );
        }
    }

    public static function edit($id): bool{
        if(!self::checkLogin()){
            NotificationHelper::error('login', 'Vui lòng dăng nhập để xem thêm');
            return false;
        }

        $data = $_SESSION['user'];
        $user_id = $data['id'];

        if($user_id != $id){
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

    public static function changePassword($id, $data){

        $user = new User();
        $result = $user->getOneUser($id);
        if(!$result){
            NotificationHelper::error('account', 'Không tồn tại tài khoản');
            return false;
        }

        //Kiểm tra mật khẩu cũ có trùng khớp vói db kh
        if(!password_verify($data['old_password'], $result['password'])){
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

        // Tiến hành lưu cookie và session nếu dữ liệu hợp lệ
        $user_data = json_encode($result);
        setcookie('user', $user_data, time() + 3600 * 24 * 30 * 12, '/');
        $_SESSION['user'] = $result;
    }

    // public static function forgotPassword($data){

    //     $user = new User();
    //     $result = $user->getOneUserByUsername($data['username']);

    //     return $result;
    // }

    // public static function resetPassword($data){
    //     $user = new User();
    //     $result = $user->updateUserByUsernameAndEmail($data);

    //     return $result;
    // }

    // public static function middleware(){
    //     // var_dump($_SERVER['REQUEST_URI']);
    //     $admin=explode('/',$_SERVER['REQUEST_URI']);
    //     $admin=$admin[1];

    //     if($admin=='admin'){
    //         // if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !=1) {
    //         //     NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
    //         //     header('location: /login');
    //         //     exit;
    //         // }

    //         if(!isset($_SESSION['user'])){
    //             NotificationHelper::error('admin', 'vui lòng đăng nhập');
    //             header('location: /login');
    //             exit;
    //         }

    //         if($_SESSION['user']['role']!= 1)
    //         {
    //             NotificationHelper::error('admin', 'vui lòng đăng nhập');
    //             header('location: /login');
    //             exit;
    //         }
    //     }
    // }
}
