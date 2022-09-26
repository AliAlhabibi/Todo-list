<?php
// prevent this page from being opened directly by the user 

// if(defined("BASE_PATH")){
//     header('Location:/');
//     exit();
//  }
defined("BASE_PATH") OR die("Permision Denied!");



function deleteFolder($folder_id){
    global $conn;
    $sql = "delete from folders where id=$folder_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();

}

function getFolders($folder){
    global $conn;
    if(is_numeric($folder)){
        $foldercondition = "AND id=$folder";
    }elseif($folder = 'A'){
        $foldercondition = '';
    }

    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "select * from folders where user_id=$current_user_id $foldercondition";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);

}

function addFolder($foldername){
    global $conn;
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "insert into folders (name,user_id) values (:folder_name,:user_id);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':folder_name'=>$foldername,':user_id'=>$current_user_id]);
    return $stmt->fetchAll(pdo::FETCH_OBJ);

}
// function getActiveFolder(){
//     $folder = $_GET;
//     $arr = ['today','important','done','active'];
//     if(isset($_GET['fid']) && is_numeric($_GET['fid'])){
//         return $_GET['fid'];
        
//     }elseif(array_key_exists($_GET,$arr)){
//         return $_GET;
        
//     }else{
//         return null;
//     }
// }
function getTasks($status){
    global $conn;
    if($status == 'active'){
        $condition = "AND isdone = 0";
    }
    elseif($status == 'important'){
        $condition = "AND isimportant = 1 AND isdone = 0";
    }
    elseif($status == 'done'){
        $condition = "AND isdone = 1";
    }
    elseif($status == 'folder'){
        if(hasAccess($_GET['fid'],'f')){
            $folder = $_GET['fid'];
            $condition = "AND folder_id = $folder";
            
        }else{
        diePage('error: invalid folder');
        }
    }else{
        diePage('error: invalid status');
    }
    
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "select * from tasks where user_id=$current_user_id $condition";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}

function addTask($name,$desc,$folder,$deadline,$isimportant){
    global $conn;
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "insert into tasks (title,description,user_id,folder_id,deadline,isimportant) values (:title,:description,:user_id,:folder_id,:deadline,:isimportant);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':title'=>$name,':description'=>$desc,':user_id'=>$current_user_id,':folder_id'=>$folder,':deadline'=>$deadline,':isimportant'=>$isimportant]);
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}
function toggletask($tid){
    if(hasAccess($tid,'t')){
    global $conn;
    $sql = "update tasks set isdone = 1 - isdone where id=$tid;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);
    die;
    }
    diePage('error');
}

function isLoggedIn(){
    return isset($_SESSION["loginuser"]) ? true : false;
}

function register($username,$email,$password){
    global $conn;
    $passhash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "insert into users (email,name,password) values (:email,:name,:password);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email'=>$email,':name'=>$username,':password'=>$passhash]);
    $records = $stmt->fetchAll(pdo::FETCH_OBJ);
    return $records;

}

function getUserData($email){

    global $conn;
    $sql = "select * from users where email='$email' limit 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
    $record = $stmt->fetchAll(pdo::FETCH_OBJ);
    return $record[0] ?? null;

}


function isEmailRegistered($email) : bool{
    $record = getUserData($email);
    return $record? true : false;
}

function logout(){
    unset($_SESSION['loginuser']);
}
function hasAccess($id,$operation){
    global $conn;
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    if($operation == 't' && isset($id) && is_numeric($id)){
        $sql = "select * from tasks where user_id='$current_user_id' and id = $id limit 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
        $record = $stmt->fetchAll(pdo::FETCH_OBJ);
        return $record? true : false;
        die;
    }
    if($operation == 'f'){
        $sql = "select * from folders where user_id='$current_user_id' and id = $id limit 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
        $record = $stmt->fetchAll(pdo::FETCH_OBJ);
        return $record? true : false;
        die;
    }
}