<?php
    class Rectangle{
        var $width;
        var $height;
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

    $rect1 = new Rectangle();
    $rect1->width = 10;
    $rect1->height = 20;

    $rect2 = new Rectangle();
    $rect2->width = 30;
    $rect2->height = 40;

    $rect3 = new Rectangle();
    $rect3->width = 50;
    $rect3->height = 60;

    $rect4 = new Rectangle(70,80);

    echo $rect1->getArea() . "<br>";
    echo $rect2->getArea() . "<br>";
    echo $rect3->getArea() . "<br>";
    echo $rect4->getArea() . "<br>";
?>