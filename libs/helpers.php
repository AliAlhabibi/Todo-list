<?php
// a function for customized die message
function diePage($msg){
    echo "<div style='color:red; width:80%; padding:30px; margin:50px auto; background:#ffc; text-align:center; font-size:30px;'>$msg</div>";
    die();
}

function isAjaxRequest(){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }
    return false;
}

function goUrl($addr){
    return 'http://localhost/taskmanager-project/'. $addr;

}
function getDayOrNight(){
        date_default_timezone_set('Asia/Tehran');
         date_default_timezone_get();
            if(date_default_timezone_get() > 18 || date_default_timezone_get() < 6)
            {
                return 'شب';

            }else{
                return 'روز';
            }
}