<?php
spl_autoload_register('route_controller');
if(isset($_POST['addTrigger']) == true) { 
    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'uname' => $_POST['uname'],
        'pass' => $_POST['pass']
    ];
    $callback = new Add_Controller();
    $callback->adduser($data);
}

if(isset($_POST['actTrigger']) == true) { 
    $callback = new Add_Controller();
    $callback->activateuser($_POST['id']);
}

if(isset($_POST['deactTrigger']) == true) { 
    $callback = new Add_Controller();
    $callback->deactivateuser($_POST['id']);
}

if(isset($_POST['removeTrigger']) == true) { 
    $callback = new Add_Controller();
    $callback->removeuser($_POST['id']);
}

if(isset($_POST['modifyTrigger']) == true) { 
    $callback = new Add_Controller();
    $callback->selectionmodify($_POST['id']);
}

if(isset($_POST['updateTrigger']) == true) { 
    $data = [
        "fname" => $_POST['fname'],
        "lname" => $_POST['lname'],
        "uname" => $_POST['uname'],
        "pass" => $_POST['pass'],
        "id" => $_POST['id']
    ];
    $callback = new Add_Controller();
    $callback->finalupdate($data);
}

function route_controller() { 
    include_once "../Controllers/adduserController.php";
}

