<?php

namespace App\Models;

use App\Helpers\NotificationHelper;
use App\Interfaces\CrudInterface;
use Exception;

abstract class BaseModel implements CrudInterface
{
    protected $_conn;

    protected $table;
    protected $id;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;


    public function __construct()
    {
        $this->_conn = new Database();
    }

    public function getAll()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOne(int $id)
    {
        $result = null;  // Thay vì khởi tạo là mảng rỗng, chúng ta sẽ trả về null nếu không tìm thấy dữ liệu
        try {
            // Truy vấn SQL
            $sql = "SELECT * FROM $this->table WHERE $this->id = ?";
            $conn = $this->_conn->MySQLi(); // Lấy kết nối MySQLi
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id); // 'i' cho kiểu dữ liệu integer
            $stmt->execute();

            // Lấy kết quả truy vấn
            $query_result = $stmt->get_result();

            // Kiểm tra nếu có dữ liệu
            if ($query_result->num_rows > 0) {
                $result = $query_result->fetch_assoc(); // Trả về kết quả tìm thấy
            } 
            return $result;
        } catch (\Throwable $th) {
            // Xử lý lỗi khi truy vấn
            error_log('Lỗi khi lấy dữ liệu: ' . $th->getMessage());
            return null; // Trả về null nếu có lỗi
        }
    }

    // public function create(array $data)
    // {
    //     // $sql ="INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')";

    //     // $result = $this->_conn->connect()->query($sql);
    //     // return $result;

    //     try {
    //         $sql = "INSERT INTO $this->table (";
    //         foreach ($data as $key => $value) {
    //             $sql .= "$key, ";
    //         }
    //         // INSERT INTO $this->table (name, description, status, 
    //         $sql = rtrim($sql, ", ");
    //         // INSERT INTO $this->table (name, description, status
    //         $sql .=   " ) VALUES (";
    //         // INSERT INTO $this->table (name, description, status) VALUES (
    //         foreach ($data as $key => $value) {
    //             $sql .= "'$value', ";
    //         }

    //         // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1', 
    //         $sql = rtrim($sql, ", ");
    //         // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1'

    //         $sql .= ")";
    //         // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')

    //         $conn = $this->_conn->MySQLi();
    //         $stmt = $conn->prepare($sql);

    //         return $stmt->execute();
    //     } catch (\Throwable $th) {
    //         error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
    //         return false;
    //     }
    // }
    public function create(array $data)
    {
        try {
            // Chuẩn bị câu lệnh SQL động
            $columns = implode(", ", array_keys($data)); // Lấy tên cột (key của mảng)
            $placeholders = implode(", ", array_fill(0, count($data), "?")); // Tạo dấu hỏi chấm (? - placeholder)

            // Xây dựng câu lệnh SQL
            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

            // Chuẩn bị câu lệnh
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Ràng buộc tham số động dựa trên kiểu dữ liệu của mảng $data
            // Giả sử tất cả các trường là chuỗi (string), nếu có kiểu dữ liệu khác, thay đổi lại
            $types = str_repeat('s', count($data)); // 's' cho chuỗi, có thể thay đổi nếu có kiểu dữ liệu khác
            $stmt->bind_param($types, ...array_values($data)); // Ràng buộc giá trị thực tế

            // Thực thi câu lệnh
            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            $sql = "UPDATE $this->table SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key = '$value', ";
            }
            $sql = rtrim($sql, ", ");

            $sql .= " WHERE $this->id=$id";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            return false;
        }
    }
    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM $this->table WHERE $this->id=$id";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // trả về số hàng dữ liệu bị ảnh hưởng
            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status=" . self::STATUS_ENABLE;
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // đếm số lượng countTotal(): Đếm tổng số bản ghi trong bảng và trả về kết quả.
    public function countTotal()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS total FROM $this->table";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi count tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneByName($name)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE name=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $name);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy sản phẩm bằng tên: ' . $th->getMessage());
            return $result;
        }
    }
}
