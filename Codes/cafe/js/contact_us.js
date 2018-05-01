//For Street Address
app.controller('addrCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?address=true').then(function(response){
     $scope.addrData = response.data;
   });
});

//For Reservation Table
app.controller('reservationCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?reservation=true').then(function(response){
   		$scope.reservationData = response.data;
   });
});

