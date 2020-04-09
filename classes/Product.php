<?php 

require_once('../lib/Database.php');
require_once('../helpers/Format.php');

/**
* 
*/
class Product 
{
	
   private $db;
   private $format;

   public function __construct(){
      $this->db = new Database();
      $this->format = new Format();
   }

   public function productInsert($data, $file){
      $product_name = mysqli_real_escape_string($this->db->link, $data['productName']);
      $cat_id = mysqli_real_escape_string($this->db->link, $data['catId']);
      $brand_id = mysqli_real_escape_string($this->db->link, $data['brandId']);
      $body = mysqli_real_escape_string($this->db->link, $data['body']);
      $price = mysqli_real_escape_string($this->db->link, $data['price']);
      $type = mysqli_real_escape_string($this->db->link, $data['type']);

      $file_format = array('jpg', 'png', 'jpeg');
      $file_name = $file['image']['name'];
      $file_size = $file['image']['size'];
      $file_temp = $file['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_name = substr(md5(time()), 0,10).'.'.$file_ext;
      $uploaded_image = "upload/".$unique_name;

      if($product_name == "" || $cat_id == "" || $brand_id == "" || $body == "" || $price == "" || $type == ""){
            $msg = "<span class='error'>Field must not be empty</span>";
            return $msg;
      }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO products (productName, catId, brandId, body, price, Image, type ) VALUES ('$product_name', '$cat_id', '$brand_id', '$body', '$price', '$uploaded_image', 'type')";
            $inserted_row = $this->db->create($query);

         if ($inserted_row) {
            $message = "<span class='success'>Product inserted successfully</span>";
            return $message;
         }else{
            $message = "<span class='error'>Product not inserted successfully</span>";
            return $message;
         }
      }

   }

   //show all products
   public function getAllProducts(){ 
      $query = "SELECT products.*, category.catName, brand.brandName 
               FROM products 
               INNER JOIN category ON products.catId=category.catId 
               INNER JOIN brand ON products.brandId=brand.brandId 
               ORDER BY products.productId DESC";
      $result = $this->db->select($query);
      return $result;

   }
   



}


