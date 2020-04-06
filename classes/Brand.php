<?php 

require_once('../lib/Database.php');
require_once('../helpers/Format.php');

/**
* 
*/
class Brand 
{
	
   private $db;
   private $format;

   public function __construct(){
      $this->db = new Database();
      $this->format = new Format();
   }

   public function brandInsert($brandName){
   	$brandName = $this->format->validation($brandName);
      $brandName = mysqli_real_escape_string($this->db->link, $brandName);

     if(empty($brandName)){
         $Message = "Brand name must not be empty";
         return $Message;
      }else{
      	$query = "INSERT INTO brand (brandName) VALUES ('$brandName')";
      	$brandInsert = $this->db->create($query);

      	if ($brandInsert) {
      		$message = "<span class='success'>Brand inserted successfully</span>";
      		return $message;
      	}else{
      		$message = "<span class='error'>Brand not inserted successfully</span>";
      		return $message;
      	}
      }
   }


   //show category list
   public function getBrand(){
	   	$query = "SELECT * FROM brand ORDER BY brandId DESC";
	   	$result = $this->db->select($query);
	   	return $result;

    }

   //show categories by id
   public function getBrandById($id)
   {
      $query = "SELECT * FROM brand WHERE brandId=$id";
         $result = $this->db->select($query);        
         return $result;
         
   }

   //update category
   public function updateBrand($brandName, $id) {
      $brandName = $this->format->validation($brandName);
      $brandName = mysqli_real_escape_string($this->db->link, $brandName);

     if(empty($brandName)){
         $message = "<span class='error'>Brand name must not be empty</span>";
         return $message;
      }else{
         $query = "UPDATE brand SET brandName = '$brandName' WHERE brandId='$id'";
         $update_row = $this->db->update($query);
         if ($update_row) {
            $message = "<span class='success'>Brand updated successfully</span>";
      		return $message;
         }else{
      		$message = "<span class='error'>Brand not updated successfully</span>";
      		return $message;
      	}
      }
      
   }


   //delete category
   public function deleteBrand($id){
      $query = "DELETE FROM brand WHERE brandId=$id";
      $deleteData = $this->db->update($query);
      if ($deleteData) {
            $message = "<span class='success'>Brand deleted successfully</span>";
            return $message;
         }

      }
}

 ?>