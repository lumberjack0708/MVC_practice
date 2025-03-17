<?php
require_once './Router.php';

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "no_action";

$router = new Router();
$router->register(action: 'getUsers', class: 'Employee', method: 'getUsers');
$router->register(action: 'newUser', class: 'Employee', method: 'newUser');
$router->register(action: 'removeUser', class: 'Employee', method: 'removeUser');
$router->register(action: 'updateUser', class: 'Employee', method: 'updateUser');

$response = $router->run($action);

echo json_encode($response);

?>