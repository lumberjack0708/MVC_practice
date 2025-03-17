<?php
require_once "./mysql.php";
class Product
{
    public function getProducts(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['pid'])) {
                $pid = $_POST['pid'];
                $sql = "SELECT * FROM `product` WHERE `pid`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($pid));
            } else {
                $sql = "SELECT * FROM `product`";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
            }
            if ($result) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $this->response(200, "查詢成功", $rows);
            } else {
                return $this->response(400, "SQL錯誤");
            }
        }
        return ($response);
    }
    
    public function newProduct(){
        $p_name = $_POST['p_name'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `product` (`p_name`, `cost`, `price`, `stock`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($p_name, $cost, $price, $stock));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count<1) ? $this->response(204, "新增失敗") : 
                $this->response(200, "新增成功");
            } else {
                return $this->response(400, "SQL錯誤");
            }
        }
        return ($response);
    }
    
    public function removeProduct(){
        $pid = $_POST['pid'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `product` WHERE pid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($pid));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count<1) ? $this->response(204, "刪除失敗") : 
                $this->response(200, "刪除成功");
            } else {
                return $this->response(400, "SQL錯誤");
            }
        }
        return ($response);
    }
    
    public function updateProduct(){
        $pid = $_POST['pid'];
        $p_name = $_POST['p_name'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `product` SET `p_name`=?, `cost`=?, `price`=?, `stock`=? WHERE pid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($p_name, $cost, $price, $stock, $pid));
            if ($result) {
                $count = $stmt->rowCount();
                return ($count<1) ? $this->response(204, "更新失敗") : 
                $this->response(200, "更新成功");
            } else {
                return $this->response(400, "SQL錯誤");
            }
        }
        return ($response);
    }
    
    // 每一個controller執行結束之後，強制執行標準化輸出
    private function response($status, $message, $result=NULL){
        $resp['status'] = $status;
        $resp['message'] = $message;
        $resp['result'] = $result;
        return $resp;
    }
}
?>