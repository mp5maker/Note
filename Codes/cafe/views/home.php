<div class = 'row ml-1 mt-2' ng-controller = 'homeCtrl'>
	<div class = 'col'>
		<h1>{{homeData.title1}}</h1>
		<p class = 'mb-0 text-secondary'>
			{{homeData.desc11}} 
		</p>
		<p class = 'mb-0 text-secondary'> 
			{{homeData.desc12}} 
		</p>
		<h1>{{homeData.title2}}</h1>
		<p class = 'mt-0 text-secondary'> 
			{{homeData.desc2}}
		</p>
	</div>
</div>
<div class = 'row ml-1 mt-2' ng-controller = 'reasonCtrl'>
	<div class = 'col-sm-3 thumbnail mr-2 card' ng-repeat = 'r in reasonData'>
		<img ng-src = '{{r.src}}' class = 'img-thumbnail img-responsive' height = '800' width = '400'/>
		<div class = 'caption'>
		 	{{r.desc}}
		</div>
	</div>
</div>
<div class = 'row ml-1 mt-2' ng-controller = 'promoCtrl'>
	<div class = 'col'>
		<h1> Offers </h1>
		<div ng-repeat = 'p in promoData' class = 'card m-2 p-3 rounded'>
			<img class = 'img-responsive card-img-top' ng-src = '{{p.src}}' height = '400'/>
			<div class = 'card-img-overlay text-center'>
				<button class = 'btn btn-success'> {{p.name}}</button>
			</div>
			<div class = 'card-header'>
				<h3> {{p.name}}</h3>
			</div>
			<div class = 'card-body'>
				<div class = 'card-title'>
				 	<h4>
				 		<p class = 'text-danger'><s> Price: {{p.price}}</s></p>
				 		<p class = 'text-success'> Offer: {{p.sale_price}}</p>
				 		<code>Offer Date: <strong>{{p.date_start}} to {{p.date_end}}</strong></code>
				 	</h4>	
				</div>
				<p class = 'card-text'>{{p.desc}}</p>
			</div>
		</div>
	</div>
</div>
<script src = '/cafe/js/home.js'></script>