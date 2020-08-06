<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<title>臺北市公共廁所位置</title> 
    <style>
        html, body { height: 100%; margin: 0; padding: 0; }
		#map { height: 100%; }
    </style>
  </head>
  <body>
  
    <div id="map"></div>
    
    <script>
    	//所有廁所標點紀錄
    	var locations = <?php
		// MSSQL Connect
		$connectionInfo = array(
		"UID" => "iisu@ntuhackthon", 
		"pwd" => ";stixx8072", 
		"Database" => "NTU_Hackthon", 
		"LoginTimeout" => 30, 
		"Encrypt" => 1, 
		"TrustServerCertificate" => 0);

		$serverName = "tcp:ntuhackthon.database.windows.net,1433";
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if( $conn === false ) {
    		die( print_r( sqlsrv_errors(), true));
		}
					
		//取得所有地點標記數量
		$sql = "SELECT Count(Longitude)as count FROM Restroom_Info";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt === fslse ){
			die( print_r( sqlsrv_errors(), true) );
		}
		$marker_num = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $marker_num = $marker_num['count'];
                    
        //取得地點相關資訊
		$sql = "SELECT CompanyName,Longitude,Latitude FROM Restroom_Info";
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt === fslse ){
			die( print_r( sqlsrv_errors(), true) );
		}
		$response = "[";
		while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			$response = $response . '["' . $row['CompanyName'] . '",' . $row['Longitude'] . ',' . $row['Latitude'] . ',' . $marker_num . '],';
            $marker_num = $marker_num-1;
		}
					
		$response = $response . "]";
        echo $response;
        ?>;
    	//地圖初始化
      	function initMap() {
        	var uluru = {lat: 25.047739, lng: 121.517040};//台北火車站
        	var map = new google.maps.Map(document.getElementById('map'), {
          		zoom: 17,
          		center: uluru
        	});
        	var infowindow = new google.maps.InfoWindow();

			//地點標記
			var marker, i;                
			for (i = 0; i < locations.length; i++) {  
		    	marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
		  		});
		
				//新增點擊icon事件->顯示相關地點資訊  	
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					marker.setIcon('Icons/toilet.png'); // set image path here...
					return function() {
			  			infowindow.setContent(locations[i][0]);
			  			infowindow.open(map, marker);
						}
					})(marker, i));
			}
      	}
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSwl5BEOgtJ76qr7JsziTMz0lJXpTcl3g&callback=initMap">
    </script>
  </body>
</html>