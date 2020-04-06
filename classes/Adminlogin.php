<?php
require_once('../lib/Database.php');
require_once('../lib/Session.php');
Session::checklogin();
require_once('../helpers/Format.php');



class Adminlogin 
{
   private $db;
   private $format;

   public function __construct(){
      $this->db = new Database();
      $this->format = new Format();
   }

   public function adminlogin($adminUser, $adminPass){
      $adminUser = $this->format->validation($adminUser);
      $adminPass = $this->format->validation($adminPass);

      $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
      $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

      if(empty($adminUser) || empty($adminPass)){
         $loginMessage = "User name or Password must not be empty";
         return $loginMessage;
      }else{
         $query = "SELECT * FROM admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
         $result = $this->db->select($query);
         if($result != false){
            $value = $result->fetch_assoc();
            Session::set("adminlogin", true);
            Session::set("adminId", $value['adminId']);
            Session::set("adminUser", $value['adminUser']);
            Session::set("adminName", $value['adminName']);
            header("Location:dashbord.php");
         }else{
            $loginMessage = "Username or password not match";
            return $loginMessage;
         }
      }

   }
}
