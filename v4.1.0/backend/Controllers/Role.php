<?php
require_once "./mysql.php";
class Role
{
    public function getRoles(){
        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            if (isset($_POST['role_id'])) {
                $role_id = $_POST['role_id'];
                $sql = "SELECT * FROM `role` WHERE `role_id`=?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute(array($role_id));
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
    
    public function getRole(){
        // 與 getRoles 共用邏輯，只是會特別傳入 role_id
        return $this->getRoles();
    }
    
    public function newRole(){
        $role_name = $_POST['role_name'];
        
        // 檢查必填欄位
        if(empty($role_name)) {
            return $this->response(400, "角色名稱不可為空");
        }

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            // created_at 會由 MySQL 的 DEFAULT 值自動設定為當前時間
            $sql = "INSERT INTO `role` (`role_name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($role_name));
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
        $role_id = $_POST['role_id'];

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            $sql = "DELETE FROM `role` WHERE role_id=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($role_id));
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
        $role_id = $_POST['role_id'];
        $role_name = $_POST['role_name'];
        
        // 檢查必填欄位
        if(empty($role_name)) {
            return $this->response(400, "角色名稱不可為空");
        }

        $response = openDB();
        if ($response['status'] == 200) {
            $conn = $response['result'];
            // 只更新 role_name，不更新 created_at
            $sql = "UPDATE `role` SET `role_name`=? WHERE role_id=?";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute(array($role_name, $role_id));
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