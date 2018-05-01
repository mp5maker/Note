//For Menu 
app.controller('menuCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?menu=true').then(function(response){
     $scope.menuData = response.data;
   });
//For Submenu 
   $http.get('/cafe/includes/settings.php?submenu=true').then(function(response){
     $scope.submenuData = response.data;
   });
});

