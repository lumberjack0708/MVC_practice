<?php
   class Rectangle {
        // 一般屬性不用被public存取
        private $width;
        private $height;
 
        // 建構子建立
        // 函式通常為public
        public function __construct($width, $height) {
            $this->width = $width;
            $this->height = $height;
        }

        public function getArea() {
            $response['status'] = 200;
            $response['message'] = '成功';
            $response['result'] = $this->width * $this->height;
            return $response;

        }

        public function getWidth() {
            return $this->width;
        }

        public function getHeight() {
            return $this->height;
        }
    }
?>