<?php  
function title() {
	echo "Checkout";
}
function contents() {
	if (isset($_SESSION['logged_in_user'] )) { ?>
    <?php  
        require "controllers/connection.php";

        $sql="SELECT*FROM user_details";
        $result=mysqli_query($conn, $sql);
        $display=mysqli_fetch_assoc($result);
        // print_r($display);  

        $email = $display['email'];
        $last_name = $display['last_name'];
        $first_name= $display['first_name'];
        $address = $display['address'];
        $contact_number =  $display['contact_number'];
        $user_id = $display['user_id'];
    ?>
<!-- <div class="center"> -->
    <div class="row checkout">
        <div class="col-lg-6">
                    <!-- form user info -->
                    <div class="card user">
                        <div class="card-header">
                            <h4 class="mb-0">User Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" action="controllers/orders.php" method="POST">
                            
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="name" value="<?php echo $first_name."".$last_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
		                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
		                            <div class="col-lg-9">
		                                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
		                            </div>
		                        </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Adress</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="address" type="text" value="<?php echo $address; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Contact Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="contact_number" type="text" value="<?php echo $contact_number; ?>">
                                    </div>
                                </div>	
                                <hr class="mb-4">
                                <h4 class="mb-3">Payment</h4>
                                <?php  
                                    global $conn;

                                     $sql = "SELECT * FROM payment_methods";
                                    $methods = mysqli_query($conn, $sql);

                                    foreach ($methods as $method) {
                                        $pay=$method['name'];
                                        $pay_id=$method['id'];
                                        // print_r($pay_id);
                                    
                                ?>


                                <div class="d-block my-3">

                                  <div class="custom-control custom-radio">
                                    <input id="<?php echo $pay_id; ?>" name="paymentMethod" type="radio" class="custom-control-input" checked >
                                    <label class="custom-control-label" for="<?php echo $pay_id; ?>"><?php echo $pay; ?></label>
                                  </div>

                              <?php } ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-8 offset-1">
                                    <button type="button" class="btn btn-primary btn-lg checkout" data-id="<?php echo $user_id; ?>">Confirm</a></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->
                </div>
               
             </div>
           </div>

    <div class="col-md-12 col-lg-4 cartsummary">
     <div class="summary">
      <h3>Summary</h3>
      <div class="summary-item">
        <span class="text">Subtotal</span>
        <span class="text" id="summary_subtotal"><?php echo $_SESSION['sub']; ?></span>
      </div>
      <div class="summary-item">
        <span class="text">Shipping</span>
        <span class="text" id="summary_shipping">100</span>
      </div>
      <div class="summary-item">
        <span class="text">Total</span>
        <span class="text" id="summary_total"><?php echo $_SESSION['total']; ?></span>
      </div>
     </div>
   </div>

        <!-- </div> -->
<?php
	} else {
		echo "please log in";
	} ?>
<?php } ?>


<?php require "template.php"; ?>