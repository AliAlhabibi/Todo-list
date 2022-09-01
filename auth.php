<?php 
include "bootstrap/init.php";
    
if(isset($_POST['register']))
{
    if(!isEmailRegistered(sanitizeData($_POST['remail']))){
    register(sanitizeData($_POST['rusername']),sanitizeData($_POST['remail']),sanitizeData($_POST['rpassword']));
    $message = 'ثبت نام با موفقیت انجام شد.';
    }else{
        $message = 'شما قبلا با این ایمیل ثبت نام کرده اید! ';
    }
}

if(isset($_POST['login']))
{
    if(!is_null($user = getUserData(sanitizeData($_POST['lemail'])))){
        if(password_verify(sanitizeData($_POST['lpassword']),$user->password)){
           $_SESSION["loginuser"] = $user->email;
           header('location:'.BASE_URL);
            //pri nt_r($_SESSION);
            //$lmessage = 'وارد شدی';
        }else{
            $lmessage = 'ایمیل و پسورد مطابقت ندارد.';
        }
    }else{
        $lmessage = 'کاربر موردنظر یافت نشد. لطفا ابتدا ثبت نام کنید!';
    }
}




//print_r($_POST);

include "tpl/tpl-auth.php";

