//For Navigation
var app = angular.module('myApp', []);
app.run(function($rootScope, $http){
  $http.get('/cafe/includes/settings.php?navigation=true').then(function(response){
    $rootScope.navData = response.data;
    for(var i = 0; i < $rootScope.navData.length; i++){
        if(window.location.pathname == $rootScope.navData[i].src){
          $rootScope.curPage = window.location.pathname;
        }
    }
  });
//For Website Site 
  $http.get('/cafe/includes/settings.php?website=true').then(function(response){
    $rootScope.webData = response.data;
  });

//For Logo 
  $http.get('/cafe/includes/settings.php?logo=true').then(function(response){
    $rootScope.logoData = response.data.src;
  });

//For Brand
  $http.get('/cafe/includes/settings.php?brand=true').then(function(response){
    $rootScope.brandData = response.data.src;
  }); 
  
//For Footer
  $http.get('/cafe/includes/settings.php?footer=true').then(function(response){
    $rootScope.footData = response.data;
  });
});


