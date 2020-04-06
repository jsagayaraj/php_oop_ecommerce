<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Category.php');
    
    //new category object
    $cat = new Category();
    if(isset($_POST['submit'])){
        $catName = $_POST['catName'];

        $insertCat = $cat->catInsert($catName);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($insertCat)) {
                        echo $insertCat;
                    }
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="catName" class="medium" />
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