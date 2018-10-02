<?php function title() {	echo "Product List";}function contents() { ?>	<table class="table table-dark table-hover">    <thead>        <th>Transaction Code</th>        <th>User ID</th>        <th>Full Name</th>        <th>Address</th>        <th>Contact Number</th>        <th>Status ID</th>        <th>Total Price</th>        <th>Date Created</th>        <th>Payment Method</th>      </tr>    </thead>    <tbody>    <?php     	if (isset($_SESSION['admin'])) {                    require "controllers/connection.php";             $sql= "SELECT * FROM orders ";            $orders = mysqli_query($conn,$sql);            foreach ($orders as $order) {                  extract($order);            //print_r($order); ?>                                   <tr>      <tr>         <td class="transaction" data-id="<?php echo $order['id']; ?>"><?php echo $order['transaction_code']; ?>                  <div class="order_details">             <?php              $sql= "SELECT od.*,i.name as name FROM order_details od JOIN items i ON od.item_id=i.id WHERE od.order_id=$id";             $items = mysqli_query($conn,$sql); ?>            <?php              foreach ($items as $item) { ?>            <span class="item pl-2"> <?php echo $item['name']; ?> </span>             <span class="quantity float-right mr-2 pr-5""><?php echo $item['quantity']; ?> </span> <br>         <?php } ?>                        </div>        </td>        <?php         $sql="SELECT u.username,s.name sname,p.name FROM orders o         JOIN users u ON  (u.id=o.user_id)        JOIN statuses s ON (s.id=o.status_id)        JOIN payment_methods p ON (p.id=o.payment_method_id)";        $users= mysqli_query($conn,$sql);        // print_r($users);        foreach ($users as $user) {            // print_r($user);                } ?>        <td><?php echo $user['username'];; ?></td>        <td><?php echo $name; ?></td>        <td><?php echo $address; ?></td>        <td><?php echo $contact_number; ?></td>        <td><?php echo $user['sname']; ?></td>        <td><?php echo $total_price; ?></td>        <td><?php echo $date_created; ?></td>        <td><?php echo $user['name']; ?></td>      </tr>  <?php } ?>    </tbody>  </table> <?php } ?>      <!-- The Modal --><div class="modal fade" id="myModal">  <div class="modal-dialog">    <div class="modal-content">      <!-- Modal Header -->      <div class="modal-header">        <h4 class="modal-title">Order Details</h4>        <button type="button" class="close" data-dismiss="modal">&times;</button>      </div>      <!-- Modal body -->      <div class="modal-body">        <div class="row">          <div class="col-4">            <h5>Item</h5>          </div>          <div class="offset-4">            <h5>Quantity</h5>          </div>        </div>        <div class="show">                  </div>      </div>      <!-- Modal footer -->      <div class="modal-footer">        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>      </div>    </div>  </div></div><?php } ?><?php require "admin_template.php"; ?>