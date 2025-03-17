<?php
require_once "./mysql.php";
class Supplier
{
    public function getSuppliers(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['sid'])) {
                $sid = $_POST['sid'];
                $sql = "SELECT * FROM `supplier` WHERE `sid`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($sid));
            } else {
                $sql = "SELECT * FROM `supplier`";
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
    
    public function newSupplier(){
        $s_name = $_POST['s_name'];
        $contact = $_POST['contact'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `supplier` (`s_name`, `contact`, `tel`, `address`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($s_name, $contact, $tel, $address));
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
    
    public function removeSupplier(){
        $sid = $_POST['sid'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `supplier` WHERE sid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($sid));
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
    
    public function updateSupplier(){
        $sid = $_POST['sid'];
        $s_name = $_POST['s_name'];
        $contact = $_POST['contact'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `supplier` SET `s_name`=?, `contact`=?, `tel`=?, `address`=? WHERE sid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($s_name, $contact, $tel, $address, $sid));
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