<!DOCTYPE html>
<html> 
	<head> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
		<title>臺北市公共廁所位置</title> 
		<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
		<style type="text/css">
		  html, body { height: 100%; margin: 0; padding: 0; }
		  #map { height: 100%; }
		</style>
	</head> 
<body>
		<div id="map"></div>
        <script type="text/javascript">
				//所有廁所標點紀錄
                /*var locations = <?php
                	

					// SQL Server Extension Sample Code:
					$connectionInfo = array("UID" => "iisu@ntuhackthon", "pwd" => ";stixx8072", "Database" => "NTU_Hackthon", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
					$serverName = "tcp:ntuhackthon.database.windows.net,1433";
					
					
					$conn = sqlsrv_connect($serverName, $connectionInfo);
					if( $conn === false ) {
    					die( print_r( sqlsrv_errors(), true));
					}
					$sql = "SELECT Count(Longitude)as count FROM Restroom_Info";
					$stmt = sqlsrv_query( $conn, $sql );
					
					$marker_num = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                    $marker_num = $marker_num['count'];
                    
					$sql = "SELECT CompanyName,Longitude,Latitude FROM Restroom_Info";
					$stmt = sqlsrv_query( $conn, $sql );
					
                    $response = "[";
					if( $stmt === fslse ){
						die( print_r( sqlsrv_errors(), true) );
					}
					while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
						$response = $response . '["' . $row['CompanyName'] . '",' . $row['Longitude'] . ',' . $row['Latitude'] . ',' . $marker_num . '],';
                        $marker_num = $marker_num-1;
					}
					
					$response = $response . "]";
                    echo $response;
					
                    /*$con = mysql_connect("mysql12.000webhost.com", "a3178580_NTUthon", "qaz123");
                    if (!$con)
                    {
                        die('Could not connect: ' . mysql_error());
                    }                
                    mysql_select_db("a3178580_NTUthon", $con);
                    mysql_query("set names utf8");*/

                    /*$result = mysql_query("SELECT CompanyName,Longitude,Latitude FROM Restroom_Info");
                    $response = "[";
                    $marker_num = mysql_fetch_array(mysql_query("SELECT Count(Longitude)as count FROM Restroom_Info"));
                    $marker_num = $marker_num['count'];
                    while($row = mysql_fetch_array($result))
                    {
                        $response = $response . '["' . $row['CompanyName'] . '",' . $row['Longitude'] . ',' . $row['Latitude'] . ',' . $marker_num . '],';
                        $marker_num = $marker_num-1;
                    }
                    $response = $response . "]";
                    echo $response;*/
                //?>;  

		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 16,
		  center: new google.maps.LatLng(25.017341, 121.539752),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;
                
		/*for (i = 0; i < locations.length; i++) {  
		  marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
			
		  });
		
		
		  google.maps.event.addListener(marker, 'click', (function(marker, i) {
			//marker.setIcon('Icons/toilet.png'); // set image path here...
			return function() {
			  infowindow.setContent(locations[i][0]);
			  infowindow.open(map, marker);
			}
		  })(marker, i));
		}*/
        </script>

</body>
</html>										