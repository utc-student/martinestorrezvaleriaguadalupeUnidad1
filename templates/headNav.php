		<!-- HEADER -->
        <header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="tel:+528442883800"><i class="fa fa-phone"></i> +52 (844) 288-3800</a></li>
						<li><a href="mailto:escolares@utc.edu.mx"><i class="fa fa-envelope-o"></i> escolares@utc.edu.mx</a></li>
						<li><a href="https://maps.app.goo.gl/8jwn6CxWFNVe7RrJ9" target="_blank"><i class="fa fa-map-marker"></i> 25900 Ramos Arizpe, Coah.</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="./myAccount.php"><i class="fa fa-user-o"></i>My Account</a></li>
						<!-- Se verifica si hay una sesion iniciada y asi poder mostrar el boton de logout -->
						<?php echo isset($_SESSION['ins_client']) ? '<li><a href="./logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>' : ''; ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="store.php" method="get">
									<select class="input-select" name="cat">
										<option value="0">All Categories</option>
										<option value="1">Laptops</option>
										<option value="2">Accesories</option>
										<option value="3">Cameras</option>
										<option value="4">Smartphones</option>
									</select>
									<input class="input" name="search" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="./wishlist.php">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">0</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">0</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php if (isset($_SESSION['ins_client'])) {
											echo '
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">2x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
											';
										} else {echo '
											<div class="product-widget">
												<div class="product-img">
													<img src="https://static.vecteezy.com/system/resources/previews/023/212/329/original/no-shopping-cart-sign-prohibition-sign-not-a-cart-red-crossed-circle-with-the-silhouette-of-a-shopping-cart-on-wheels-inside-shopping-cart-ban-round-red-stop-cart-sign-vector.jpg" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">You must login to see your cart</a></h3>
												</div>
											</div>
											'; 
										} ?>
										</div>
										<div class="cart-summary">
											<small>X Item(s) selected</small>
											<h5>SUBTOTAL: $XXXX.XX</h5>
										</div>
										<div class="cart-btns">
											<a href="./cart.php">View Cart</a>
											<a href="./checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<?php $current_page = basename($_SERVER['PHP_SELF']);?>
					<ul class="main-nav nav navbar-nav">
						<li class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
						<li class="<?php echo $current_page == 'store.php' ? 'active' : ''; ?>"><a href="store.php">Store</a></li>
						<li class="<?php echo $current_page == 'register.php' ? 'active' : ''; ?>"><a href="register.php">Register</a></li>
						<li class="<?php echo $current_page == 'login.php' ? 'active' : ''; ?>"><a href="login.php">Log In</a></li>
						<li class="<?php echo $current_page == 'help.php' ? 'active' : ''; ?>"><a href="help.php">Help</a></li>
						<li class="<?php echo $current_page == 'siteMap.php' ? 'active' : ''; ?>"><a href="siteMap.php">Site Map</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
