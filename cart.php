<?php function title() {	echo "Cart";} 	function cart() { ?><div class="row cart col-md-12 col-lg-7" id="cart_list">	<table class="table table-striped">  <thead>    <tr>      <th scope="col">Item</th>      <th scope="col">Name</th>      <th scope="col">Quantity</th>      <th scope="col">Price</th>      <th scope="col">Total</th>    </tr>  </thead>  <tbody>  	<?php require "controllers/connection.php";   	$sql= "SELECT * FROM items";    $items=mysqli_query($conn, $sql);	foreach ($items as $item) { 			extract($item);      if (isset($_SESSION['cart'][$id])) {  ?>    <tr>    <th scope="row"><img src="<?= $image ?>" alt="Card image" id="cartimg"></th>    <td><?php echo $name; ?></td>    <td>      <!-- <form action="controllers/updateInput.php" method="POST"> -->      <input type="number" min="1" value="<?php echo $_SESSION['cart'][$id]; ?>" data-price="<?php echo $price; ?>" id="input" class="input-<?php echo $id; ?>" data-id="<?php echo $id; ?>" oninput="validity.valid||(value='');">      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#remove<?= $id ?>"><img src="assets/images/trash.png"></button>    </td>      <td id="itemprice"><?php echo $price; ?></td>        <td id="price" data-id="<?php echo $id; ?>"></td>    </tr>    <div class="modal fade" id="remove<?= $id ?>">              <div class="modal-dialog">                <div class="modal-content">                                  <div class="modal-header">                    <h4 class="modal-title">Remove From List</h4>                    <button type="button" class="close" data-dismiss="modal">&times;</button>                  </div>                                    <div class="modal-body">                    Item will be removed from order.                  </div>                  <div class="modal-footer">                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>                    <button type="submit" class="btn btn-danger removeList">                    <a href="controllers/cartremove.php?action=removeone&id=<?php echo $id; ?>">Remove</button>                  </div>                                  </div>              </div>            </div> <!-- end of modal --><?php    } }     if (!(isset($_SESSION['cart']))) {          echo "No items in the cart.";        }?>    </tbody>  </table>      <button class="btn btn-danger" data-toggle="modal" data-target="#modalremove<?= $id ?>"><a href="controllers/cartremove.php?action=removeall">EMPTY CART</a> </button></div> <!-- end of row --><?phpif (isset($_SESSION['logged_in_user'] )) { ?>    <?php          require "controllers/connection.php";        $username= $_SESSION['logged_in_user'];        $sql2="SELECT id FROM users WHERE username='$username'";        $id2= mysqli_fetch_assoc(mysqli_query($conn, $sql2));        // echo $id2['id'];        $id=$id2['id'];        $sql="SELECT*FROM user_details WHERE user_id= $id";        $result=mysqli_query($conn, $sql);        $display=mysqli_fetch_assoc($result);        // print_r($display);          $email = $display['email'];        $last_name = $display['last_name'];        $first_name= $display['first_name'];        $address = $display['address'];        $contact_number =  $display['contact_number'];        $username= $_SESSION['logged_in_user'];        // print_r($id['id']);    ?><!-- <div class="center"> -->    <div class="row checkout">        <div class="col-lg-12">                    <!-- form user info -->                    <div class="card user">                        <div class="card-header">                            <h4 class="mb-0">User Information</h4>                        </div>                        <div class="card-body">                            <form class="form" role="form">                                                            <div class="form-group row">                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>                                    <div class="col-lg-9">                                        <input class="form-control" id="order_name" type="text" name="name" value="<?php echo $first_name."".$last_name; ?>">                                    </div>                                </div>                                <div class="form-group row">                                <label class="col-lg-3 col-form-label form-control-label">Email</label>                                <div class="col-lg-9">                                    <input class="form-control" id="order_email" type="email" name="email" value="<?php echo $email; ?>">                                </div>                            </div>                                                                <div class="form-group row">                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>                                    <div class="col-lg-9">                                        <input class="form-control" id="address" name="address" type="text" value="<?php echo $address; ?>">                                    </div>                                </div>                                <div class="form-group row">                                    <label class="col-lg-3 col-form-label form-control-label">Contact Number</label>                                    <div class="col-lg-9">                                        <input class="form-control" id="number" name="contact_number" type="text" value="<?php echo $contact_number; ?>">                                    </div>                                </div>                                  <hr class="mb-4">                                <h4 class="mb-3">Payment</h4>                                <?php                                      global $conn;                                     $sql = "SELECT * FROM payment_methods";                                    $methods = mysqli_query($conn, $sql);                                    foreach ($methods as $method) {                                        $pay=$method['name'];                                        $pay_id=$method['id'];                                        // print_r($pay_id);                                                                    ?>                                <div class="d-block my-3">                                  <div class="custom-control custom-radio">                                    <input name="paymentMethod" type="radio" class="custom-control-input" id="<?php echo $pay_id; ?>" >                                    <label class="custom-control-label" for="<?php echo $pay_id; ?>"><?php echo $pay; ?></label>                                  </div>                              <?php } ?>                                <div class="form-group row">                                    <label class="col-lg-3 col-form-label form-control-label"></label>                                    <div class="col-lg-8 offset-1">                                    <button type="button" class="btn btn-primary btn-lg checkout" data-toggle="modal" data-target="#success" data-id="<?php echo $id; ?>">Confirm</a></button>                                <div class="modal fade" id="success">                                <div class="modal-dialog">                                  <div class="modal-content">                                    <!-- Modal Header -->                                    <div class="modal-header">                                      <h4 class="modal-title">You have successfully placed your order!</h4>                                      <button type="button" class="close" data-dismiss="modal">&times;</button>                                    </div>                                  </div>                                </div>                              </div>                                    </div>                                </div>                            </form>                        </div>                    </div>                    <!-- /form user info -->                </div>                            </div>           </div><?php } else {  echo "please log in";} ?><div class="col-md-12 col-lg-12 cartsummary">  <!-- <form action="controllers/total.php" method="POST"> -->     <div class="summary">      <h3>Summary</h3>      <div class="summary-item">        <span class="text">Subtotal</span>        <span class="text" id="summary_subtotal"></span>      </div>      <div class="summary-item">        <span class="text">Shipping</span>        <span class="text" id="summary_shipping">100</span>      </div>      <div class="summary-item">        <span class="text">Total</span>        <span class="text" id="summary_total"></span>      </div>     </div>   </div>  <!-- </form> -->    <hr><?php } ?><?php require "template.php"; ?>