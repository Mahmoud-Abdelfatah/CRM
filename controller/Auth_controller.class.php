<?php

/**
 * 
 */
include_once 'Report_controller.class.php';
class Auth 
{
	
  function index()
  {
    return header('location:view/Auth/login.php');
  }

  function check_login($user_name,$password)
  {
    //$db = new DB();
   // $conn = $db->connect('localhost','root','','morder');
    $data = DB::getInstance()->select('*','users LEFT JOIN roles on users.role_id = roles.id','user_name="'.$user_name.'" and password="'.$password.'"','')
    ;
    // $data = $db->select($conn,'*','users','user_name="'.$user_name.'" and password="'.$password.'"','')
     ;
  
    if ($data) {

            $_SESSION['user_data']=$data;
             return header('location:../view/crm_rep');    	
    }
    else
    {
      return header('location:../view/Auth/login.php?result=wrong_values');
    }
  }



}


if (isset($_POST['login_submit'])) {

	require_once '../core/init.php';
  if (!empty($_POST['user_name'])&& !empty($_POST['password'])) {

      $check_login = new Auth();
      $check_login->check_login($_POST['user_name'],$_POST['password']);   
  }

}

if (isset($_GET['status'])) {
    require_once '../core/init.php';
    if ($_GET['status']=='logout') {
      session_unset();
      session_destroy();
      return header('location:../view/Auth/login.php');
    }else if ($_GET['status']=='monitoring') {
      $monitor = new Auth();
      $monitor->Dashbord();
    }
}