<?php
    class Router{
        private $routeTable;
        public function __construct(){
            $this->routeTable = array();
        }
        public function register($action, $class, $method){
            // 創建一個包含類別和方法的關聯陣列
            $arr['class'] = $class;
            $arr['method'] = $method;
            // 在路由表中註冊對應的操作、類別和方法
            $this->routeTable[$action] = $arr;
        }
        public function run($action){
            $class = $this->routeTable[$action]['class'];
            $method = $this->routeTable[$action]['method'];
            require_once "./Controllers/" . $class . ".php";
            $controller = new $class();
            $response = $controller->$method();
            return $response;
        }
    }
?>