<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
define("DOMAIN", "localhost");
define("USERNAME", "root");
define("PWD", "");
define("DATABASE", "recipe_treasures");


$conn = new mysqli(DOMAIN, USERNAME, PWD, DATABASE);
echo "successful connection";

$conn->set_charset("utf8mb4");
} catch(Exception $e){
    error_log($e->getMessage());
    var_dump($e);
    exit("Error connecting to db");
}
?>
