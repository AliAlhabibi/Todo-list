<?php
include "bootstrap/init.php";
if(isset($_GET['logout'])){
    logout();
}

// check if user is loggged in
if(!isLoggedIn()){
    header("location: ". BASE_URL . "auth.php");

}

$folders= getFolders('A');
$tasks = getTasks('important');

$pagetitle = "مهم";

include 'tpl/tpl-index.php';