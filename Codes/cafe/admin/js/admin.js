//For Navigation
var app = angular.module('myApp', []);

app.run(function($rootScope, $http){  
//For Website Name
  $http.get('/cafe/admin/includes/settings.php?website=true').then(function(response){
    $rootScope.websiteData = response.data;
  });

//For Navigation 
  $http.get('/cafe/admin/includes/settings.php?navigation=true').then(function(response){
    $rootScope.navData = response.data;
  });
  
//For Logo 
  $http.get('/cafe/admin/includes/settings.php?logo=true').then(function(response){
    $rootScope.logoData = response.data;
  });

 ///For Brand 
  $http.get('/cafe/admin/includes/settings.php?brand=true').then(function(response){
    $rootScope.brandData = response.data;
  });

//For Footer
  $http.get('/cafe/admin/includes/settings.php?footer=true').then(function(response){
    $rootScope.footData = response.data;
  });

//For About
  $http.get('/cafe/admin/includes/settings.php?about=true').then(function(response){
    $rootScope.aboutData = response.data;
  });

//For Chart Options
  $http.get('/cafe/admin/includes/settings.php?chartoptions=true').then(function(response){
    $rootScope.chartOptData = response.data;
  });

//For Chart Data
  $http.get('/cafe/admin/includes/settings.php?chartdata=true').then(function(response){
    $rootScope.chartData = response.data;
    var data_length = response.data.rows.length;
    var chartInfo = new Array();
    for(var i = 0; i < data_length; i++){
	    for(var j = 0; j < $rootScope.chartData.rows[i].c.length; j++){
    		chartInfo.push([$rootScope.chartData.rows[i].c[j].v, $rootScope.chartData.rows[i].c[j].f]);
    		break;
	    }
    }
    $rootScope.chartInfo = chartInfo;
  });

//For Notice
  $http.get('/cafe/admin/includes/settings.php?notice=true').then(function(response){
    $rootScope.noticeData = response.data;
  });

//For Quotes
  $http.get('/cafe/admin/includes/settings.php?quote=true').then(function(response){
    $rootScope.quoteData = response.data;
  });

//For Service One
  $http.get('/cafe/admin/includes/settings.php?service1=true').then(function(response){
    $rootScope.serv1Data = response.data;
  });

//For Service Two
  $http.get('/cafe/admin/includes/settings.php?service2=true').then(function(response){
    $rootScope.serv2Data = response.data;
  });

//For Portfolio
  $http.get('/cafe/admin/includes/settings.php?portfolio=true').then(function(response){
    $rootScope.portData = response.data;
  });

//For Location
  $http.get('/cafe/admin/includes/settings.php?location=true').then(function(response){
    $rootScope.locationData = response.data;
  });

//For Home
  $http.get('/cafe/admin/includes/settings.php?home=true').then(function(response){
    $rootScope.homeData = response.data;
  });

//For Reason
  $http.get('/cafe/admin/includes/settings.php?reason=true').then(function(response){
    $rootScope.reasonData = response.data;
  });

//For Promotion
  $http.get('/cafe/admin/includes/settings.php?promotion=true').then(function(response){
    $rootScope.promoData = response.data;
  });

//For Menu
  $http.get('/cafe/admin/includes/settings.php?menu=true').then(function(response){
    $rootScope.menuData = response.data;
  });

//For SubMenu
  $http.get('/cafe/admin/includes/settings.php?submenu=true').then(function(response){
    $rootScope.submenuData = response.data;
  });

//For Company Address
  $http.get('/cafe/admin/includes/settings.php?address=true').then(function(response){
    $rootScope.addrData = response.data;
  });

//For Reservation
  $http.get('/cafe/admin/includes/settings.php?reservation=true').then(function(response){
    $rootScope.reservationData = response.data;
  });

//For Admin Powers
  $http.get('/cafe/admin/includes/settings.php?admin=true').then(function(response){
    $rootScope.adminData = response.data;
  });

//For Email Receiving
  $http.get('/cafe/admin/includes/settings.php?email=true').then(function(response){
    $rootScope.emailData = response.data;
  });
});

//Scrolls to the top
$(document).ready(function(){
  $('#scrollToTop').click(function(){
          $('html, body').animate({scrollTop : 0},800);
      });
//Get the brand display  
  $("#update_nav_icon").change(function(){
      $("#show_nav").attr('class', $(this).val());
  });

//Get the brand display  
  $("#select_brand").change(function(){
      $("#show_brand").attr('class', $(this).val());
  });

//Get the service icon display  
  $("#service_icon_1").change(function(){
      $("#show_service_one").attr('class', $(this).val());
  });

//Get the service icon display  
  $("#service_icon_2").change(function(){
      $("#show_service_two").attr('class', $(this).val());
  });

//Click to play the music player
  $("#audioplayer").click(function(){
      window.open('/cafe/admin/media/audioplayer.php', 'newwindow', 'width=320,height=170'); 
  });
});
