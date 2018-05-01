<div class = 'row ml-2' ng-controller = 'menuCtrl'>
	<div class = 'col'>
		<h1>Our Menu</h1>
		<div id = 'accordion'>
		  <div class = 'card' ng-repeat = 'm in menuData'>
		    <div class = 'card-header'>
		      	<a class = 'card-link' data-toggle = 'collapse' href = '#{{m.href}}'>
		        	<img ng-src = '{{m.src}}' class = 'img-responsive'/>
		        	<h3> {{m.name}} </h3>
		      	</a>
		    </div>
		    <div id = '{{m.href}}' class = 'collapse' data-parent = '#accordion'>
		      <div class = 'card-body'>
		         <div ng-if =  'm.id == sm.id' ng-repeat = 'sm in submenuData'>
		         	<img ng-src = '{{sm.src}}' class = 'img-responsive'/>
		         	<h4> {{sm.name}} </h4>
		         	<p> {{sm.desc}}</p>
		         </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
<script src = '/cafe/js/menu.js'></script>


