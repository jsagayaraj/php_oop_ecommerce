<?php 


class Session{

   public function init(){
      session_start();
   }

   public static function set($key, $val){
      $_SESSION[$key] = $val;
   }

   public static function get($key){
      if(isset($_SESSION[$key])){
         return $_SESSION[$key];
      }else {
         return false;
      }
   }

   //logout
   public static function checklogin() {
      self::init();
      if(self::get("adminlogin")==true){
         header("Location:login.php");
      }

   }

   //login
   public static function checkSession(){
      self::init();
      if(self::get("adminlogin")==false){
         self::destroy();
         header("Location:dashbord.php");
      }
   }

   public static function destroy(){
      session_destroy();
      header("Location:login.php");
   }


}  

?>