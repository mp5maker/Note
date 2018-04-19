var app = angular.module('myApp', []);

app.run(function($rootScope, $http) {
	$http.get("/E-Commerce2/includes/settings.php?index=true").then(function(response){
		$rootScope.indexURL = response.data.url;
	});
});

app.controller('nav', function($scope, $http){
	$http.get("/E-Commerce2/includes/settings.php?navlist=true").then(function(response){
		$scope.navlist = response.data;
	});
});

$(document).ready(function(){
	$.getJSON("/E-Commerce2/includes/settings.php?logo=true", function(data){
		$("img[alt='Logo']").attr('src', data.src);  
	});
});