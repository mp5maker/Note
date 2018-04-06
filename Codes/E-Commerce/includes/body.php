<div class = "row page">
	<div class = "col-10 content my-2">
		  <?php if(isset($body)) echo $body;?>
	</div>
	<div class = "sidebar col-2 d-none d-sm-block">
		<div class = "my-2">
			<h4 class = "text-success bg-dark card title"> Manage Your Accounts</h4>
			<ul class = "list-unstyled card">
				<li>
					<a href = "/E-Commerce/renew-account" class = "nounderline" title = "Renew Your Account">
						<code class = "text-secondary"> Renew Account </code>
					</a>	
				</li>
				<li>
					<a href = "/E-Commerce/change-password" class = "nounderline" title = "Change Your Password">
						<code class = "text-secondary"> Change Password </code>
					</a>
				</li>
			<!-- 	<li>
					<a href = "/E-Commerce/favorites" class = "nounderline" title = "View Your Favorites">
						<code class = "text-secondary"> Favorites </code>
					</a>
				</li>
				<li>
					<a href = "/E-Commerce/recommendations" class = "nounderline" title = "View Your Recommendations">
						<code class = "text-secondary"> Recommendations </code>
					</a>
				</li> -->
				<li>
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
				<li>
					<a href = "/E-Commerce/logout" class = "nounderline" title = "Logout">
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
						echo '	<a href = "/E-Commerce/category/'.$row['id'].'" class = "nounderline" title = "'.$row['category'].'">';
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
					<a href = "/E-commerce/add-page" class = "nounderline" title = "Add a Page">
						<code class = "text-secondary"> Add a Page </code>
					</a>	
				</li>
				<li>
					<a href = "/E-Commerce/add-pdf" class = "nounderline" title = "Add a PDF">
						<code class = "text-secondary"> Add a PDF </code>
					</a>
				</li>
			</ul>
		</div>
		<?php endif; ?>
		<?php
			$login_access_pages = ['index', 'about', 'contact', 'register'];
		    $login_page = basename($_SERVER['PHP_SELF'],".php");
			if(!isset($_SESSION['user_id'])):
				if(in_array($login_page, $login_access_pages)):
					include('login_form.inc.php');
				endif;
			endif; 
		?>
	</div>
</div>
