<?php
$content = "
	<nav class = 'navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom'>
	  <a class = 'navbar-brand' id = 'scrollToTop' href = '#'>
		<i class = 'icon-dashboard'></i>
	  </a>
	  <button class = 'navbar-toggler' type = 'button' data-toggle = 'collapse' data-target = '#navigation'>
	 		<span class = 'navbar-toggler-icon'></span>
	  </button>
	  <div id = 'navigation' class = 'collapse navbar-collapse'>
		  <ul class = 'navbar-nav mx-auto'>
		    <li class = 'nav-item'>
		    	<a href = '#common' class = 'nav-link'>Common</a>
		    </li>
		    <li class = 'nav-item'>
		    	<a href = '#index' class = 'nav-link'>Index</a>
		    </li>
		    <li class = 'nav-item'>
		    	<a href = '#home' class = 'nav-link'>Home</a>
		    </li>
		    <li class = 'nav-item'>
		    	<a href = '#menu' class = 'nav-link'>Menu</a>
		    </li>
		    <li class = 'nav-item'>
		    	<a href = '#contact' class = 'nav-link'>Contact</a>
		    </li>
  			<li class = 'nav-item'>
		    	<a href = '#administrative' class = 'nav-link'>Administrative</a>
		    </li>
			<li class = 'nav-item'>
		    	<a href = '/cafe/admin/includes/logout.php' class = 'nav-link'>
		    		<i class = 'icon-signout'></i>
		    		Log Out 
		    	</a>
		    </li>	
		    <li class = 'nav-item'>
		    	<a class = 'nav-link'>
			    	Signed in as ".$_SESSION['user']."
			    </a>
		    </li>
		    <li class = 'nav-item'>
		    	<a class = 'nav-link' id = 'audioplayer'>
		    		<i class = 'icon-music'></i>
		    	</a>
		    </li>	
		  </ul>
	  </div>
	</nav>
";