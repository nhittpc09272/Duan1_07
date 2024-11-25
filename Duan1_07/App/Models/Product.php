<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'product_id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* FROM products 
            INNER JOIN categories 
            ON products.category_id = categories.categories_id 
            WHERE products.status =" . self::STATUS_ENABLE ."  
            AND categories.status = " . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }



    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT 
    products.*, 
    categories.category_name AS category_name,
    product_variants.size,
    product_variants.color,
    product_variants.status AS variant_status
FROM 
    products
INNER JOIN 
    categories ON products.category_id = categories.categories_id
LEFT JOIN 
    product_variants ON products.product_id = product_variants.product_id ";
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



            
            $sql = "SELECT products.*, categories.category_name AS category_name 
FROM products 
INNER JOIN categories 
ON products.category_id = categories.categories_id 
WHERE products.status = " . self::STATUS_ENABLE . " 
AND categories.status = " . self::STATUS_ENABLE . " 
 AND products.category_id = ?";

                $conn = $this->_conn->MySQLi();
                $stmt = $conn->prepare($sql);
    
                $stmt->bind_param('i', $id);
                $stmt->execute();
                return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } catch (\Throwable $th) {
                error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
                return $result;
            }
    }

    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.category_name AS category_name 
            FROM products 
            INNER JOIN categories 
            ON products.category_id = categories.categories_id 
            WHERE products.status = " . self::STATUS_ENABLE . " 
            AND categories.status = " . self::STATUS_ENABLE . " 
             AND products.category_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
