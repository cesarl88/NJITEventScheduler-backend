<?php

/**
 * Cesar Salazar
 * This file returns the user ID and RoleID that matches the credentials sent 
 */

include_once 'EntityModel.php';

  $username = $_POST['userName'];
  $Password = $_POST['Password'];
  
  #echo $Password;
  $db = new DBContext();
  $user = $db->find(new User(),array('UserName' => $username, 'Password' => hash("sha256",$Password)));
  
  if($user)
 	echo json_encode(array('UserID' => $user->UserID, 'Role'=>$user->Role));
  else
  	echo json_encode(array('UserID' => "-1", 'Roles'=> "-1"));
  
  /* $user = new User($username,$Password);
  
  $DatabaseConnection = new DataBaseConnection();
  
  $result = $DatabaseConnection->checkLogin($user);
  echo $result;
  
  $DatabaseConnection->disconnect(); */

?>
