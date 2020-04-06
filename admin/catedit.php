<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Category.php');


    if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
       echo "<script> window.location='catlist.php'</script>";
    }else{
       $id = $_GET['catId'];
    }
    
    //new category object
    $cat = new Category();
    if(isset($_POST['update'])){
        $catName = $_POST['catName'];
        $updateCategory = $cat->updateCategories($catName, $id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                  //show message error or success
                    if (isset($updateCategory)) {
                        echo $updateCategory;
                    }

                    //show category by id
                    $getCategory = $cat->getCategoryById($id);
                    if($getCategory){
                       while($result = $getCategory->fetch_assoc()){
                       
               ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                           <td>
                              <input type="text" name="catName" class="medium" value="<?php echo $result['catName'] ?>"/>
                           </td>
                        </tr>
						      <tr> 
                           <td>
                              <input type="submit" name="update" Value="Update" />
                           </td>
                        </tr>
                    </table>
                    </form>
                  <?php          
                     }    
                  }          
                ?>
                </div>
            </div>
        </div>



<?php require_once('inc/footer.php');?>