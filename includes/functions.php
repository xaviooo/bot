<?php

function redirect($location){
  header("Location:" . $location);
  exit;
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));

    }
    function escape_string($string) {
      global $connection;
      return mysqli_real_escape_string($connection, trim($string));
  
      }

 function query($query){
      global $connection;
      $result = mysqli_query($connection, $query);
      confirmQuery($result);
      return $result;
  }
 
function confirmQuery($result) {
        global $connection;
        if(!$result ) {
         die("QUERY FAILED ." . mysqli_error($connection));   
          }
    }

function confirm($result) {
  global $connection;
  if(!$result ) {
    die("QUERY FAILED ." . mysqli_error($connection));   
    }
}

  
function fetch_array($result){
  return mysqli_fetch_array($result);
  }
  

  function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function count_records($result){
    return mysqli_num_rows($result);
}
  
function count_result($result){
  return mysqli_num_rows($result);
  }

function get_user_name(){
return isset($_SESSION['username']) ? $_SESSION['username'] : null;
  }
  
function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }
   return false;
}

function is_member() {
  if(isLoggedIn()){
      $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
      $row = fetch_result($result);
      if($row['user_role'] == 'member'){
          return true;
      }else {
          return false;
      }
  }
  return false;
}


function is_admin() {
  if(isLoggedIn()){
      $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
      $row = fetch_array($result);
      if($row['user_role'] == 'admin'){
          return true;
      }else {
          return false;
      }
  }
  return false;
}

function loggedInUserId(){
  if(isLoggedIn()){
      $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] ."'");
      confirmQuery($result);
      $user = mysqli_fetch_array($result);
     return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
  }
  return false;
}


function set_message($msg){
  if(!empty($msg)) {
  $_SESSION['message'] = $msg;
  } else {
  $msg = ""; 
 }
}


function display_message() {
      if(isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      }
  }


  function last_id(){

    global $connection;
    
    return mysqli_insert_id($connection);
    
    
    }








  ?>
