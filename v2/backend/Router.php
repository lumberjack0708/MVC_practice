<?php
class Router{
    private $routeTable;
    public function __construct(){
        $this->routeTable = array();
    }

    // 登錄每個action所對應的 class及其method
    public function resign($action, $class, $method){
        $arr['class'] = $class;
        $arr['method'] = $method;
        $this->routeTable[$action] = $arr;
    }

    // 根據action值，執行對應的class及其method
    public function run($action){
        $class = $this->routeTable[$action]['class'];
        $method = $this->routeTable[$action]['method'];
        require_once("./$class.php");
        $controller = new $class();
        $response = $controller->$method();
        return $response;
    }
}

?>