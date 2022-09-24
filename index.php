<?php
include "bootstrap/init.php";


// if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
//     $deletedcount = deleteFolder($_GET['delete_folder']);
//     //echo $deletedcount."folder deleted!";
// }
if(isset($_GET['logout'])){
    logout();
}

// check if user is loggged in
if(!isLoggedIn()){
    header("location: ". BASE_URL . "auth.php");

}
// redirect to today page everytime when page is opened 
if($_SERVER['REQUEST_URI'] ==  "/taskmanager-project/"){
header("location: ". goUrl("?today"));
}



$folders= getFolders();
$tasks = getTasks();

//  echo "<pre>";
// print_r($_SERVER);
//  echo "</pre>";
//echo verta();
echo verta()->formatJalaliDatetime();
echo '<br>';
date('m/d/Y h:i:s');

include "tpl/tpl-index.php";




