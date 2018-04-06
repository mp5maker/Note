<?php if(isset($_SESSION['user_id'])): ?>
	<div class = "row text-center">
		<div class = "col">
			<h6> Manage Your Account </h6>
			<ul class = "list-unstyled list-inline">
				<li class = "list-inline-item">
					<a href = "/E-Commerce/renew-account" class = "nounderline" title = "Renew Your Account">
						<code> Renew Your Account </code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "/E-Commerce/change-password" class = "nounderline" title = "Change Password">
						<code> Change Password </code>
					</a>
				</li>
			<!-- 	<li class = "list-inline-item">
					<a href = "/E-Commerce/favorites" class = "nounderline" title = "View Your Favorites">
						<code> Favorites </code>
					</a>
				</li> -->
				<!-- <li class = "list-inline-item">
					<a href = "/E-Commerce/recommentdations" class = "nounderline" title = "View Your Recommendations">
						<code> Recommendations </code>
					</a>
				</li> -->
				<li class = "list-inline-item">
					<a href = "/E-Commerce/pdf" class = "nounderline" title = "View Our Popular PDFs">
						<?php 
							$query = "SELECT tmp_name, title, description, size, file_name FROM pdfs ORDER BY date_created DESC";
							$result = mysqli_query($dbc, $query);
							$number = mysqli_num_rows($result);
						?>
						<code>
							Popular
							<span class = "badge badge-dark"><?php echo $number; ?></span>
						</code>
					</a>
				</li>
				<li class = "list-inline-item">
					<a href = "/E-Commerce/logout" class = "nounderline" title = "Log Out">
						<code> Logout </code>
					</a>
				</li>
			</ul> 
		</div>
	</div>
<?php endif; ?>
	<div class = "row footer navbar navbar-fixed-bottom text-center">
		  <div class = "col">
			  <!-- <a href = "site_map.php" title = "Site Map"> Site Map |</a> -->
			  <!-- <a href = "policies.php" title = "Policies"> Policies |</a> -->
			  <code>&copy; <?php echo date("Y");?> All Rights Reserved | Designed By Photon &trade;</code>
		  </div>
	</div>
 </body>
</html>
