</div>
<?php 
	echo '<div class = "row">';
	echo '			<div class = "col-10"></div>';
	if(isset($_SESSION['user_type'])):
		echo '				<div class = "sidebar col-2 d-none d-sm-block">';
		echo '					<h4 class = "text-danger bg-dark card title"> Administration</h4>';
		echo '					<ul class = "list-unstyled card">';
		echo '						<li>';
		echo '							<a href = "add_page.php" class = "nounderline" title = "Add a Page">';
		echo '								<code class = "text-secondary"> Add a Page </code>';
		echo '							</a>	';
		echo '						</li>';
		echo '						<li>';
		echo '							<a href = "add_pdf.php" class = "nounderline" title = "Add a PDF">';
		echo '								<code class = "text-secondary"> Add a PDF </code>';
		echo '							</a>';
		echo '						</li>';
		echo '					</ul>';
		echo '				</div>';
	endif;
	
	if(!isset($_SESSION['user_id'])):
		require('login_form.inc.php');
	endif;
	echo '			</div>';
	echo '		</div>';
		?>
<?php
	if(isset($_SESSION['user_id'])){
		echo '	<div class = "row text-center">';
		echo '				<div class = "col">';
		echo '					<h6> Manage Your Account </h6>';
		echo '					<ul class = "list-unstyled list-inline">';
		echo '						<li class = "list-inline-item">';
		echo '							<a href = "renew.php" class = "nounderline" title = "Renew Your Account">';
		echo '								<code> Renew Your Account </code>';
		echo '							</a>';
		echo '						</li>';
		echo '						<li class = "list-inline-item">';
		echo '							<a href = "change_password.php" class = "nounderline" title = "Change Password">';
		echo '								<code> Change Password </code>';
		echo '							</a>';
		echo '						</li>';
		echo '						<li class = "list-inline-item">';
		echo '							<a href = "favorites.php" class = "nounderline" title = "View Your Favorites">';
		echo '								<code> Favorites </code>';
		echo '							</a>';
		echo '						</li>';
		echo '						<li class = "list-inline-item">';
		echo '							<a href = "recommentdations.php" class = "nounderline" title = "View Your Recommendations">';
		echo '								<code> Recommendations </code>';
		echo '							</a>';
		echo '						</li>';
		echo '						<li class = "list-inline-item">';
		echo '							<a href = "logout.php" class = "nounderline" title = "Log Out">';
		echo '								<code> Logout </code>';
		echo '							</a>';
		echo '						</li>';
		echo '					</ul> ';
		echo '				</div>';
		echo '  </div>';
	} 
		?>
		<div class = "row footer navbar navbar-fixed-bottom text-center">
			  <div class = "col">
				  <a href = "site_map.php" title = "Site Map"> Site Map |</a>
				  <a href = "policies.php" title = "Policies"> Policies |</a>
				  <code>&copy; <?php echo date("Y");?> All Rights Reserved | Designed By Photon &trade;</code>
			  </div>
		</div>
	</body>
</html>
