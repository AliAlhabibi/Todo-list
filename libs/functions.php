<?php
// prevent this page from being opened directly by the user 

// if(defined("BASE_PATH")){
//     header('Location:/');
//     exit();
//  }
defined("BASE_PATH") OR die("Permision Denied!");


function getCurrentUserId(){
    //get logged in user id 
    return 1;
}


function deleteFolder($folder_id){
    global $conn;
    $sql = "delete from folders where id=$folder_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();

}


function getFolders(){
    global $conn;
    $current_user_id = getCurrentUserId();
    $sql = "select * from folders where user_id=$current_user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}

function addFolder($foldername){
    global $conn;
    $current_user_id = getCurrentUserId();
    $sql = "insert into folders (name,user_id) values (:folder_name,:user_id);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':folder_name'=>$foldername,':user_id'=>$current_user_id]);
    return $stmt->fetchAll(pdo::FETCH_OBJ);

}

function getTasks(){
    global $conn;
    $current_user_id = getCurrentUserId();
    $sql = "select * from tasks where user_id=$current_user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}

function addTask($name,$desc,$folder,$deadline,$isimportant){
    global $conn;
    $current_user_id = getCurrentUserId();
    $sql = "insert into tasks (title,description,user_id,folder_id,deadline,isimportant) values (:title,:description,:user_id,:folder_id,:deadline,:isimportant);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':title'=>$name,':description'=>$desc,':user_id'=>$current_user_id,':folder_id'=>$folder,':deadline'=>$deadline,':isimportant'=>$isimportant]);
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}