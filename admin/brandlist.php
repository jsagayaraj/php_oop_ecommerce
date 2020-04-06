<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
	 require_once('../classes/Brand.php'); 
	 
	 //delete category
	 $brand = new Brand();
	 if (isset($_GET['brandId'])) {
		 $id = $_GET['brandId'];
		 $brandDelete = $brand->deleteBrand($id);
	 }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
						 <?php
						 	//show success message
						 	if (isset($brandDelete)) {
								 echo $brandDelete;
							 }
						 ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//get brand						    
						    $getAllBrand = $brand->getBrand();
						    if ($getAllBrand) {
						    	$i = 0;
						    	while($result = $getAllBrand->fetch_assoc()){
						    		$i++;
						 ?>
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandId=<?php echo $result['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?brandId=<?php echo $result['brandId']; ?>">Delete</a></td>
						</tr>
						<?php }  } ?>
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

