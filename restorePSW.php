
<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once "./php/classes/RestorePassword.php";
session_start();

if (isset($_POST['restore'])) {

    try {
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			
			$sendNewPSW = new RestorePassword();
			if ($sendNewPSW->verifyEmail($email)) {
				$sendNewPSW->sendEmailRP($email);
				echo "<script>
					alert('Se le enviará un correo con su nueva contraseña en unos minutos.');
					window.location.href = 'login.php';
				</script>";
			}else {
				echo "<script>
					alert('No se encontró el correo.');
					window.location.href = 'restorePSW.php';
				</script>";
			}
		} else {
			echo "<script>
				alert('No se definió un correo.');
				window.location.href = 'restorePSW.php';
			</script>";
		}
		

    } catch (\Throwable $th) {
		echo "<script>alert(No se definio un correo.);</script>";
        // echo $th;
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
		<script src="//code.tidio.co/va7p5jdpfyfblp3gq2nwdlrehctrttfg.js" async></script>

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
							<li class="active">Restore password</li>
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
                                        <h3 class="title">Restore your password account</h3>
                                    </div>
                                    <form method="post">
                                        <div style="margin-bottom: 1em;">
                                            <div><strong>Email</strong></div>
                                            <div><input required type="email" name="email" placeholder="Email" class="form-control" style="margin-bottom: 1em;"></div>
                                        </div>
                                        <div>
                                            <p>If your email is registered, we will send you a new password. We recommend that you change it as soon as you log in.</p>
                                        </div>
                                        <button type="submit" name="restore" class="primary-btn order-submit" style="width: 100%;">Restore</button>
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
