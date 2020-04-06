<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Brand.php');


    if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
       echo "<script> window.location='brandlist.php'</script>";
    }else{
       $id = $_GET['brandId'];
    }
    
    //new category object
    $brand = new Brand();
    if(isset($_POST['update'])){
        $brandName = $_POST['brandName'];
        $updateBrand = $brand->updateBrand($brandName, $id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                  //show message error or success
                    if (isset($updateBrand)) {
                        echo $updateBrand;
                    }

                    //show category by id
                    $getBrand = $brand->getBrandById($id);
                    if($getBrand){
                       while($result = $getBrand->fetch_assoc()){
                       
               ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                           <td>
                              <input type="text" name="brandName" class="medium" value="<?php echo $result['brandName'] ?>"/>
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