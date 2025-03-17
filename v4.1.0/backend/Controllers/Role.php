<?php
require_once "./mysql.php";
class Role
{
    public function getRoles(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['rid'])) {
                $rid = $_POST['rid'];
                $sql = "SELECT * FROM `role` WHERE `rid`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($rid));
            } else {
                $sql = "SELECT * FROM `role`";
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
    
    public function newRole(){
        $r_name = $_POST['r_name'];
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "INSERT INTO `role` (`r_name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($r_name));
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
    
    public function removeRole(){
        $rid = $_POST['rid'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `role` WHERE rid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($rid));
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
    
    public function updateRole(){
        $rid = $_POST['rid'];
        $r_name = $_POST['r_name'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "UPDATE `role` SET `r_name`=? WHERE rid=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($r_name, $rid));
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