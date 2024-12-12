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
            $mail->Body = "
            <!DOCTYPE html>
            <html lang='vi'>
            <head>
                <meta charset='UTF-8'>
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        line-height: 1.6;
                        color: #333;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #ffffff;
                        border-radius: 12px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                        overflow: hidden;
                    }
                    .email-header {
                        background: linear-gradient(135deg, #007bff, #0056b3);
                        color: white;
                        text-align: center;
                        padding: 20px;
                    }
                    .email-header h1 {
                        margin: 0;
                        font-size: 24px;
                        font-weight: 300;
                    }
                    .email-content {
                        padding: 25px;
                    }
                    .contact-details {
                        background-color: #f9f9f9;
                        border-radius: 8px;
                        padding: 15px;
                        margin-bottom: 20px;
                        border: 1px solid #e0e0e0;
                    }
                    .contact-details p {
                        margin: 10px 0;
                        color: #555;
                    }
                    .contact-details strong {
                        color: #333;
                        display: inline-block;
                        width: 100px;
                    }
                    .message-content {
                        background-color: #f1f7ff;
                        border-left: 4px solid #007bff;
                        padding: 15px;
                        margin-top: 20px;
                        font-style: italic;
                    }
                    .email-footer {
                        background-color: #f4f4f4;
                        text-align: center;
                        padding: 15px;
                        font-size: 12px;
                        color: #777;
                    }
                    @media only screen and (max-width: 600px) {
                        .email-container {
                            width: 100%;
                            margin: 0;
                            border-radius: 0;
                        }
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='email-header'>
                        <h1>🌟 Thông Báo Liên Hệ Mới</h1>
                    </div>
            
                    <div class='email-content'>
                        <div class='contact-details'>
                            <p><strong>Họ và Tên:</strong> " . htmlspecialchars($name) . "</p>
                            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                            <p><strong>Chủ Đề:</strong> " . htmlspecialchars($subject) . "</p>
                        </div>
            
                        <div class='message-content'>
                            <h3>Nội Dung Tin Nhắn</h3>
                            <p>" . nl2br(htmlspecialchars($message)) . "</p>
                        </div>
                    </div>
            
                    <div class='email-footer'>
                        <p>📅 Nhận được lúc: " . date('H:i:s d/m/Y') . "</p>
                        <p>© " . date('Y') . " Bản Quyền Thuộc Về Hệ Thống</p>
                        <p>🌐 Được gửi từ Trang Liên Hệ</p>
                    </div>
                </div>
            </body>
            </html>";
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
