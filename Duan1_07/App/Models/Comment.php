<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class Comment extends BaseModel
{
    protected $table = 'comments';
    protected $id = 'id';

    const STATUS_ENABLE = 1; // Trạng thái kích hoạt bình luận

    public function getAllComment()
    {
        return $this->getAll();
    }

    public function getOneComment($id)
    {
        return $this->getOne($id);
    }

    public function createComment($data)
    {
        return $this->create($data);
    }

    public function updateComment($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteComment($id)
    {
        return $this->delete($id);
    }

    public function getAllCommentByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getAllCommentJoinProductAndUser()
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.product_name AS product_name, users.username, users.avatar 
            FROM comments 
            INNER JOIN products ON comments.product_id = products.product_id 
            INNER JOIN users ON comments.user_id = users.user_id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC) ?? [];
        } catch (\Throwable $th) {
            error_log('Error fetching all comments: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOneCommentJoinProductAndUser(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.product_name AS product_name, users.username, users.avatar
                    FROM comments 
                    INNER JOIN products ON comments.product_id = products.product_id 
                    INNER JOIN users ON comments.user_id = users.user_id
                    WHERE comments.id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc() ?? [];
        } catch (\Throwable $th) {
            error_log('Error fetching comment details: ' . $th->getMessage());
            return $result;
        }
    }

    public function get5CommentNewestByProductAndStatus(int $id)
    {
        $result = [];
        try {
            $status = self::STATUS_ENABLE; // Gán hằng số vào một biến
            $sql = "SELECT comments.*, users.username, users.avatar
                    FROM comments 
                    INNER JOIN users ON comments.user_id = users.user_id
                    WHERE comments.product_id = ? AND comments.status = ? 
                    ORDER BY comments.date DESC 
                    LIMIT 5";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $id, $status); // Truyền biến vào đây
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC) ?? [];
        } catch (\Throwable $th) {
            error_log('Error fetching newest comments: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotalComment(){
        return $this->countTotal();
    }

    public function countCommentByProduct()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, products.product_name FROM comments INNER JOIN products ON comments.product_id = products.product_id GROUP BY comments.product_id ORDER BY count DESC LIMIT 5;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC) ?? [];
        } catch (\Throwable $th) {
            error_log('Error counting comments by product: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.category_name AS category_name 
FROM products 
INNER JOIN categories ON products.category_id = categories.categories_id ";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            NotificationHelper::error('getAllProductJoinCategory', 'Lỗi khi hiển thị tất cả dữ liệu');
            return $result;
        }
    }
}
