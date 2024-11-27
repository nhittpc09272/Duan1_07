<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products'; // Xác định tên bảng trong cơ sở dữ liệu là products.

    protected $id = 'product_id'; // Xác định tên cột khóa chính (primary key) trong bảng là id

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* FROM products 
        INNER JOIN categories 
        ON products.category_id = categories.categories_id 
        WHERE products.status =" . self::STATUS_ENABLE . "  
        AND categories.status = " . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatus(int $id)
{
    $result = [];
    try {
        // Truy vấn SQL
        $sql = "SELECT 
                    products.*, 
                    categories.category_name 
                FROM products 
                INNER JOIN categories 
                ON products.category_id = categories.categories_id 
                WHERE products.status = ? 
                AND categories.status = ? 
                AND products.category_id = ?";
        
        // Kết nối và chuẩn bị câu lệnh
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        
        // Gán tham số
        $status = self::STATUS_ENABLE;
        $stmt->bind_param('iii', $status, $status, $id);
        
        // Thực thi truy vấn và trả về kết quả
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        // Ghi log lỗi
        error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
        return $result;
    }
}



    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            // Câu truy vấn SQL
            $sql = "SELECT 
                        p.product_id, 
                        p.product_name, 
                        p.description, 
                        p.stock_quantity, 
                        p.image, 
                        p.status AS product_status, 
                        p.category_id, 
                        c.category_name, 
                        p.price
                    FROM 
                        products p
                    INNER JOIN 
                        categories c 
                    ON 
                        p.category_id = c.categories_id
                    WHERE 
                        p.product_id = ? 
                        AND p.status = 1
                        AND c.status = 1";
// Kết nối tới database
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Gán giá trị cho tham số
            $stmt->bind_param('i', $id);

            // Thực thi câu lệnh
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy chi tiết sản phẩm: ' . $th->getMessage());
        }

        return $result;
    }
}

