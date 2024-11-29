<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;
use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Layouts\Header;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ForgotPassword;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\ResetPassword;

class AuthController
{

    // Hiển thị trang đăng ký
    public function register()
    {
        Header::render();
        // Kiểm tra nếu form đăng ký được submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gọi phương thức register từ AuthHelper
            $is_success = AuthHelper::register($_POST);

            // Kiểm tra kết quả và lưu thông báo vào session
            if ($is_success) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Đăng ký thành công!'
                ];
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Đăng ký thất bại, vui lòng thử lại.'
                ];
            }

            // Sau khi xử lý xong, chuyển hướng lại về trang đăng ký để hiển thị thông báo
            header('Location: /register');
            exit();
        }


        Register::render();
        Footer::render();
    }

    public function registerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Loại bỏ trường 'method' và 're_password' khỏi dữ liệu
            unset($data['method']);

            // Log dữ liệu đã chỉnh sửa
            error_log('Processed data: ' . print_r($data, true));

            // Kiểm tra nếu các trường bắt buộc khác còn thiếu
            if (empty($data['username'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Tên đăng nhập không được để trống.'
                ];
                header('Location: /register');
                exit();
            }

            if (empty($data['password'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Mật khẩu không được để trống.'
                ];
                header('Location: /register');
                exit();
            }
            if (empty($data['re_password'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Nhập lại mật khẩu không được để trống.'
                ];
                header('Location: /register');
                exit();
            }

            if ($data['password'] !== $data['re_password']) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Mật khẩu và nhập lại mật khẩu không khớp.'
                ];
                header('Location: /register');
                exit();
            }

            if (empty($data['email'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Email không được để trống.'
                ];
                header('Location: /register');
                exit();
            }
            if (empty($data['phone'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Số điện thoại không được để trống.'
                ];
                header('Location: /register');
                exit();
            }

            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
            $data['password'] = $hashed_password;  // Gán lại mật khẩu đã mã hóa
            $hashed_password = password_hash($data['re_password'], PASSWORD_BCRYPT);
            $data['re_password'] = $hashed_password;  // Gán lại mật khẩu đã mã hóa
            // Gọi phương thức register để thực hiện đăng ký
            $is_success = AuthHelper::register($data);

            // Các bước xử lý thông báo và chuyển hướng tương tự
            if ($is_success) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Đăng ký thành công!'
                ];
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Đăng ký thất bại, vui lòng thử lại.'
                ];
            }

            header('Location: /register');
            exit();
        }
    }

    public static function login()
    {

        Header::render();
        // Kiểm tra nếu form đăng ký được submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gọi phương thức login từ AuthHelper
            $is_success = AuthHelper::login($_POST);

            // Kiểm tra kết quả và lưu thông báo vào session
            if ($is_success) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Đăng Nhập thành công!'
                ];
                header('Location: /');
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Đăng nhập thất bại, vui lòng thử lại.'
                ];
            }

            // Sau khi xử lý xong, chuyển hướng lại về trang đăng ký để hiển thị thông báo
            header('Location: /login');
            exit();
        }


        Login::render();
        Footer::render();
    }

    public static function loginAction()
    {

        // Lấy dữ liệu người dùng nhập vào
        $data = [
            'username' => $_POST['username'],  // Tên đăng nhập
            'password' => $_POST['password'],  // Mật khẩu
            'remember' => isset($_POST['remember'])  // Kiểm tra nếu người dùng chọn "Nhớ tôi"
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Loại bỏ trường 'method' và 're_password' khỏi dữ liệu
            unset($data['method']);

            // Log dữ liệu đã chỉnh sửa
            error_log('Processed data: ' . print_r($data, true));

            // Kiểm tra nếu các trường bắt buộc khác còn thiếu
            if (empty($data['username'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Tên đăng nhập không được để trống.'
                ];
                header('Location: /login');
                exit();
            }

            if (empty($data['password'])) {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Mật khẩu không được để trống.'
                ];
                header('Location: /login');
                exit();
            }
            $is_success = AuthHelper::login($data);
            // Các bước xử lý thông báo và chuyển hướng tương tự
            if ($is_success) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Đăng nhập thành công!'
                ];
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Đăng nhập thất bại, vui lòng thử lại.'
                ];
            }

            header('Location: /login');
            exit();
        }
    }


    public static function logout()
    {
        AuthHelper::logout();
        // NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('Location: /');
        //Kiểm tra nếu form đăng ký được submit
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // Gọi phương thức register từ AuthHelper
        //     $is_success = AuthHelper::logout();

        //     // Kiểm tra kết quả và lưu thông báo vào session
        //     if ($is_success) {
        //         $_SESSION['notification'] = [
        //             'type' => 'success',
        //             'message' => 'Đăng xuất thành công!'
        //         ];
        //     } else {
        //         $_SESSION['notification'] = [
        //             'type' => 'error',
        //             'message' => 'Đăng xuất thất bại, vui lòng thử lại.'
        //         ];
        //     }

        //     // Sau khi xử lý xong, chuyển hướng lại về trang đăng ký để hiển thị thông báo
        //     header('Location: /');
        // }
    }

    public static function edit($id)
    {
        $result = AuthHelper::edit($id);

        if (!$result) {
            if (isset($_SESSION['error']['login'])) {
                header('Location: /login');
                exit;
            }
            if (isset($_SESSION['error']['user_id'])) {
                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("Location: /users/$user_id");
                exit;
            }
        }

        $data = $_SESSION['user'];
        Header::render();
        Notification::render();  // Hiển thị thông báo nếu có
        NotificationHelper::unset();
        //Giao diện thông tin user
        Edit::render($data);
        Footer::render();
    }

    public static function update($id)
    {
        //     // $is_valid = AuthValidation::edit();

        //     // if(!$is_valid){
        //     //     NotificationHelper::error('update_user', 'Cập nhật thông tin tài khoản  thất bại');
        //     //     header("Location: /users/$id");
        //     //     exit();
        //     // }

        //     $data = [
        //         'email' => $_POST['email'],
        //         'phone' => $_POST['phone'],
        //         'address' => $_POST['address'],
        //         'username' => $_POST['username'],
        //     ];

        // Kiểm tra avatar có được upload hợp lệ hay không
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        // Gọi helper để cập nhật thông tin
        $result = AuthHelper::update($id, $data);

        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Cập nhật thông tin thành công!'
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Cập nhật thông tin thất bại, vui lòng thử lại.'
            ];
        }

        // Chuyển hướng về trang thông tin người dùng
        header("Location: /users/$id");
        exit();
    }




    //Hiển thị form đổi mật khẩu
    public static function changePassword()
    {
        $is_login = AuthHelper::checkLogin();

        if (!$is_login) {
            NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
            header('Location: /login');
            exit;
        }

        $data = $_SESSION['user'];

        Header::render();
        Notification::render();  // Hiển thị thông báo nếu có
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }
    public static function changePasswordAction()
    {
        $is_valid = AuthValidation::changePassword();
        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Đổi mật khẩu thất bại, vui lòng kiểm tra lại thông tin.'
            ];
            header('Location: /change-password');
            exit();
        }

        $id = $_SESSION['user']['user_id'];
        $data = [
            'old_password' => $_POST['old_password'],
            'new_password' => $_POST['new_password'],
        ];

        $result = AuthHelper::changePassword($id, $data);
        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Đổi mật khẩu thành công!'
            ];
            header('Location: /login');
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Đổi mật khẩu thất bại, vui lòng thử lại.'
            ];
            header('Location: /change-password');
        }

        exit();
    }
    


    

    // Hiển thị giao diện form lấy lại mật khẩu
    public static function forgotPassword()
    {

        Header::render();
        Notification::render();  // Hiển thị thông báo nếu có
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }

    //Hiển thị form đổi mật khẩu
    // public static function changePassword()
    // {
    //     $is_login = AuthHelper::checkLogin();

    //     if (!$is_login) {
    //         NotificationHelper::error('login', 'Vui lòng đăng nhập để đổi mật khẩu');
    //         header('Location: /login');
    //         exit;
    //     }

    //     $data = $_SESSION['user'];

    //     Header::render();
    //     Notification::render();  // Hiển thị thông báo nếu có
    //     NotificationHelper::unset();
    //     ChangePassword::render($data);
    //     Footer::render();
    // }
    // public static function changePasswordAction()
    // {
    //     $is_valid = AuthValidation::changePassword();
    //     if (!$is_valid) {
    //         $_SESSION['notification'] = [
    //             'type' => 'error',
    //             'message' => 'Đổi mật khẩu thất bại, vui lòng kiểm tra lại thông tin.'
    //         ];
    //         header('Location: /change-password');
    //         exit();
    //     }

    //     $id = $_SESSION['user']['user_id'];
    //     $data = [
    //         'old_password' => $_POST['old_password'],
    //         'new_password' => $_POST['new_password'],
    //     ];

    //     $result = AuthHelper::changePassword($id, $data);
    //     if ($result) {
    //         $_SESSION['notification'] = [
    //             'type' => 'success',
    //             'message' => 'Đổi mật khẩu thành công!'
    //         ];
    //         header('Location: /login');
    //     } else {
    //         $_SESSION['notification'] = [
    //             'type' => 'error',
    //             'message' => 'Đổi mật khẩu thất bại, vui lòng thử lại.'
    //         ];
    //         header('Location: /change-password');
    //     }

    //     exit();
    // }




    // // Hiển thị giao diện form lấy lại mật khẩu
    // public static function forgotPassword()
    // {

    //     Header::render();
    //     Notification::render();  // Hiển thị thông báo nếu có
    //     NotificationHelper::unset();
    //     ForgotPassword::render();
    //     Footer::render();
    // }


    // Thực hiện lấy lại mật khẩu
    public static function forgotPasswordAction()
    {
        $is_valid = AuthValidation::forgotPassword();
        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Gửi yêu cầu lấy lại mật khẩu thất bại.'
            ];
            header('Location: /forgot-password');
            exit();
        }

        $username = $_POST['username'];
        $email = $_POST['email'];

        $data = ['username' => $username];
        $result = AuthHelper::forgotPassword($data);

        if (!$result) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Không tìm thấy tài khoản hoặc thông tin không khớp.'
            ];
            header('Location: /forgot-password');
            exit();
        }

        if ($result['email'] != $email) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Email không đúng.'
            ];
            header('Location: /forgot-password');
            exit();
        }

        $_SESSION['reset_password'] = [
            'username' => $username,
            'email' => $email
        ];

        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Yêu cầu đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra email.'
        ];

        header('Location: /reset-password');
        exit();
    }


    public static function resetPassword()
    {
        if (!isset($_SESSION['reset_password'])) {
            NotificationHelper::error('reset_password', 'Vui lòng nhập đầy đủ thông tin của form này');
            header('Location: /forgot-password');
            exit();
        }
        Header::render();
        Notification::render();  // Hiển thị thông báo nếu có
        NotificationHelper::unset();
        ResetPassword::render();
        Footer::render();
    }


    public static function resetPasswordAction()
    {
        $is_valid = AuthValidation::resetPassword();
        if (!$is_valid) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Đặt lại mật khẩu thất bại, vui lòng kiểm tra thông tin.'
            ];
            header('Location: /reset-password');
            exit();
        }

        $password = $_POST['password'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $_SESSION['reset_password']['username'],
            'email' => $_SESSION['reset_password']['email'],
            'password' => $hash_password
        ];

        $result = AuthHelper::resetPassword($data);

        if ($result) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Đặt lại mật khẩu thành công!'
            ];
            unset($_SESSION['reset_password']);
            header('Location: /login');
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Đặt lại mật khẩu thất bại, vui lòng thử lại.'
            ];
            header('Location: /reset-password');
        }

        exit();
    }
}
