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

        // Kiểm tra các trường dữ liệu từ form
        if (empty($_POST['name'])) {
            NotificationHelper::error('name', 'Không để trống họ tên');
            $is_valid = false;
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            NotificationHelper::error('email', 'Email không hợp lệ');
            $is_valid = false;
        }

        if (empty($_POST['message'])) {
            NotificationHelper::error('message', 'Nội dung không được để trống');
            $is_valid = false;
        }

        // Nếu tất cả đều hợp lệ, gửi email
        if ($is_valid) {
            $name = $_POST['name'];
            $email = $_POST['email']; // Lấy email từ form nhập
            $message = $_POST['message'];

            // Cấu hình PHPMailer
            $mail = new PHPMailer(true); // Enable exceptions

            try {
                // Cấu hình SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'quocanh25115@gmail.com'; // Địa chỉ Gmail của bạn
                $mail->Password = 'mgbb qlbh lhbo wkxs'; // App password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Người gửi
                $mail->setFrom($email, $name); // Sử dụng email và tên nhập từ form

                // Người nhận
                $mail->addAddress('quocanh25115@gmail.com', 'Liên Hệ'); // Email của bạn là người nhận

                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = "Liên hệ từ $name";
                $mail->Body    = "<p>Bạn đã nhận được tin nhắn từ <strong>$name</strong> ($email):</p><p>$message</p>";
                $mail->CharSet = 'UTF-8'; // Bổ sung thêm dòng này

                // Hiển thị thông tin người gửi và người nhận
                echo "Người gửi: $name ($email)<br>";
                echo "Người nhận: quocanh25115@gmail.com (Liên Hệ)<br>";

                // Gửi email
                if ($mail->send()) {
                    NotificationHelper::success('email', 'Email đã được gửi thành công.');
                } else {
                    NotificationHelper::error('email', 'Không thể gửi email. Lỗi: ' . $mail->ErrorInfo);
                }
            } catch (Exception $e) {
                NotificationHelper::error('email', 'Lỗi: ' . $e->getMessage());
            }
        }

        // Sau khi gửi email, điều hướng về trang liên hệ
        header('Location: /contact');
        exit();
    }
}