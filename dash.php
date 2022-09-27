<?php
include "bootstrap/init.php";

// check if user is loggged in
if(!isLoggedIn()){
    header("location: ". BASE_URL . "auth.php");

}



if(isset($_POST['updatepass']))
{
    if(password_verify(sanitizeData($_POST['oldpass']),getUserData($_SESSION['loginuser'])->password)    ){
        if(sanitizedata($_POST['newpass']) !== sanitizedata($_POST['oldpass'])){
           
            updatePassword(sanitizedata($_POST['newpass']));
            $message = 'رمز شما با موفقیت تغییر یافت!';
            $stat = 1;


        }else{
            $message = 'پسورد جدید باید متفاوت باشد!';
            $stat = 0;
        }
    }else{
        $message = 'گذرواژه فعلی اشتباه است.';
        $stat = 0;
    }
}


if(isset($_POST['updatename']))
{
    if(sanitizedata($_POST['newname']) !== getUserData($_SESSION['loginuser'])->name){
           
            updateName(sanitizedata($_POST['newname']));
            $message = 'نام شما با موفقیت تغییر یافت!';
            $stat = 1;

    }else{
        $message = 'نام جدید باید متفاوت باشد!';
        $stat = 0;
    }
}

$registereddate = verta(substr(getUserData($_SESSION['loginuser'])->created_at,0,10));
$difftime = strtotime(verta()) - strtotime($registereddate);
$dayswithus = abs(round($difftime / 86400));


//print_r($dayswithus);
//print_r($reg);

include "tpl/tpl-dash.php";