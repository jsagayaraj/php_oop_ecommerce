<?php
   require_once('../config/config.php');

class Database{
   public $host = DB_HOST;
   public $user = DB_USER;
   public $pass = DB_PASSWORD;
   public $dbname = DB_NAME;

   public $link;
   public $error;

   public function __construct() {
      $this->connectDB();
   }
   private function connectDB(){
      $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

      if (!$this->link) {
         $this->error = "Connection fail ".$this->link->connect_error;
         return false;
      }
   }

   // select data base
   public function select($query) {
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if($result->num_rows > 0){
         return $result;
      }else{
         return false;
      }
   }

   //insert data
   public function create($query) {
      $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($insert_row){
         return $insert_row;
         exit();
      }else{
         return false;
      }
   }

   //update data
   public function update($query) {
       $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($update_row){
         return $update_row;
         exit();
      }else{
         return false;
      }
   }

   //DELETE data
   public function delete($query) {
       $delete = $this->link->query($query) or die($this->link->error.__LINE__);
      if($delete){
         return $delete;
         exit();
      }else{
         return false;
      }
   }

}