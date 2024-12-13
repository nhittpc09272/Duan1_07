<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllOrders()
    {
        return $this->getAll();
    }
    public function getOneOrders($id)
    {
        return $this->getOne($id);
    }

    public function createOrders($data)
    {
        return $this->create($data);
    }
    public function updateOrders($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOrders($id)
    {
        return $this->delete($id);
    }
    public function getAllOrdersByStatus()
    {
        return $this->getAllByStatus();
    }

    // public function getOneOrdersByName($name){
    //     return $this->getOneByName($name);
    // }

    public function countTotalOrders()
    {
        return $this->countTotal();
    }


    public function createOrderDetail(array $data)
    {
        // $sql ="INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')";

        // $result = $this->_conn->connect()->query($sql);
        // return $result;
        // var_dump($data);
        // echo "hai";
        // die();
        try {
            $sql = "INSERT INTO `order_details` (";
            foreach ($data as $key => $value) {
                $sql .= "$key, ";
            }
            // INSERT INTO $this->table (name, description, status, 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status
            $sql .=   " ) VALUES (";
            // INSERT INTO $this->table (name, description, status) VALUES (
            foreach ($data as $key => $value) {
                $sql .= "'$value', ";
            }

            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1', 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1'

            $sql .= ")";
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function getOrder()
    {
        try {
            $sql = "SELECT * FROM `orders` ORDER BY `id` DESC limit 1;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
        }
    }


    public static function getApiOrder($id)
    {
        $curl = curl_init();
        // $arrayApiCheck = $_SESSION['idcheckorder'];
        $responses = [];

        foreach ($id as $item) {
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/v2/" . $item,  // Thêm id vào URL
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
                ),
            ));

            $response = curl_exec($curl);  // Thực thi cURL
            $responses[] = json_decode($response, true);  // Lưu kết quả vào mảng
        }

        curl_close($curl);
        // Trả về toàn bộ kết quả
        return $responses;
    }

    public function getOrderByUser($id)
    {
        $result = [];
        try {
            $sql = "   SELECT * FROM `orders` WHERE orders.user_id = $id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOrderByIdTracking($id)
    {
        $result = [];
        try {
            $sql = "   SELECT * FROM `orders` WHERE orders.tracking_id = $id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getApiTransport(array $data)
    {
        $data = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 1",
            "province" => $data[0]['province'],
            "district" => $data[0]['district'],
            "address" => $data[0]['address'],
            "weight" => 1000,
            "transport" => "fly",
            "deliver_option" => "xteam",
            "tags"  => [1, 7]
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: BZwk0Qw9eflakBLJCWexEZYrq6zLMLcxMuVcQu",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function getAddressAll()
    {
        try {
            $sql = "SELECT * FROM `address` ORDER BY `id` DESC limit 1;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
        }
    }

}
