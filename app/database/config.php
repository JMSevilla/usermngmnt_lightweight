<?php

define("myserver", "localhost");
define("myusername", "root");
define("mypassword", "");
define("mydb", "dbusermanage");

try {
    $pdo = new PDO("mysql:host=" . myserver . ";dbname=" . mydb , myusername, mypassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Could not connect to the database" . $exception->getMessage());
}