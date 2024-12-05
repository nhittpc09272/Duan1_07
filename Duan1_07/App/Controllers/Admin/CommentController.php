<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Comment;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Pages\Comment\Edit;
use App\Views\Admin\Pages\Comment\Index;

class CommentController
{

    // hiển thị danh sách
    public static function index()
    {
        // khởi tạo đối tượng model
        $comment = new Comment();
        $data = $comment->getAllCommentJoinProductAndUser();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }


    // hiển thị giao diện form thêm
    public static function create()
    {
    }


    // xử lý chức năng thêm
    public static function store()
    {
    }


    // hiển thị chi tiết
    public static function show()
    {
    }


    // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        // khởi tạo đối tượng model
        $comment = new Comment();
        $data = $comment->getOneCommentJoinProductAndUser($id);
        if ($data) {
            Header::render();
            Notification::render();
            NotificationHelper::unset();
            // hiển thị form sửa
            Edit::render($data);
            Footer::render();
        } else {
            NotificationHelper::error('comment',  'Không có bình luận này');
            header('location: /admin/comments');
        }
    }


    // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        $is_valid = true;
        if (!isset($_POST['status']) || $_POST['status'] === '') {
            NotificationHelper::error('status', 'Không để trống trạng thái');
            $is_valid = false;
        }

        if ($is_valid) {
            $data = [
                'status' => $_POST['status']
            ];

            $comment = new Comment();
            $result = $comment->updateComment($id, $data);

            if ($result) {
                // echo 'Thành công';
                NotificationHelper::success('comment', 'Cập nhật thành công');
            } else {
                NotificationHelper::error('comment', 'Cập nhật thất bại');
            }
            header('location: /admin/comments');
        } else {
            // chuyển hướng đến trang sửa
            header("location: /admin/comments/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $comment = new Comment();
        $result = $comment->deleteComment($id);
        if ($result) {
            // echo 'Xoá thành công';
            NotificationHelper::success('comment', 'Xoá thành công');
        } else {
            NotificationHelper::error('comment', 'Xoá thất bại');
        }

        header('location: /admin/comments');
    }
}
