<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Brand.php');
    require_once('../classes/Category.php');
    require_once('../classes/Product.php');


    $product = new Product();

    if(isset($_POST['addProduct'])){
        $insertProduct = $product->productInsert($_POST, $_FILES);
    }



?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
        <?php  
            if(isset($insertProduct)){
                echo $insertProduct;
            }               

        ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php
                                $cat = new Category();
                                $getCategory = $cat->getCategories();
                                if($getCategory){
                                    while($result = $getCategory->fetch_assoc()){
                                        echo "<option value='".$result['catId']."'>".$result['catName']."</option>";                          

                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php
                                $brand = new Brand();
                                $getBrand = $brand->getBrand();
                                if($getBrand){
                                    while($result = $getBrand->fetch_assoc()){
                                        echo "<option value='".$result['brandId']."'>".$result['brandName']."</option>";             
                                    }
                                }
                            ?>                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="addProduct" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


