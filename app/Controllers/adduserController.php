<?php 

class Add_Controller { 
    public function adduser($data) {
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $sproc = "CALL sproc_register(:fname, :lname, :uname, :pass, 0, 0)";
            if($stmt = $pdo->prepare($sproc))
            {
                //you can set -> if username exist..
                $stmt->bindParam(":fname", $data['fname'], PDO::PARAM_STR);
                $stmt->bindParam(":lname", $data['lname'], PDO::PARAM_STR);
                $stmt->bindParam(":uname", $data['uname'], PDO::PARAM_STR);
                $stmt->bindParam(":pass", $genpass, PDO::PARAM_STR);
                $genpass = password_hash($data['pass'], PASSWORD_DEFAULT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    public function activateuser($id) { 
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $activateQuery = "update tbusers set isactive = 1 where id=:id";
            if($stmt = $pdo->prepare($activateQuery)) { 
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    public function deactivateuser($id) { 
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $deactivateQuery = "update tbusers set isactive = 0 where id=:id";
            if($stmt = $pdo->prepare($deactivateQuery)) { 
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    public function removeuser($id) { 
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if($stmt = $pdo->prepare("delete from tbusers where id=:id")) { 
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));

                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    public function selectionmodify($id) { 
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectQuery = "select * from tbusers where id=:id";
            if($stmt = $pdo->prepare($selectQuery)) { 
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                if($stmt->rowCount() > 0) { 
                    if($row = $stmt->fetch()) { 
                        echo json_encode(array(
                            "fname" => $row['firstname'],
                            "lname" => $row['lastname'],
                            "uname" => $row['username']
                        ));
                    }
                    unset($stmt);
                    unset($pdo);
                }
            }
        }
    }
    public function finalupdate($data) { 
        require_once "../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $updateQuery = "update tbusers set firstname=:fname, lastname=:lname, username=:uname where id=:id";
            if($stmt = $pdo->prepare($updateQuery)) { 
                $stmt->bindParam(":fname", $data['fname'], PDO::PARAM_STR);
                $stmt->bindParam(":lname", $data['lname'], PDO::PARAM_STR);
                $stmt->bindParam(":uname", $data['uname'], PDO::PARAM_STR);
                $stmt->bindParam(":id", $data['id'], PDO::PARAM_INT);
                if($stmt->execute()) { 
                    echo json_encode(array("statusCode" => 200));
                }
            }
        }
    }
}