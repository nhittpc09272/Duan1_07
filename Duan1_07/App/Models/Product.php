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

    public function getAllProductByCategory(int $categoryId)
    {
        $result = [];
        try {
            // Câu lệnh SQL
            $sql = "SELECT * FROM products WHERE category_id = ?";

            // Kết nối tới database và chuẩn bị truy vấn
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                throw new \Exception("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
            }

            // Gán tham số và thực thi câu lệnh
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            // Đóng câu lệnh
            $stmt->close();
        } catch (\Throwable $th) {
            // Ghi log lỗi
            error_log('Lỗi khi lấy sản phẩm theo danh mục: ' . $th->getMessage());
        }

        return $result; // Trả về danh sách sản phẩm
    }

    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name FROM products INNER JOIN categories ON products.category_id=categories.id\n" . "GROUP BY products.category_id;";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    public function searchProductsByName($query)
    {
        $result = [];
        try {
            // Câu truy vấn tìm kiếm sản phẩm theo tên
            $sql = "SELECT * FROM products WHERE product_name LIKE ?";

            // Kết nối tới cơ sở dữ liệu
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                throw new \Exception("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
            }

            // Gán tham số vào truy vấn
            $searchTerm = "%{$query}%"; // Tìm kiếm với ký tự %
            $stmt->bind_param('s', $searchTerm);
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            // Đóng câu lệnh
            $stmt->close();
        } catch (\Throwable $th) {
            // Ghi log lỗi
            error_log('Lỗi khi tìm kiếm sản phẩm: ' . $th->getMessage());
        }

        return $result; // Trả về danh sách sản phẩm tìm thấy
    }

    public function getOneProduct($id)
    {
        $id = (int) $id; // Ép kiểu trước khi gọi getOne()
        return $this->getOne($id);
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
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    // Phương thức mới để lấy chi tiết sản phẩm
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
                        pvc.product_id = :productId";

            // Kết nối và chuẩn bị câu lệnh
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            // Gán tham số
            $stmt->bind_param(':productId', $productId);

            // Thực thi truy vấn và trả về kết quả
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi lấy chi tiết sản phẩm: ' . $th->getMessage());
        }

        return $result;
    }

    // public function getVariantById($variantId)
    // {
    //     $result = null;
    //     try {
    //         // Update to use the correct table for variant_id (product_variants)
    //         $sql = "SELECT variant_id, size, color, status FROM product_variants WHERE variant_id = ?";
    //         $conn = $this->_conn->MySQLi();
    //         $stmt = $conn->prepare($sql);
    //         $stmt->bind_param("i", $variantId);
    //         $stmt->execute();
    //         $query_result = $stmt->get_result();
    //         $result = $query_result->fetch_assoc();
    //     } catch (\Throwable $th) {
    //         error_log('Error fetching product variant by ID: ' . $th->getMessage());
    //     }
    //     return $result;
    // }
    public function getVariantById($variant_id)
    {
        $result = null;
        try {
            $sql = "SELECT variant_id, color, size, price, discount_price, status FROM product_variants WHERE variant_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $variant_id);  // Assuming variant_id is an integer
            $stmt->execute();
            $query_result = $stmt->get_result();
            $result = $query_result->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Error fetching variant details: ' . $th->getMessage());
        }
        return $result;
    }
    
}
