<?php
    // 要記得匯入
    require_once("./Rectangle.php");
    require_once("./Circle.php");
    require_once("./Router.php");

    if (isset($_GET['action'])) 
        $action = $_GET['action'];
    else
        $action = "_no_action";

    // 註冊每個action所對應的 class及其method
    $router = new Router();
    // 執行對應的action
    // 參數1：action名稱(來源(`cal/js`))
    // 參數2：class名稱(要去的地方的`Controller`的Class)
    // 參數3：method名稱(去到那個地方的時候要調用的方法(function))
    $router->resign(action: "GetAllArea", class: "Controller", method: "GetAllArea");
    $response = $router->run($action);
    echo json_encode($response);

?>