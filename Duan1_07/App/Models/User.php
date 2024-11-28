<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class User extends BaseModel
{
    protected $table = 'users';
    protected $id = 'id';

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
    $result = [];
    try {
        // Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
        $sql = "SELECT * FROM $this->table WHERE username=?";
        $conn = $this->_conn->MySQLi(); // Lấy kết nối MySQLi
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username); // Tham số username là chuỗi
        $stmt->execute();
        $query_result = $stmt->get_result();

        // Nếu có kết quả, trả về mảng dữ liệu người dùng
        if ($query_result->num_rows > 0) {
            return $query_result->fetch_assoc(); // Trả về toàn bộ thông tin người dùng
        } else {
            return null; // Nếu không tìm thấy người dùng
        }
    } catch (\Throwable $th) {
        error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
        return $result; // Trả về mảng rỗng nếu có lỗi
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
