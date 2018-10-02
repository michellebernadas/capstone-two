<?php function title(){ echo "Order History"; } ?>

<?php function contents(){ ?>

	<?php if(isset($_SESSION['admin'])) { ?>

		<div class="container-fluid my-4">
			
			<h2 class="title-header2 text-center my-3">Orders List</h2>
			<h4 class="title-header4 my-3 text-center">Orders being processed:</h4>

				<div class="row">

			<?php 
			
				require 'controllers/connection.php';

				$sql = "SELECT user_id, contact_number, name, address, total_price, date_created, transaction_code, payment_method_id, orders.id id FROM orders inner JOIN payment_methods ON payment_methods.id = orders.payment_method_id WHERE status_id = 1 ORDER BY date_created DESC";
				$result = mysqli_query($conn, $sql); 
				
				while($admin = mysqli_fetch_assoc($result)){ 
						$userid = $admin['user_id']; ?>

					<div class="card-checkout col-4 offset-1 py-3">
					<p class="texts1">Date: <span class="texts1"><?php echo $admin['date_created']; ?></span></p>
					<p class="texts1">Customer Name: <span class="texts1"><?php echo $admin['fullname']; ?></span></p>
					<p class="texts1">Customer Address: <span class="texts1"><?php echo $admin['delivery_address']; ?></span></p>
					<p class="texts1">Customer Contact Number: <span class="texts1"><?php echo $admin['contact_number']; ?></span></p>
					<p class="texts1">Total Price of Order: <span class="texts1"><?php echo $admin['total_price']; ?></span></p>
					<p class="texts1">Payment Method: <span class="texts1"><?php echo $admin['option']; ?></p>
						<p class="texts2">Products:</p>
						<?php  

						$sql = "SELECT * FROM cart_orders WHERE userid = $userid";
							
						


						?>
					<button class="btn btn-outline-info changeStatus" type="button" data-id="<?php echo $admin['id']; ?>">Delivered</button>	
					</div>

			<?php } ?>	<!-- end of while loop -->			

				</div>	<!-- end of row -->

			<h4 class="title-header4 my-5 text-center">Orders Delivered:</h4>

			<div class="row">

			<?php 
			
				require 'controllers/connection.php';

				$sql = "SELECT contact_number, fullname, delivery_address, total_price, date_created, invoice_number, option, orders.id id FROM orders inner JOIN payment_methods ON payment_methods.id = orders.payment_method_id WHERE status_id = 2 ORDER BY date_created DESC";
				$result = mysqli_query($conn, $sql); 
				
				while($admin = mysqli_fetch_assoc($result)){ ?>

					<div class="card-checkout col-4 offset-1 py-3">
					<p class="texts1">Date: <span class="texts1"><?php echo $admin['date_created']; ?></span></p>
					<p class="texts1">Customer Name: <span class="texts1"><?php echo $admin['fullname']; ?></span></p>
					<p class="texts1">Customer Address: <span class="texts1"><?php echo $admin['delivery_address']; ?></span></p>
					<p class="texts1">Customer Contact Number: <span class="texts1"><?php echo $admin['contact_number']; ?></span></p>
					<p class="texts1">Total Price of Order: <span class="texts1"><?php echo $admin['total_price']; ?></span></p>
					<p class="texts1">Payment Method: <span class="texts1"><?php echo $admin['option']; ?></p>
					<button class="btn btn-outline-info undoStatus" type="button" data-id="<?php echo $admin['id']; ?>">Undo Changes</button>	
					</div>

			<?php } ?>	<!-- end of while loop -->

			</div>
		</div> <!-- end of container -->



	<?php } else { ?>
	
		<h1 class="title-header1 text-center my-5">404 NOT FOUND</h1>

	<?php } ?> <!-- end of isset admin -->

	<script type="text/javascript">
		
		$('.changeStatus').click( function () {
			let id = $(this).data('id');
			$.ajax({
			url:'controllers/adminorders.php',
			method: 'POST',
			data: { 'id' : id },  
			}).done(data => {
			 $('#successModal').modal('show');
			 $('#successMessage').html(data);
			 setTimeout( function() {
				location.reload();
			},1500);
			}); // end of ajax
		});

		$('.undoStatus').click( function () {
			let id = $(this).data('id');
			$.ajax({
			url:'controllers/undochanges.php',
			method: 'POST',
			data: { 'id' : id },  
			}).done(data => {
			 $('#successModal').modal('show');
			 $('#successMessage').html(data);
			 setTimeout( function() {
				location.reload();
			},1500);
			}); // end of ajax
		});

	</script>

<?php } ?>

<?php require_once 'admin_template.php'; ?>