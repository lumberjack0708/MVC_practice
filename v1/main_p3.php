<?php
    // 要記得匯入
    require_once("./Rectangle.php");
    require_once("./Circle.php");

    if (isset($_GET['action'])) 
        $action = $_GET['action'];
    else
        $action = "_no_action";
    // $action = isset($_GET['action']) ? $_GET['action'] : "_no_action";

    switch ($action) {
        case 'GetAllArea':
            require_once "Controller.php";
            $controller = new Controller();
            $response = $controller->GetAllArea();
            break;
        default:
            $response['status'] = 404; 
            $response['message'] = "action not found";
            break;
    }
    echo json_encode($response);

?>