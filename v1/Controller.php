<?php
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

        $rect1 = new Rectangle($w1,$h1);
        $rect2 = new Rectangle($w2,$h2);
        $circle = new Circle($radius);

        $response1 = $rect1->getArea();
        $response2 = $rect2->getArea();
        $response3 = $circle->getArea();

        $area[0] = $response1['result'];
        $area[1] = $response2['result'];
        $area[2] = $response3['result'];

        $response['status'] = 200; //OK
        $response['message'] = "成功";
        $response['result'] = $area;
        return $response;
    }


}
?>