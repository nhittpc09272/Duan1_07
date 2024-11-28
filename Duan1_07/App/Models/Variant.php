<?php

namespace App\Models;

class Variant extends BaseModel
{
    protected $table = 'product_variants';
    protected $id = 'variant_id';
    protected $product_id = 'product_id';

    public function getAllVariant()
    {
        $sql = "SELECT variant_id, size, color, status FROM {$this->table}";
        $conn = $this->_conn->MySQLi();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function getOneVariant($id)
    {
        return $this->getOne($id);
    }

    public function createVariant($data)
    {
        try {
            // Kết nối đến database
            $conn = $this->_conn->MySQLi();
            if (!$conn) {
                throw new \Exception('Không thể kết nối cơ sở dữ liệu.');
            }

            // Câu truy vấn SQL
            $sql = "INSERT INTO product_variants (size, color, status, product_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu truy vấn: ' . $conn->error);
            }

            // Gán giá trị và kiểm tra
            $stmt->bind_param('ssii', $data['size'], $data['color'], $data['status'], $data['product_id']);

            // Log dữ liệu đầu vào
            error_log('Dữ liệu đầu vào: ' . json_encode($data));

            // Thực thi câu truy vấn
            $result = $stmt->execute();
            if (!$result) {
                throw new \Exception('Lỗi khi thực thi câu truy vấn: ' . $stmt->error);
            }

            // Log kết quả thành công
            error_log('Thêm biến thể thành công với ID: ' . $stmt->insert_id);

            return true;
        } catch (\Throwable $th) {
            // Ghi log lỗi
            error_log('Lỗi khi thêm biến thể: ' . $th->getMessage());
            return false;
        }
    }


    public function updateVariant($id, $data)
    {
        try {
            // Kiểm tra nếu product_id là null hoặc không hợp lệ
            if ($data['product_id'] === null || !is_numeric($data['product_id']) || $data['product_id'] <= 0) {
                throw new \Exception("product_id không hợp lệ.");
            }

            // Kiểm tra và đảm bảo rằng $id là số nguyên hợp lệ
            if (!is_numeric($id) || $id <= 0) {
                throw new \Exception("ID không hợp lệ.");
            }

            // Chuẩn bị câu lệnh SQL với prepared statement để tránh SQL injection
            $sql = "UPDATE $this->table SET size=?, color=?, status=?, product_id=? WHERE $this->id=?";
            $conn = $this->_conn->MySQLi(); // Lấy kết nối MySQLi
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                throw new \Exception('Lỗi chuẩn bị câu truy vấn: ' . $conn->error);
            }

            // Ràng buộc tham số với kiểu dữ liệu thích hợp
            $stmt->bind_param('ssiii', $data['size'], $data['color'], $data['status'], $data['product_id'], $id);

            // Thực thi câu lệnh SQL
            if (!$stmt->execute()) {
                throw new \Exception('Lỗi khi thực thi câu truy vấn: ' . $stmt->error);
            }

            // Đảm bảo câu lệnh SQL thực thi thành công
            if ($stmt->affected_rows === 0) {
                throw new \Exception("Không có dữ liệu nào bị thay đổi.");
            }

            // Trả về true nếu cập nhật thành công
            return true;
        } catch (\Throwable $th) {
            // Ghi lại lỗi vào log
            error_log('Lỗi khi cập nhật biến thể: ' . $th->getMessage());
            return false;
        }
    }





    public function deleteVariant($id)
    {
        try {
            // Kết nối tới cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();

            // Câu truy vấn SQL để xóa
            $sql = "DELETE FROM product_variants WHERE variant_id = ?";
            $stmt = $conn->prepare($sql);

            // Kiểm tra lỗi khi chuẩn bị câu truy vấn
            if (!$stmt) {
                throw new \Exception('Lỗi khi chuẩn bị câu truy vấn xóa: ' . $conn->error);
            }

            // Gán giá trị và thực thi câu truy vấn
            $stmt->bind_param('i', $id);
            $result = $stmt->execute();

            // Kiểm tra kết quả
            if ($result) {
                return true;  // Thành công
            } else {
                throw new \Exception('Lỗi khi xóa biến thể: ' . $stmt->error);
            }
        } catch (\Throwable $th) {
            // Ghi log lỗi
            error_log('Lỗi khi xóa biến thể: ' . $th->getMessage());
            return false;
        }
    }


    public function getAllVariantByStatus()
    {
        return $this->getAllByStatus();
    }


    public function getOneVariantByName($size, $color)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE size=? AND color=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $size, $color);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy biến thể: ' . $th->getMessage());
            return $result;
        }
    }
}
