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
            echo 'نام پوشه باید حداقل 3 کاراکتر باشد.';
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
            echo 'نام فعالیت باید حداقل 3 کاراکتر باشد.';
            die();
        }
         break;

    case "logincheck":
        if(isset($_POST['lusername']) && !empty($_POST['lusername']) && isset($_POST['lpassword']) && !empty($_POST['lpassword']) ){
        //echo checkLogin($username,$lpassword) ? true : false;
        echo true;
        }
        break;

    case "register":
            if(isset($_POST['rusername']) && !empty($_POST['rusername']) && isset($_POST['rpassword']) && !empty($_POST['rpassword']) && isset($_POST['remail']) && !empty($_POST['remail']) ){

                register($_POST['rusername'],$_POST['remail'],$_POST['rpassword']);
                echo 1;
            }
            break;    
    case "toggletask":
                toggleTask($_POST['taskid']);
                //echo 'successful!';
                break;
    default:
        diePage('invalid action');
}


//print_r($_SERVER);
