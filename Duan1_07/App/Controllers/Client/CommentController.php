<?php

namespace App\Controllers\Client;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Validations\CommentValidation;

// Lớp CommentController xử lý các hành động liên quan đến bình luận như thêm, cập nhật và xóa bình luận.
class CommentController
{

    // Phương thức này xử lý chức năng thêm một bình luận mới.
    public static function store()
    {
        // validation các trường dữ liệu
        // thực hiện kiểm tra tính hợp lệ của dữ liệu bình luận bằng cách gọi phương thức createClient của lớp CommentValidation
        $is_valid = CommentValidation::createClient();

        // Nếu dữ liệu không hợp lệ, thông báo lỗi được gửi đến người dùng và người dùng được chuyển hướng đến trang sản phẩm hoặc trang sản phẩm mặc định.
        if (!$is_valid) {
            NotificationHelper::error('store', 'Thêm bình luận thất bại');
            if (isset($_POST['product_id']) && $_POST['product_id']) {
                $product_id = $_POST['product_id'];
                header("location: /products/$product_id");
            } else {
                header("location: /products");
            }
            exit;
        }
        $product_id = $_POST['product_id'];
        $data = [ // $data là mảng chứa dữ liệu bình luận như nội dung, ID sản phẩm, và ID người dùng.
            'content' => $_POST['content'],
            'product_id' => $product_id,
            'user_id' => $_POST['user_id'],
        ];

        //$comment = new Comment() khởi tạo một đối tượng mới của lớp Comment.
        $comment = new Comment();
        $result = $comment->createComment($data); //$result là kết quả của việc tạo bình luận mới trong cơ sở dữ liệu.

        if ($result) { // thông báo thành công nếu bình luận được thêm thành công, và ngược lại với thông báo lỗi nếu không thành công.
            NotificationHelper::success('store', 'Thêm bình luận thành công');
        } else {
            NotificationHelper::error('store', 'Thêm bình luận thất bại');
        }
        header("location: products/$product_id"); //người dùng được chuyển hướng về trang sản phẩm sau khi thêm bình luận
    }

    // Phương thức này xử lý chức năng cập nhật một bình luận dựa trên ID của bình luận đó
    public static function update(int $id)
    {
        // validation các trường dữ liệu
        // CommentValidation::editClient() kiểm tra tính hợp lệ của dữ liệu bình luận sau khi chỉnh sửa.
        $is_valid = CommentValidation::editClient();

        if (!$is_valid) {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
            if (isset($_POST['product_id']) && $_POST['product_id']) {
                $product_id = $_POST['product_id'];
                header("location: /products/$product_id");
            } else {
                header("location: /products");
            }
            exit;
        }



        // $data là mảng chứa nội dung bình luận mới.
        $data = [
            'content' => $_POST['content'],
        ];
        $comment = new Comment(); //$comment = new Comment() khởi tạo đối tượng của lớp Comment.

        $result = $comment->updateComment($id, $data); // $result là kết quả của việc cập nhật bình luận trong cơ sở dữ liệu.

        if ($result) {
            NotificationHelper::success('update', 'Cập nhật bình luận thành công');
        } else {
            NotificationHelper::error('update', 'Cập nhật bình luận thất bại');
        }
        // isset($_POST['product_id']): Kiểm tra xem biến $_POST['product_id'] có tồn tại hay không trong dữ liệu được gửi từ biểu mẫu HTML (thông qua phương thức POST).
        if (isset($_POST['product_id']) && $_POST['product_id']) { //&& $_POST['product_id']: Đảm bảo rằng $_POST['product_id'] không chỉ tồn tại mà còn có giá trị không phải là giá trị "falsy" (tức là không rỗng, không phải 0, không phải null, v.v.).
            $product_id = $_POST['product_id']; // Gán giá trị của $_POST['product_id'] vào biến $product_id
            header("location: /products/$product_id");
        } else {
            header("location: /products");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        // $comment = new Comment() khởi tạo đối tượng của lớp Comment.
        $comment = new Comment();
        $result = $comment->deleteComment($id); // $result là kết quả của việc xóa bình luận từ cơ sở dữ liệu

        // var_dump($result);
        if ($result) {
            NotificationHelper::success('delete', 'Xóa bình luận thành công');
        } else {
            NotificationHelper::error('delete', 'Xóa bình luận thất bại');
        }

        // chuyển hướng
        if (isset($_POST['product_id']) && $_POST['product_id']) {
            $product_id = $_POST['product_id'];
            header("location: /products/$product_id");
        } else {
            header("location: /products");
        }
    }
}
