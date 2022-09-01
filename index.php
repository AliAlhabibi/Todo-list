<?php
include "bootstrap/init.php";


// if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
//     $deletedcount = deleteFolder($_GET['delete_folder']);
//     //echo $deletedcount."folder deleted!";
// }
if(isset($_GET['logout'])){
    logout();
}

if(!isLoggedIn()){
    header("location: ". BASE_URL . "auth.php");
}

$folders= getFolders();
$tasks = getTasks();

//  echo "<pre>";
//  print_r($tasks);
//  echo "</pre>";


include "tpl/tpl-index.php";

