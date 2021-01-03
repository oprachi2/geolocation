<?php

$db_host = "localhost:3307";
$db_user = "root";
$db_pass = "popo009@@";
$db_name = "restaurent";
try
{
     $DB_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $exception)
{
     echo $exception->getMessage();
}
include_once 'paging.php';
$paginate = new paginate($DB_con);