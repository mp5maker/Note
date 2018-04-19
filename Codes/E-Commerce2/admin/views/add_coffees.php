<?php
$content = "
	<div class = 'row m-2'>
		<div class = 'col'>
			<h1> Add Specific Coffee </h1>
			<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
				<i class = 'icon-chevron-sign-left'></i>
				Go Back to Admin Page 
			</a>
			<form action = '/E-Commerce2/admin/add_coffees.php' method = 'post'>
				<div class = 'form-group'>
					<label for = 'category'><strong> Specific Coffee </strong></label>
					<select name = 'category' class = 'form-control'>
";
$query = "SELECT id, category FROM general_coffees ORDER BY category ASC";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result, MYSQLI_NUM)):
	$content .= "
		<option value = '".$row[0]."'>".$row[1]."</option>
	";
endwhile;
$content .= "
					</select>
				</div>
		   ";

$content .= "<table class = 'table table-responsive-sm'
				<thead>
					<tr>
						<th> Size </th>
						<th> Ground/Whole</th>
						<th> Caf./Decaf.</th>
						<th> Price </th>
						<th> Quantity in Stock </th>	
					</tr>
				</thead>
				<tbody>
			";
$query = "SELECT id, size FROM sizes ORDER BY id ASC";
$result = mysqli_query($dbc, $query);
$sizes = '';
while($row = mysqli_fetch_array($result, MYSQLI_NUM)):
	$sizes .= "<option value = '".$row[0]."'>".$row[1]."</option>";
endwhile;
$grinds = "
		<option value = 'ground'> Ground </option>
		<option value = 'whole'> Whole </option>
";

$caf_decaf = "
		<option value = 'caf'> Caffeinated </option>
		<option value = 'decaf'> Decaffeinated </option>
";

for($i = 1; $i <= $count; $i++):
$content .=  "		<tr>
						<td>
							<select name = 'size[".$i."]'>".$sizes."</select>
						</td>				
						<td>
							<select name = 'ground_whole[".$i."]'>".$grinds."</select>
						</td>
						<td>
							<select name = 'caf_decaf[".$i."]'>".$caf_decaf."</select>
						</td>
						<td>
							<input type = 'text' name = 'price[".$i."]'/>
						</td>
						<td>
							<input type = 'text' name = 'stock[".$i."]'/>
						</td>
					</tr>
			";
endfor;
$content .= "
				</tbody>
			</table>
";

$content .= "
				<input type = 'submit' value = 'Add These Products' class = 'btn btn-success'/>
			</form>
			";

if(isset($success)):
$content .= "
	<p class = 'text-success'>".$success."</p>
	<a href = '/E-Commerce2/admin/' class = 'nounderline'> 
		<i class = 'icon-chevron-sign-left'></i>
			Go Back to Admin Page 
	</a>
";
endif;

if(isset($failure)):
$content .= "
	<p class = 'text-danger'>".$failure."</p>
";
endif;

$content .= "
		</div>
	</div>	
";
