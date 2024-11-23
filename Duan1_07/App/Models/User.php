<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class User extends BaseModel
{
    protected $table = 'users';
    protected $id = 'user_id';

    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }

    public function createUser($data)
    {
        return $this->create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
    public function getAllUserByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneUserByUsername(string $username)
    {
        try {
            // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
            $sql = "SELECT * FROM $this->table WHERE username = ?"; // Giữ nguyên truy vấn nếu 'username' là cột khóa để tìm
            $conn = $this->_conn->MySQLi(); // Lấy kết nối MySQLi
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username); // Tham số username là chuỗi
            $stmt->execute();
            $query_result = $stmt->get_result();

            // Kiểm tra nếu có kết quả
            if ($query_result->num_rows > 0) {
                $user = $query_result->fetch_assoc();
                if (isset($user['user_id'])) {
                    return $user;
                } else {
                    // Ghi log lỗi nếu không có user_id
                    error_log('Lỗi: user_id không có trong kết quả của username: ' . $username);
                    return null;
                }
            } else {
                // Ghi log nếu không tìm thấy người dùng
                error_log('Không tìm thấy người dùng với username: ' . $username);
                return null;
            }
        } catch (\Throwable $th) {
            // Ghi log lỗi nếu có exception
            error_log('Lỗi khi truy vấn cơ sở dữ liệu: ' . $th->getMessage());
            return null;
        }
    }

    public function updateUserByUsernameAndEmail(array $data)
    {
        try {
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
            $sql = "UPDATE $this->table SET password = '$password' WHERE username = '$username' AND email = '$email'";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //trả về số hàng dữ liệu bị ảnh hưởng
            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            NotificationHelper::error('updateUserByUsernameAndEmail', 'Lỗi khi thực hiện cập nhật dữ liệu');
            return false;
}
    }
}