<div class = "row page">
	<div class = "col-10 content my-2">
		  <?php if(isset($body)) echo $body;?>
	</div>
	<div class = "sidebar col-2 d-none d-sm-block">
		<div class = "my-2">
			<h4 class = "text-success bg-dark card title"> Manage Your Accounts</h4>
			<ul class = "list-unstyled card">
				<li>
					<a href = "renew" class = "nounderline" title = "Renew Your Account">
						<code class = "text-secondary"> Renew Account </code>
					</a>	
				</li>
				<li>
					<a href = "change-password" class = "nounderline" title = "Change Your Password">
						<code class = "text-secondary"> Change Password </code>
					</a>
				</li>
				<li>
					<a href = "favorites" class = "nounderline" title = "View Your Favorites">
						<code class = "text-secondary"> Favorites </code>
					</a>
				</li>
				<li>
					<a href = "recommendations" class = "nounderline" title = "View Your Recommendations">
						<code class = "text-secondary"> Recommendations </code>
					</a>
				</li>
				<li>
					<a href = "logout" class = "nounderline" title = "Logout">
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
		
		<?php if(isset($_SESSION['user_admin'])): ?>
		<div class = "my-2">
			<h4 class = "text-danger bg-dark card title"> Administration</h4>
			<ul class = "list-unstyled card">
				<li>
					<a href = "add_page.php" class = "nounderline" title = "Add a Page">
						<code class = "text-secondary"> Add a Page </code>
					</a>	
				</li>
				<li>
					<a href = "add_pdf.php" class = "nounderline" title = "Add a PDF">
						<code class = "text-secondary"> Add a PDF </code>
					</a>
				</li>
			</ul>
		</div>
		<?php endif; ?>
		<?php if(!isset($_SESSION['user_id'])){include('login_form.inc.php');} ?>
	</div>
</div>
<?php 