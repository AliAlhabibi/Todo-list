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
$tasks = getTasks('folder');

$cf = getFolders($_GET['fid']);
$pagetitle = $cf[0]->name;


include 'tpl/tpl-index.php';