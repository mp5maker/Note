//For Charting Statistics
google.charts.load('current', {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
  $.getJSON('/cafe/includes/settings.php?chartdata=true', function(data){
      var chartData = new google.visualization.DataTable(data);
      $.getJSON('/cafe/includes/settings.php?chartoptions=true', function(data){
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(chartData, data);
        });
    });
} 

//For About Us 
$.getJSON('/cafe/includes/settings.php?about=true', function(data){
    $("#aboutus").html(data.desc);
    $("#abouttitle").html(data.title);
  });

//For Notice 
$.getJSON('/cafe/includes/settings.php?notice=true', function(data){
    $("#open").html("Open: " + data.open);
    $("#close").html("Close: " + data.close);
    $("#notice").html("Notice: " + data.notice);
    $("#description").html(data.description);
  }); 

//For Portfolio
app.controller('portCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?portfolio=true').then(function(response){
     $scope.portData = response.data;
   });
});

//For Services
app.controller('servCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?service1=true').then(function(response){
     $scope.serv1Data = response.data;
   });  

   $http.get('/cafe/includes/settings.php?service2=true').then(function(response){
     $scope.serv2Data = response.data;
   });
});

//For Quotes
app.controller('quoteCtrl', function($scope, $http){
   $http.get('/cafe/includes/settings.php?quote=true').then(function(response){
     $scope.quoteData = response.data;
   });
});

function getLocation(){
  var myLatitude;
  var myLongitude;

  $.getJSON('/cafe/includes/settings.php?location=true', function(data){
      map(data.lat, data.long);
    }); 
}

//For Google Map
function map(myLatitude, myLongitude){
  var LatLng = new google.maps.LatLng(myLatitude, myLongitude);
  var mapOptions = {
    zoom: 19,
    center: LatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var divMap = document.getElementById("map");
  map = new google.maps.Map(divMap, mapOptions);

  var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: "Marz's Cafe",
      clickable: true
    });
  var infoWindowOptions = {
    content: "Marz's Cafe: Wouldn't you like to have some coffee?",
    position: LatLng
  };
  var infoWindow = new google.maps.InfoWindow(infoWindowOptions);
  google.maps.event.addListener(marker, "click", function(){
    infoWindow.open(map);
  });
}


