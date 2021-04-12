<?php

session_start();
error_reporting(0);
if(!isset($_SESSION["access"]) && $_SESSION["access"] !== true)
{
    header("location: ../index.php");
    exit();
}