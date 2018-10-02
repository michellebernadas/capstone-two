<?php require_once "template.php"; ?>
<?php function title(){
	echo "Items";
} ?>
<?php function contents(){ 

	require "controllers/connection.php";
	$sql= "SELECT*FROM items";
	$products = mysqli_query($conn, $sql);

	$select = isset($_GET['id']) ? "WHERE id = ".$_GET['id'] : '' ; 
	$sql = "SELECT * FROM items $select";
	$products = mysqli_query($conn, $sql);
?>

<div class="row">
	<?php 

	foreach ($products as $product) {
		extract($product); 	?>

		<div class="col-sm-4 offset-2">	
					<div class="imagecover">	
					<img class="itemimage" src="<?= $image ?>" alt="Card image">	
					</div>
		</div>
		<div class="col-sm-5 desc">
			 <div class="card-deck">
			    <div class="card bg-white">
			      <div class="card-body">
			        <h4 class="card-title"><?= $name ?></h4>
			        <p class="card-text"><?php echo $description; ?></p>
			        Price: <p class="card-text price"><strong><?= $price ?></strong></p><br>	
			        <button class="btn btn-danger addToCart" type="button" data-index=<?php echo $price; ?> id="<?= $id ?>">Add To Cart</button>
			      </div>
			    </div>
			
		</div>	

</div>
</div><br>
<?php } ?>
<h2>RELATED PRODUCTS</h2><br>
<div class="row  justify-content-center mb-4 px-0">
	<?php  

	$display = '';
	if(isset($_GET['id'])) {
		$get_id = $_GET['id'];
		$display = "WHERE id != $get_id";
		$result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT category_id from items WHERE id = $get_id"));
		$display .= " AND category_id = ".$result['category_id'];
	} 

	$sql = "SELECT * FROM items $display LIMIT 4";
	$items = mysqli_query($conn, $sql);
	foreach ($items as $item) {
		extract($item); 	?> 	

	<div class="col-3 py-2">	
		<div class="card h-100 border-dark">
			<!-- <div class="img"> -->
			<div class="image">
		<a href="../items.php?id=<?php echo $id; ?>">		
			<img class="card-img-top" src="<?php echo $image; ?>" alt="Card image">
		</a>	
			</div>
			<div class="card-body">
				<div class="body">
					<p class="card-title"><?php echo $name; ?></p>
					<p class="card-text"><?php echo $price ?></p>	
				</div>
				<!-- <p class="card-text"><?php //echo $description //?></p> -->
				<!-- <p><?php //echo $category_id ?></p> -->
				<div class="number">
					<!-- <input type="number" min="1" name="quantity" id="quantity<?= $id ?>"> -->
					<button class="btn btn-danger addToCart" type="button" data-index=<?php echo $price; ?> id="<?= $id ?>">Add To Cart</button>
					<small></small>
				</div>
			</div>
	</div>
</div>	



<?php } ?>



<?php } ?>