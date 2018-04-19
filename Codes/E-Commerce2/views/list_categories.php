<?php
$content = '';
while($row = mysqli_fetch_array($result)):
$content .= "
	<div class = 'row ml-2 mt-2 mr-2 card'>
		<div class = 'col card-body'>
			<h4 class = 'card-title'>".$row['category']."</h4>
			<img src = '/E-Commerce2/images/".$row['image']."' width = '100' height = '100'/>
			<p class = 'card-text'>".$row['description']."</p>
			<a href = '/E-Commerce2/browse/".$type."/".urlencode($row['category'])."/".$row['id']."' class = 'card-link'>
				View all ".$row['category']." Products
			</a>
		</div>
	</div>
";
endwhile;
?>
