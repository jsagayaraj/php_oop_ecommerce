﻿<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
    require_once('../classes/Product.php');

    require_once('../helpers/Format.php');


    $fm = new Format();
    $product = new Product();

 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php 
						$products = $product->getAllProducts();
					    if($products){
					    	$i=0;
					    	while ($result = $products->fetch_assoc()) {
					    	$i++;	
					    	// echo "<pre>";
					    	// print_r($result);
					    	// echo "</pre>";
					    ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $fm->textShorten($result['body'], 100); ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><img alt="" src="<?php echo $result['image'];?>" height="40px" width="60px"></td>
					<td>
						<?php 

						if($result['type']== 0){
							echo "Featured";
						}else{
							echo "General";
						}
					  	?>
					  	
					  </td>


					<td><a href="">Edit</a> || <a href="">Delete</a></td>
				</tr>
				<?php  	
						}
					}

				 ?>
			</tbody>
		</table>
       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
