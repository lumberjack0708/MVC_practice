<?php
// 計算圓形面積要用到的function
class Circle{
    private $radius;
    public function __construct($radius){
        $this->radius = $radius;
    }
    public function getArea(){
        $response['status'] = 200;
        $response['message'] = '成功';
        $response['result'] = $this->radius * $this->radius * 3.14;
        return $response;
    }
}
?>