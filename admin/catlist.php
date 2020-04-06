<?php 
    require_once('inc/header.php');
    require_once('inc/sidebar.php');
	 require_once('../classes/Category.php'); 
	 
	 //delete category
	 $cat = new Category();
	 if (isset($_GET['catId'])) {
		 $id = $_GET['catId'];
		 $catDelete = $cat->deleteCategory($id);
	 }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
						 <?php
						 	//show success message
						 	if (isset($catDelete)) {
								 echo $catDelete;
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
							    //new category object
						    $cat = new Category();
						    $getAllCategories = $cat->getCategories();
						    if ($getAllCategories) {
						    	$i = 0;
						    	while($result = $getAllCategories->fetch_assoc()){
						    		$i++;
						 ?>
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><a href="catedit.php?catId=<?php echo $result['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="?catId=<?php echo $result['catId']; ?>">Delete</a></td>
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

