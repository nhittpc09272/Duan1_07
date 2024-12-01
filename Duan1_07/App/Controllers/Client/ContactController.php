<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Views\Client\Components\Notification;
use App\Validations\ContactValidation;
use App\Views\Client\Layouts\Footer;
use App\Views\Client\Pages\Contacts\Contact;
use App\Views\Client\Layouts\Header;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController
{
    public static function contact()
    {
        Header::render();
        Contact::render();
        Footer::render();
    }

    // public static function submit()
    // {
    //     // Xác thực dữ liệu từ form
    //     if (!ContactValidation::validate()) {
    //         // Nếu không hợp lệ, quay lại form liên hệ
    //         header('Location: /contact');
    //         exit();
    //     }

    //     // Nếu hợp lệ, xử lý dữ liệu (ví dụ: gửi email hoặc lưu vào cơ sở dữ liệu)
    //     // ...

    //     // Thông báo thành công
    //     NotificationHelper::success('contact', 'Gửi liên hệ thành công!');
    //     header('Location: /contact');
    //     exit();
    // }
    public static function sendEmail()
    {
        $is_valid = true;
        $errors = []; // Mảng lưu trữ các lỗi
    
        // Kiểm tra tên
        if (!isset($_POST['name']) || trim($_POST['name']) === '') {
            $errors['name'] = 'Họ và tên không được để trống';
            $is_valid = false;
        }
    
        // Kiểm tra email
        if (!isset($_POST['email']) || trim($_POST['email']) === '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không hợp lệ';
            $is_valid = false;
        }
    
        // Kiểm tra chủ đề
        if (!isset($_POST['subject']) || trim($_POST['subject']) === '') {
            $errors['subject'] = 'Chủ đề không được để trống';
            $is_valid = false;
        }
    
        // Kiểm tra nội dung
        if (!isset($_POST['message']) || trim($_POST['message']) === '') {
            $errors['message'] = 'Nội dung liên hệ không được để trống';
            $is_valid = false;
        }
    
        // Nếu không hợp lệ, lưu lỗi vào session và chuyển hướng
        if (!$is_valid) {
            $_SESSION['contact_errors'] = $errors;
            $_SESSION['contact_data'] = $_POST;
    
            header('Location: /contact');
            exit();
        }
    
        // Nếu tất cả đều hợp lệ, gửi email
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
    
            $mail = new PHPMailer(true);
    
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'quocanh25115@gmail.com';
            $mail->Password = 'mgbb qlbh lhbo wkxs';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Người gửi
            $mail->setFrom($email, $name);
    
            // Người nhận
            $mail->addAddress('quocanh25115@gmail.com', 'Liên Hệ');
    
            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = "Liên hệ từ $name - $subject";
            $mail->Body = "<p>Bạn đã nhận được tin nhắn từ <strong>$name</strong> ($email):</p><p>Chủ đề: $subject</p><p>Nội dung: $message</p>";
            $mail->CharSet = 'UTF-8';
    
            // Gửi email
            if ($mail->send()) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Email đã được gửi thành công. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất!'
                ];
                unset($_SESSION['contact_data']);
            } else {
                $_SESSION['notification'] = [
                    'type' => 'error',
                    'message' => 'Không thể gửi email. Vui lòng thử lại.'
                ];
            }
        } catch (Exception $e) {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Lỗi: ' . $e->getMessage()
            ];
        }
    
        header('Location: /contact');
        exit();
    }
    
}
