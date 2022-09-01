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

function getFolders(){
    global $conn;
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "select * from folders where user_id=$current_user_id";
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

function getTasks(){
    global $conn;
    $current_user_id = getUserData($_SESSION['loginuser'])->id;
    $sql = "select * from tasks where user_id=$current_user_id";
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
