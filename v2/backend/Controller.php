<?php
// 負責處理請求並協調 Model 和 View 之間的互動（Ex表單提交或 API 請求）
require_once("./Rectangle.php");
require_once("./Circle.php");

class Controller{
    function GetAllArea(){
        // 長方型面積參數接收
        $w1 = $_POST['w1'];
        $h1 = $_POST['h1'];
        $w2 = $_POST['w2'];
        $h2 = $_POST['h2'];
        // 圓形面積參數接收
        $radius = $_POST['radius'];

        // 將參數放入物件計算對應面積
        $rect1 = new Rectangle($w1,$h1);
        $rect2 = new Rectangle($w2,$h2);
        $circle = new Circle($radius);

        // 調用各個物件不同的取面積方法，並放入response物件，準備組裝
        $response_rec1 = $rect1 -> getArea();
        $response_rec2 = $rect2 -> getArea();
        $response_cir = $circle -> getArea();

        // 組裝response物件
        $areas = [];
        $areas[0] = $response_rec1['result'];
        $areas[1] = $response_rec2['result'];
        $areas[2] = $response_cir['result'];

        // 回傳結果
        $response = [
            'status'  => 200,
            'message' => '成功',
            'result'  => $areas,
        ];
        return $response;
    }


}
?>