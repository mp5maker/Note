<?php 
$content = "
	<div class = 'row mt-2 ml-2 mb-2 mr-2'>
		<div class = 'col'>
			<h1 class = 'Add a Non-Coffee Product'></h1>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
			<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
			<form method = 'post' action = '/E-Commerce2/admin/add_goodies.php' enctype = 'multipart/form-data'>
				<input type = 'hidden' name = 'MAX_FILE_SIZE'  value = '524288'/>
				<h1>Add a Non-Coffee Product</h1>
				<p><code>Fill out the form to add a non-coffee product to the catalog.<br/> All fields are required</code></p>
				<div class = 'form-group'>
					<label for = 'category'>
						<strong> Category </strong>
					</label>
					<select name = 'category' id = 'category' class = 'form-control'/>
";
$query = "SELECT id, category FROM non_coffee_categories ORDER BY category ASC";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result, MYSQLI_NUM)):
	$content .= "<option value = '".$row[0]."'>".$row[1]."</option>";
endwhile;

if(array_key_exists('category', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['category']."</span>		
";
endif;

$content .= "
					</select>
				</div>
			";

$content .= "
				<div class = 'form-group'>
					<label for = 'name'> <strong> Name </strong></label>
					<input type = 'text' name = 'name' class = 'form-control'/>
			";

if(array_key_exists('name', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['name']."</span>		
";
endif;

$content .="
				</div>
			";

$content .= "
	<div class = 'form-group'>
		<label for = 'price'> <strong> Price </strong></label>
		<input type = 'text' name = 'price' class = 'form-control'/>
";

if(array_key_exists('price', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['price']."</span>		
";
endif;

$content .="
				</div>
			";

$content .= "
	<div class = 'form-group'>
		<label for = 'stock'> <strong> Stock </strong></label>
		<input type = 'text' name = 'stock' class = 'form-control'/>
";

if(array_key_exists('stock', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['stock']."</span>		
";
endif;

$content .="
				</div>
			";

$content .= "
	<div class = 'form-group'>
		<label for = 'description'> <strong> Description </strong></label>
		<textarea name = 'description' class = 'form-control'/></textarea>
";

if(array_key_exists('description', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['description']."</span>		
";
endif;

$content .="
				</div>
			";

$content .= "
	<div class = 'form-group'>
		<label for = 'image'> <strong> Image </strong></label>
		<input type = 'file' name = 'image' class = 'form-control'/>
";

if(array_key_exists('image', $add_product_errors)):
$content .= "
			<span class = 'text-danger'>".$add_product_errors['image']."</span>		
";
endif;

$content .="
				</div>
			";

$content .= "
				<input type = 'submit' class = 'btn btn-success' value = 'Add this Product'/>
			</form>
		</div>
	</div>
";
if(isset($success)):
	$content .= "
		<div class = 'row m-2'>
			<div class = 'col'>
				<p class = 'text-success'>".$success."</p>
			</div>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
			<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
		</div>
			";
endif;
?>