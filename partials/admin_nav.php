<div class="first" id="top">
	<div class="row">
 	<img src="assets/images/home/logo2.png" class="logosite">
	</div>
	
<div id="master" class="master">
<nav class="navbar navbar-light navbar-expand-lg navbar-static bg-faded" role="navigation">
 	<!-- <a class="navbar-brand" href="#">Navbar</a> -->
 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
 	<ul class="nav navbar-nav">
  		<!-- <button class="navbar-toggler-icon pull-xs-right" id="navbarSideButton" type="button"></button> -->
   	<!-- 	<li class="nav-item">
      		<a class="nav-link" href="index.php">Home</a>
    	</li> -->
      <li class="dropdown nav-item">
        <a href="admin.php" class="dropdown-toggle nav-link" data-toggle="dropdown">Shop By Categories<span class="caret"></span></a>       
        <ul class="dropdown-menu" role="menu">
        <li><a href="admin.php">All</a></li>

        <?php
          require "controllers/connection.php";
          $sql = "SELECT * FROM categories";
          $categories = mysqli_query($conn,$sql);
          foreach($categories as $category) :
            ?>
            <li>
              <a href="admin.php?cat=<?= $category['id'] ?>">
                <?= $category['name'] ?>  
              </a>
            </li>
          <?php endforeach; ?>
          <li><a href="controllers/sort.php?p=asc">Price (lowest to highest)</a></li>
          <li><a href="controllers/sort.php?p=desc">Price (highest to lowest)</a></li>
        </ul>  

      </li>
      <li class="nav-item">
          <a class="nav-link" href="list_products.php">List of Products</a>
      </li>
    	<!--<li class="nav-item">-->
     <!-- 		<a class="nav-link" href="#">About Us</a>-->
    	<!--</li>-->

      <?php
        if (isset($_SESSION['logged_in_user'])) {
          echo '<li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">'.$_SESSION['logged_in_user'].'<span class="caret"></span></a>       
                <ul class="dropdown-menu" role="menu">
                <li><a href="orders.php">Order History</a></li>
                <li><a href="controllers/logout.php">Logout</a></li>
                </ul>       
              </li>';
        } else { 
          echo '<li class="nav-item">
                <a id="signin" href="#" class="nav-link" data-toggle="modal" data-target="#myModal">My Account<img src="assets/images/user.png" class="user"></a>
                </li>';
        }
       ?>



  <?php 

    require "controllers/connection.php";

    if (isset($_SESSION['logged_in_user'])) {
      echo "";
    } else {
      echo "";

      if (isset($_SESSION['error_message'])) {
        echo "<span class='error_message'>".$_SESSION['error_message']."</span>";
        // unset($_SESSION['error_message']);
      }

      echo '<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
              <div class="modal-content signin">
                <div class="modal-header">
                  <h4 class="modal-title font-weight-bold text-xs-center">SIGN IN</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                <form role="form" method="POST" action="controllers/authenticate.php">
                <input type="hidden" name="_token" value="">
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <div>
                        <input type="name" class="form-control input-lg" name="username" value="" placeholder="Enter username">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label">Password</label>
                    <div>
                        <input type="password" class="form-control input-lg" name="password" placeholder="Enter Password">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <div>
                        <!-- <a class="btn btn-link" href="">Forgot Your Password?</a> -->
                        <button type="submit" class="btn btn-info btn-block">Log In</button>
                    </div>
                </div>
                </form>
                </div>
                <div class="modal-footer mr-auto">
                    Not a Member? <a href="#" data-toggle="modal" data-target="#myModal2" id="up"  data-dismiss="modal"> &nbsp;Sign up »</a>
                </div>
              </div><!-- modal content -->
          </div><!-- modal-dialogue -->
          </div><!--  modal -->';
    }
  ?>




<div id="myModal2" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content signup">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold text-xs-center">CREATE ACCOUNT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
      <form role="form" action="controllers/register_endpoint.php" method="POST">

      <div class="form-group">
          <label class="control-label">Username</label>
          <div>
              <input type="text" class="form-control input-lg" name="username" id="username" placeholder="Enter Username">
              <span></span>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label">E-Mail</label>
          <div>
              <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Enter Email">
              <span></span>
          </div>
      </div>
       <div class="form-group">
          <label class="control-label">Password</label>
          <div>
              <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Enter Password">
              <span></span>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label">Confirm Password</label>
          <div>
              <input type="password" class="form-control input-lg" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
              <span></span>
          </div>
      </div>
      <div class="form-group">
          <div>
              <!-- <a class="btn btn-link" href="">Forgot Your Password?</a> -->
              <button type="submit" class="btn btn-info btn-block" id="signup">Sign Up</button>
          </div>
      </div>
      </form>
      </div>
      <div class="modal-footer mr-auto">
          Already a Member? <a href="#" data-toggle="modal" data-target="#myModal" id="in" data-dismiss="modal"> &nbsp;Log in »</a>
      </div>
    </div><!-- modal content -->
</div><!-- modal-dialogue -->
</div><!--  modal -->
  
</nav> <!-- end of nav -->
</div>
</div>