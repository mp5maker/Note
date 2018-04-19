<?php
$content = "<div class = 'row ml-1 mt-2'>
				<div class = 'col'>
					<h1>Welcome to our Coffee House!</h1>
					<p class = 'mb-0 text-secondary'>
						It is a classic and timeless coffee house located in the heart of
						Baily Road. We pride ourself on being social community meeting place.
						It is the place for you to eat and drink healthy 
					</p>
					<p class = 'mb-0 text-secondary'> 
						We're so glad you made it. Have a seat. Let me get you a fresh, hot cup o'Joe. Cream and Sugar?
						There you go.
					</p>
					<p class = 'mt-0 text-success'> 
						Please use links at the top to browse through our catalog. If you've been here before,
						you can find things you bookmarked by clicking on your <kbd>Wish List</kbd> and <kbd>Cart links</kbd>.
					</p>

					<h1>About Coffee Raid</h1>
					<p class = 'mt-0 text-secondary'> 
						Coffee Raid, Inc. has been selling coffee since <kbd>1991</kbd>. For years, Coffee Raid, Inc. has been
						prominently supporting the web developers.
					</p>
					<p class = 'mt-0 text-success'> 
						It is safe to shop here and you can also visit our shop.
					</p>
				</div>
			</div>
";
$content .= "<div class = 'row ml-1 mt-2'>
				<div class = 'thumbnail mr-2 card'>
					<img src = '/E-Commerce2/images/coffeeart.jpg' class = 'img-thumbnail img-responsive' height = '200' width = '200'/>
					<div class = 'caption'>
					 	We allow artists to enjoy the artwork
					</div>
				</div>
				<div class = 'thumbnail mr-2 card'>
					<img src = '/E-Commerce2/images/coffeespark.jpg' class = 'img-thumbnail img-responsive' height = '200' width = '200'/>
					<div class = 'caption'>
					 	Spark the day with refreshment!
					</div>
				</div>
				<div class = 'thumbnail mr-2 card'>
					<img src = '/E-Commerce2/images/coffeelove.jpg' class = 'img-thumbnail img-responsive' height = '200' width = '200'/>
					<div class = 'caption'>
					 	Friends, family and the loved ones!
					</div>
				</div>
				<div class = 'thumbnail mr-2 card'>
					<img src = '/E-Commerce2/images/coffeesplash.jpg' class = 'img-thumbnail img-responsive' height = '150' width = '200'/>
					<div class = 'caption'>
					 	Remembering the good old times!
					</div>
				</div>
			</div>
";
$content .= "<div class = 'row ml-3 mt-3'>
				<div>
					<h3>
						<a href = '/E-Commerce2/sales' class = 'nounderline'>Sale Items</a>
					</h3>
				</div>
			</div>
			<div class = 'row ml-3 mt-3'>
				<ul class = 'list-inline'>
		  ";
if(mysqli_num_rows($result)):
	while($row = mysqli_fetch_array($result)):
	$content .= "
				    <li class = 'thumbnail list-inline-item'>
						<a href = '/E-Commerce2/sales/' class = 'nounderline'>
							<img src = '/E-Commerce2/images/".$row['image']."' class = 'img-thumbnail img-responsive' height = '100' width = '100'/>
							<div class = 'caption'>
								".$row['sale_price']."
							</div>
						</a>
					</li>
	";
	endwhile;
endif;
$content .=	"
			 	</ul>
			</div>";