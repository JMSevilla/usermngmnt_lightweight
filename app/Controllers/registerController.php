<?php

class Controller { 
    public function create($data) {
        require_once "../database/config.php";
        $sproc = "CALL sproc_register(:fname, :lname, :uname, :pass, :ptype, :p_active)";
        $check_username = "select username from tbusers where username=:checkname";
        $istypeQuery = "select istype from tbusers where istype = 1;"; //uncomment this if you want to use.
        //create query if istype = 1 already exist
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if($result = $pdo->query($istypeQuery)) { // select query to identify if istype = 1 already exist.
                if($result->rowCount() > 0) { //count greater than to 0 based on select query.
                    if($stmt = $pdo->prepare($check_username))
             {
                $stmt->bindParam(":checkname", $data['uname'], PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0) { 
                    echo json_encode(array("statusCode" => 201)); //exist username
                }
                else { 
                    if($statement = $pdo->prepare($sproc)){
                $statement->bindParam(":fname", $data['fname'], PDO::PARAM_STR);
                $statement->bindParam(":lname", $data['lname'], PDO::PARAM_STR);
                $statement->bindParam(":uname", $data['uname'], PDO::PARAM_STR);
                $statement->bindParam(":pass", $passch, PDO::PARAM_STR);
                $statement->bindParam(":ptype", $istypechar, PDO::PARAM_STR);
                $statement->bindParam(":p_active", $active, PDO::PARAM_STR);
                $istypechar = "0";
                $active = "0";
                $passch = password_hash($data['pass'], PASSWORD_DEFAULT);
                
                if($statement->execute()){
                    
                    echo json_encode(array("statusCode" => 200));
                }
                unset($statement);
                unset($pdo);
                    }
                }
            }
                }
                else { 
            if($stmt = $pdo->prepare($check_username))
             {
                $stmt->bindParam(":checkname", $data['uname'], PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0) { 
                    echo json_encode(array("statusCode" => 201)); //exist username
                }
                else { 
                    if($statement = $pdo->prepare($sproc)){
                $statement->bindParam(":fname", $data['fname'], PDO::PARAM_STR);
                $statement->bindParam(":lname", $data['lname'], PDO::PARAM_STR);
                $statement->bindParam(":uname", $data['uname'], PDO::PARAM_STR);
                $statement->bindParam(":pass", $passch, PDO::PARAM_STR);
                $statement->bindParam(":ptype", $istypechar, PDO::PARAM_STR);
                $statement->bindParam(":p_active", $active, PDO::PARAM_STR);
                $istypechar = "1";
                $active = "1";
                $passch = password_hash($data['pass'], PASSWORD_DEFAULT);
                
                if($statement->execute()){
                    
                    echo json_encode(array("statusCode" => 200));
                }
                unset($statement);
                unset($pdo);
                    }
                }
            }
                }
            }
        }
    }
    public function signindata($datasignin) { 
        require_once "../database/config.php";
        $queryselect = "select * from tbusers where username=:username";
     
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $normalpass = $datasignin["sign2"];
            if($stmt = $pdo->prepare($queryselect)) { 
                $stmt->bindParam(":username", $datasignin["sign1"], PDO::PARAM_STR);
                $stmt->execute();
                if($stmt->rowCount() > 0) { 
                    if($row = $stmt->fetch()) { 
                        $id = $row['username'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $istype = $row['istype'];
                        $isactive = $row['isactive'];
                        $hashed = $row['password'];
                        if(password_verify($normalpass, $hashed)) { 
                            if($isactive == 1) { 
                                if($istype == 1) { 
                                    session_start();
                                    $_SESSION["access"] = true;
                                    $_SESSION["fname"] = $firstname;
                                    $_SESSION["lname"] = $lastname;
                                    $_SESSION["id"] = $id;
                                    echo json_encode(array("statusCode" => 200));
                                }
                                else if($istype == 0) { 
                                    session_start();
                                    $_SESSION["access"] = true;
                                    $_SESSION["fname"] = $firstname;
                                    $_SESSION["lname"] = $lastname;
                                    $_SESSION["id"] = $id;
                                    echo json_encode(array("statusCode" => "user"));
                                }
                            }
                            else { 
                                // disabled account
                                echo json_encode(array("statusCode" => 201));
                            }
                        }
                        else { 
                            // wrong password
                            echo json_encode(array("statusCode" => 202));
                        }
                    }
                }else { 
                    // username not found
                    echo json_encode(array("statusCode" => 203));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}

