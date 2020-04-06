<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Brand.php');
    
    //new category object
    $brand = new Brand();
    if(isset($_POST['submit'])){
        $brandName = $_POST['brandName'];

        $insertBrand = $brand->brandInsert($brandName);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($insertBrand)) {
                        echo $insertBrand;
                    }
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="brandName" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>



<?php require_once('inc/footer.php');?>