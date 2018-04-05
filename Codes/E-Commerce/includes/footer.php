<?php if(isset($_SESSION['user_id'])): ?>
	<div class = "row text-center">
		<div class = "col">
			<h6> Manage Your Account </h6>
			<ul class = "list-unstyled list-inline">
				<li class = "list-inline-item">
					<a href = "renew.php" class = "nounderline" title = "Renew Your Account">
						<code> Renew Your Account </code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "change_password.php" class = "nounderline" title = "Change Password">
						<code> Change Password </code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "favorites.php" class = "nounderline" title = "View Your Favorites">
						<code> Favorites </code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "recommentdations.php" class = "nounderline" title = "View Your Recommendations">
						<code> Recommendations </code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "logout.php" class = "nounderline" title = "Log Out">
						<code> Logout </code>
					</a>
				</li>
			</ul> 
		</div>
	</div>
<?php endif; ?>
	<div class = "row footer navbar navbar-fixed-bottom text-center">
		  <div class = "col">
			  <a href = "site_map.php" title = "Site Map"> Site Map |</a>
			  <a href = "policies.php" title = "Policies"> Policies |</a>
			  <code>&copy; <?php echo date("Y");?> All Rights Reserved | Designed By Photon &trade;</code>
		  </div>
	</div>
 </body>
</html>
