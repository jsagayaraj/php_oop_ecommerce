<?php 

require_once('../lib/Database.php');
require_once('../helpers/Format.php');

/**
* 
*/
class Category 
{
	
   private $db;
   private $format;

   public function __construct(){
      $this->db = new Database();
      $this->format = new Format();
   }

   public function catInsert($catName){
   	$catName = $this->format->validation($catName);
      $catName = mysqli_real_escape_string($this->db->link, $catName);

     if(empty($catName)){
         $message = "Category name must not be empty";
         return $message;
      }else{
      	$query = "INSERT INTO category (catName) VALUES ('$catName')";
      	$catInsert = $this->db->create($query);

      	if ($catInsert) {
      		$message = "<span class='success'>Category inserted successfully</span>";
      		return $message;
      	}else{
      		$message = "<span class='error'>Category not inserted successfully</span>";
      		return $message;
      	}
      }
   }


   //show category list
   public function getCategories(){
	   	$query = "SELECT * FROM category ORDER BY catId DESC";
	   	$result = $this->db->select($query);
	   	return $result;

   }

   //show categories by id
   public function getCategoryById($id)
   {
      $query = "SELECT * FROM category WHERE catId=$id";
         $result = $this->db->select($query);        
         return $result;
         
   }

   //update category
   public function updateCategories($catName, $id) {
      $catName = $this->format->validation($catName);
      $catName = mysqli_real_escape_string($this->db->link, $catName);

     if(empty($catName)){
         $message = "<span class='error'>Category name must not be empty</span>";
         return $message;
      }else{
         $query = "UPDATE category SET catName = '$catName' WHERE catId='$id'";
         $update_row = $this->db->update($query);
         if ($update_row) {
            $message = "<span class='success'>Category updated successfully</span>";
      		return $message;
         }else{
      		$message = "<span class='error'>Category not updated successfully</span>";
      		return $message;
      	}
      }
      
   }


   //delete category

   public function deleteCategory($id){
      $query = "DELETE FROM category WHERE catId=$id";
      $deleteData = $this->db->update($query);
      if ($deleteData) {
            $message = "<span class='success'>Category deleted successfully</span>";
            return $message;
         }

      }
}

 ?>