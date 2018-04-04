	<div class = "sidebar col-2 d-none d-sm-block">
		<div class = "my-2">
			<h4 class = "text-success bg-dark card title"> Manage Your Accounts</h4>
			<ul class = "list-unstyled card">
				<li>
					<a href = "renew.php" class = "nounderline" title = "Renew Your Account">
						<code class = "text-secondary"> Renew Account </code>
					</a>	
				</li>
				<li>
					<a href = "change_password.php" class = "nounderline" title = "Change Your Password">
						<code class = "text-secondary"> Change Password </code>
					</a>
				</li>
				<li>
					<a href = "favorites.php" class = "nounderline" title = "View Your Favorites">
						<code class = "text-secondary"> Favorites </code>
					</a>
				</li>
				<li>
					<a href = "recommendations.php" class = "nounderline" title = "View Your Recommendations">
						<code class = "text-secondary"> Recommendations </code>
					</a>
				</li>
				<li>
					<a href = "logout.php" class = "nounderline" title = "Logout">
						<code class = "text-secondary"> Logout </code>
					</a>
				</li>
			</ul>
		</div>
		<div class = "my-2">
			<h4 class = "text-info bg-dark card title"> Content</h4>
			<ul class = "list-unstyled card">
				<?php 
					$dbc = mysqli_connect("localhost", "root", "", "ecommerce1")
						  or die("Server Denied");
					$query = "SELECT * FROM categories ORDER BY category";
					$result = mysqli_query($dbc, $query) or die ("Query Denied");
					while($row = mysqli_fetch_array($result)):
						echo '<li>';
						echo '	<a href = "category.php?id="'.$row['id'].' class = "nounderline" title = "'.$row['category'].'">';
						echo '		<code class = "text-secondary"> '.$row['category'].' </code>';
						echo '	</a>	';
						echo '</li>';
					endwhile;
				?>
			</ul>
		</div>
	</div>
</div>
