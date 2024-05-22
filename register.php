
<?php 
require_once "./php/classes/Client.php";
session_start();


if (isset($_POST['register'])) {

    try {
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $email=$_POST['email'];
        $pNumber=$_POST['pNumber'];
        $password=$_POST['password'];

        $cliente = new Client();

        if ($cliente->createClient($fName, $lName, $email, $password, $pNumber)) {
            echo '<script>
                alert("Se ha creado su cuenta, inicie sesion");
                window.location.href = "login.php";
            </script>';
            exit;
        } else {
            echo "Oh no";
        } 
    } catch (\Throwable $th) {
        echo $th;
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

    </head>
	<body>
		<!-- HEADER AND NAVBAR -->
		<?php include_once "./templates/headNav.php"; ?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">My Account</h3>
						<ul class="breadcrumb-tree">
							<li><a href="./">Home</a></li>
							<li class="active">Register</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <!-- SECTION -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-7">
                                    <img style="width: 100%; height: 50%;" class="img-fluid" src="https://ecelectronics.com/wp-content/uploads/2020/04/Modern-Electronics-EC-.jpg" alt="">    
                                </div>

                                <!-- Order Details -->
                                <div class="col-md-5 order-details">
                                    <div class="section-title text-center">
                                        <h3 class="title">Create a new account</h3>
                                    </div>
                                    <form method="post" id="registerClient">
                                        <p>Fields with a '*', must be completed</p>
                                        <div style="margin-bottom: 1em;">
                                            <div><strong>First Name*</strong></div>
                                            <div><input type="text" required name="fName" placeholder="First Name" class="form-control" style="margin-bottom: 1em;"></div>

                                            <div><strong>Last Name*</strong></div>
                                            <div><input type="text" required name="lName" placeholder="Last Name" class="form-control" style="margin-bottom: 1em;"></div>

                                            <div><strong>Email*</strong></div>
                                            <div><input type="email" required name="email" placeholder="Email" class="form-control" style="margin-bottom: 1em;"></div>

                                            <div><strong>Phone Number</strong></div>
                                            <div><input type="text" name="pNumber" placeholder="Phone Number" class="form-control" style="margin-bottom: 1em;"></div>
                                            
                                            <div><strong>Password*</strong></div>
                                            <div><input type="password" required name="password" placeholder="Password" class="form-control" style="margin-bottom: 1em;"></div>
                                        </div>
                                        <div>
                                            
                                            <p>You already have an account? <a href="./login.php">Log in</a></p>
                                        </div>
                                        <button type="submit" name="register" class="primary-btn order-submit" style="width: 100%;">Register</button>
                                    </form>
                                </div>
                                <!-- /Order Details -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETER AND FOOTER -->
		<?php include_once "./templates/newlFoot.php"; ?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>