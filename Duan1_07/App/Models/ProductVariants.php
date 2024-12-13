<?php

namespace App\Models;

class ProductVariants extends BaseModel
{
    protected $table = 'product_variants'; // Table name
    protected $id = 'variant_id'; // Primary key column

    // Constants for status
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    // Fetch all variants for a given product
    public function getVariantsByProductId($productId)
    {
        $result = [];
        try {
            $sql = "SELECT variant_id, size, color, status FROM $this->table WHERE product_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $query_result = $stmt->get_result();
            $result = $query_result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Error fetching product variants: ' . $th->getMessage());
        }
        return $result;
    }
    



    // Add a new variant
    public function addVariant($productId, $size, $color, $status = self::STATUS_ENABLE)
    {
        $data = [
            'product_id' => $productId,
            'size' => $size,
            'color' => $color,
            'status' => $status
        ];
        return $this->create($data);
    }

    // Update an existing variant
    public function updateVariant($variantId, $size, $color, $status)
    {
        $data = [
            'size' => $size,
            'color' => $color,
            'status' => $status
        ];
        return $this->update($variantId, $data);
    }

    // Delete a variant
    public function deleteVariant($variantId)
    {
        try {
            return $this->delete($variantId);
        } catch (\Throwable $th) {
            error_log('Error deleting product variant: ' . $th->getMessage());
            return false;
        }
    }

    public function getAllVariants()
    {
        $result = [];
        try {
            $sql = "SELECT variant_id, product_id, size, color, status FROM $this->table";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $query_result = $stmt->get_result();
            $result = $query_result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Error fetching all product variants: ' . $th->getMessage());
        }
        return $result;
    }


    public function getProductDetails($productId)
    {
        $result = [];
        try {
            $sql = "SELECT 
                    pvo.product_variant_option_id, 
                    pvo.product_variant_name, 
                    pv.variant_id, 
                    pv.size, 
                    pv.color, 
                    pv.status AS variant_status,
                    pvc.sku_id, 
                    sk.sku, 
                    sk.price
                FROM 
                    product_variant_option_combinations pvc
                JOIN 
                    product_variant_options pvo ON pvc.product_variant_option_id = pvo.product_variant_option_id
                JOIN 
                    product_variants pv ON pvo.variant_id = pv.variant_id
                JOIN 
                    skus sk ON pvc.sku_id = sk.sku_id
                WHERE 
                    pvc.product_id = ?"; // Thêm dấu chấm hỏi (?) làm tham số chuẩn bị

            // Kết nối và chuẩn bị câu lệnh
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Gán tham số cho câu truy vấn
            $stmt->bind_param('i', $productId); // Sử dụng 'i' cho kiểu dữ liệu số nguyên

            // Thực thi câu truy vấn và lấy kết quả
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy chi tiết sản phẩm: ' . $th->getMessage());
        }

        return $result;
    }
    public function getProductVariants($productId)
{
    global $mysqli;

    // Truy vấn lấy tất cả các biến thể của sản phẩm
    $stmt = $mysqli->prepare("SELECT * FROM product_variants WHERE product_id = ?");
    $stmt->bind_param("i", $productId);  // Ràng buộc tham số là integer
    $stmt->execute();
    $result = $stmt->get_result();

    $variants = [];
    while ($row = $result->fetch_assoc()) {
        $variants[] = $row;  // Thêm mỗi biến thể vào mảng
    }

    $stmt->close();
    return $variants;
}

}
