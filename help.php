
<?php 
require_once "./php/classes/Client.php";
session_start();


if (isset($_POST['register'])) {

    try {
        $fName=$_POST['fName'];
        $email=$_POST['email'];
        $messageClient=$_POST['messageClient'];

        $cliente = new Client();

        if ($cliente->insertContactInfo($fName, $email, $messageClient)) {
            echo '<script>
                alert("Your data has been registered. We will get back to you shortly.");
            </script>';
            exit;
        } else {
            echo "Oh no! It seems like something went wrong. Please try again.";
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

		<!-- ReCAPTCHA -->
		 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

		 <!-- JQuery Validate library -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

		<!-- Libreria de sweetalert-->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
							<li class="active">Help</li>
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
                                        <h3 class="title">Contact Us!</h3>
                                    </div>
                                    <form method="post" id="registerClient" onsubmit="return submitUserForm();">
                                        <p>Fill the form below and we will contact you at our earliest opportunity.</p>
										<p>Fields with an '*', must be filled<p>
										<p</p>
                                        <div style="margin-bottom: 1em;">
                                            <div><strong>First Name*</strong></div>
                                            <div><input type="text" id="fName" required name="fName" placeholder="First Name" class="form-control" style="margin-bottom: 1em;"></div>

                                            <div><strong>Email*</strong></div>
                                            <div><input type="email" id="email" required name="email" placeholder="Email" class="form-control" style="margin-bottom: 1em;"></div>

                                            <div><strong>Message*</strong></div>
                                            <div><textarea id="messageClient" required name="messageClient" placeholder="Message" class="form-control" style="margin-bottom: 1em;"></textarea></div>

											<div><strong>ReCAPTCHA*</strong></div>
                                            <div class="g-recaptcha" data-sitekey="6LcGUeYpAAAAADMVnT2WzEMFk334PBzFUH6BMETI" data-callback="verifyCaptcha"></div>
                                        </div>
                                        <div>
                                            
                                            <p>Already have an account with us? <a href="./login.php">Log in to your account!</a></p>
                                        </div>
										<div id="g-recaptcha-error"></div>
                                        <button type="submit" id="register" name="register" class="primary-btn order-submit" style="width: 100%;">Send</button>
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

		<!-- Inicio de código de validaciones jQuery -->

		<script type="text/javascript">
                $(document).ready(function() {
                    $("#register").click(function(){
                        if ($("#fName").val() == "") {
    
                            swal("Error", "Please provide your name", "error");
                            return false;

                        } else if($("#email").val() == ""){

                            swal("Error", "Please provide your email", "error");
                            return false;

                        } else if($("#message").val() == null){
                            
							swal("Error", "Please type your message", "error");
                            return false;

                        } 
                    });
                    
    
                });
                </script>

                <!--====  End of Código de Validaciones jQuery  ====-->

				<script>
					function submitUserForm() {
						var response = grecaptcha.getResponse();
						if(response.length == 0) {
							document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Please fill out the reCAPTCHA field.</span>';
							return false;
						}
						return true;
					}
					
					function verifyCaptcha() {
						document.getElementById('g-recaptcha-error').innerHTML = '';
					}
					</script>
	</body>
</html>
