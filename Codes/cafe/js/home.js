//For Home 
app.controller('homeCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?home=true').then(function(response){
     $scope.homeData = response.data;
   });
});

//For Reason
app.controller('reasonCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?reason=true').then(function(response){
     $scope.reasonData = response.data;
   });
});

//For Promotion
app.controller('promoCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?promotion=true').then(function(response){
     $scope.promoData = response.data;
   });
});
