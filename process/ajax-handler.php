<?php
include_once "../bootstrap/init.php";

// checks if request to this page is AJAX. (if user opens page directly an error is displayed)
if (!isAjaxRequest()) {
    diePage('invalid request');
}

// checks if action is empty or not set 
if (!isset($_POST['action']) || empty($_POST['action'])) {
    diePage('invalid action');
}


switch ($_POST['action']) {
    case "addfolder":
        if(isset($_POST['foldername']) && mb_strlen($_POST['foldername']) > 2){
        addFolder($_POST['foldername']);
        echo 1;
        }else{
            echo 'نام پوشه باید حداقل 3 کاراکتر باشد';
            die();
        }
        break;

    case "deletewithpost":
        deleteFolder($_POST['folderid']);
        echo 'successful!';
        break;

    case "addtask":
        if(isset($_POST['taskname']) && mb_strlen($_POST['taskname']) > 2){
            
            addTask($_POST['taskname'],$_POST['taskdesc'],$_POST['taskfolder'],$_POST['taskdeadline'],$_POST['isimportant']);
            echo 1;    
        }
        else
        {
            echo 'نام پوشه باید حداقل 3 کاراکتر باشد';
            die();
        }
         break;
    default:
        diePage('invalid action');
}


//print_r($_SERVER);
