<?php
spl_autoload_register('route_controller');
// register
if(isset($_POST['trigger']) == true)
{
    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'uname' => $_POST['uname'],
        'pass' => $_POST['pass']
    ];
    $callback = new Controller();
    $callback->create($data);
}
// sign in
if(isset($_POST['signtrigger']) == true) { 
    $datasignin = [
        'sign1' => $_POST['sign1'],
        'sign2' => $_POST['sign2']
    ];
    $callback = new Controller();
    $callback->signindata($datasignin);
}

function route_controller() {
    include_once "../Controllers/registerController.php";
}