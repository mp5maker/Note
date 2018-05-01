<div class = 'row'>
	<div class = 'col-sm-3'>
		<div id = 'piechart_3d' class = 'ml-2'></div>
	</div>
	<div class = 'col-sm-6 text-center'>
		<h3 id = 'abouttitle'></h3>
		<p>
			<blockquote class = 'blockquote' id = 'aboutus'></blockquote>
        </p>
	</div>
	<div class = 'col-sm-3 text-center'>
		 <h3> Cafe Timing</h3>
		 <div id = 'open'></div>
		 <div id = 'close'></div>
		 <div id = 'notice' class = 'text-danger'></div>
		 <div id = 'description' class = 'text-danger'></div>
	</div>
</div>
<div class = 'bg-dark text-white' ng-controller = 'portCtrl'>
	<h3 class = 'text-center'>Portfolio</h3>
	<h4 class = 'text-center'>What our customers helped us to do</h4>
	<div class = 'row text-center '>
		<div class = 'col thumbnail' ng-repeat = 'p in portData'>
		    <img ng-src = '{{p.src}}' alt = 'p.alt' width = '500' height = '250'>
		    <div class = 'caption'>
		    	<p><strong>{{p.title}}</strong></p>
		    	<p>{{p.desc}}</p>
		    </div>
	  	</div>
	</div>
</div>
<div class = 'text-center bg-warning mb-0' ng-controller = 'servCtrl'>
	<h3 >What we offer</h3>
	<div class = 'row ml-2'>
		<div class = 'col' ng-repeat = 's1 in serv1Data'>
			<i class = '{{s1.icon}}'></i>
	      	<h4>{{s1.title}}</h4>
	      	<p>{{s1.desc}}</p>
	    </div>
	</div>
	<div class = 'row ml-2'>
		<div class = 'col' ng-repeat = 's2 in serv2Data'>
			<i class = '{{s2.icon}}'></i>
	      	<h4>{{s2.title}}</h4>
	      	<p>{{s2.desc}}</p>
	    </div>
	</div>
</div>
<div id = 'demo' class = 'carousel slide bg-dark text-white' data-ride = 'carousel' ng-controller = 'quoteCtrl'>
  <h4 class = 'text-center'> Famous Quotes! </h4>
  <ul class = 'carousel-indicators'>
    <li data-target = '#demo' data-slide-to = '0' class = 'active'></li>
    <div ng-repeat = 'n in quoteData'>
	    <li data-target = '#demo' data-slide-to = '{{quoteData.indexOf(n) + 1}}'></li>
	</div>
  </ul>
  <div class = 'carousel-inner'>
    <div class = 'carousel-item active'>
      	<blockquote class = 'blockquote text-center'>
      		<p class = 'mb-0'>To me, the smell of fresh-made coffee is one of the greatest inventions</p>
		    <footer class = 'blockquote-footer pb-3'> Hugh Jackman </footer>
      	</blockquote>
    </div>
    <div class = 'carousel-item' ng-repeat = 'q in quoteData'>
      	<blockquote class = 'blockquote text-center'>
      		<p class = 'mb-0'>{{q.quote}}</p>
		    <footer class = 'blockquote-footer pb-3'>{{q.name}}</footer>
      	</blockquote>
    </div>
  </div>
  <a class = 'carousel-control-prev' href = '#demo' data-slide = 'prev'>
    <span class = 'carousel-control-prev-icon'></span>
  </a>
  <a class = 'carousel-control-next' href = '#demo' data-slide = 'next'>
    <span class = 'carousel-control-next-icon'></span>
  </a>
</div>
<h3 class = 'text-center'> Our Location </h3>
<div id = 'map'></div>

<script async defer src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCPp6efMCO3TDYMKDEBrWYKb_ndl_CXgTs&callback=getLocation'></script>
<script src = '/cafe/js/index.js'></script>