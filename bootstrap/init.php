<?php

include "constants.php";
include BASE_PATH. "bootstrap/config.php";
include BASE_PATH. "libs/helpers.php";
include BASE_PATH. "libs/functions.php";
include BASE_PATH. "vendor/autoload.php";

// iclude ..
// include ... 

$dsn = "mysql:dbname=$database_config->db;host=$database_config->host;charset=utf8mb4";
try {
    $conn = new PDO($dsn, $database_config->user, $database_config->pass);
} catch (PDOException $th) {
    diePage('connection failed'. $th->getMessage());
    
}

//echo ' successful!';


