<!-- 建構子寫法 -->
<?php
    class Rectangle{
        var $width;
        var $height;
        // 建構子建立
        public function __construct($width,$height){
            $this->width = $width;
            $this->height = $height;
        }
        public function getArea(){
            return $this->width * $this->height;
        }
        public function getwidth(){
            return $this->width;
        }
        public function getHeight(){
            return $this->height;
        }
    }

    $rect1 = new Rectangle(10,20);
    $rect2 = new Rectangle(30,40);
    $rect3 = new Rectangle(50,60);

    echo $rect1->getArea() . "<br>";
    echo $rect2->getArea() . "<br>";
    echo $rect3->getArea() . "<br>";
?>