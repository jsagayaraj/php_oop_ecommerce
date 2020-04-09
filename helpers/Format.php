<?php

/**
*format class
*/
class Format{

   public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   public function textShorten($text, $limit=200){
   		$text = $text. "";
   		$text = substr($text, 0, $limit);
   		$text = $text."...";
   		return $text;

   }
}