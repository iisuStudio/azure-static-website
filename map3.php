<!DOCTYPE html>
<html> 
	<head> 
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
		<title>臺北市公共廁所位置</title> 
		
		<style type="text/css">
		  html, body { height: 100%; margin: 0; padding: 0; }
		  #map { height: 100%; }
		</style>
	</head> 
<body>
		<?php
                	echo "HELO";

					
					// SQL Server Extension Sample Code:
					$connectionInfo = array("UID" => "iisu", "pwd" => ";stixx8072", "Database" => "NTU_Hackthon");
					$serverName = "ntuhackthon.database.windows.net";
					echo $serverName;
					
					$conn = sqlsrv_connect($serverName, $connectionInfo);
					if( $conn == false ) {
    					die( print_r( sqlsrv_errors(), true));
					}
					echo $conn;
                    
					$sql = "SELECT CompanyName,Longitude,Latitude FROM Restroom_Info";
					$stmt = sqlsrv_query( $conn, $sql );
					echo $sql;
					echo $stmt;
                    /*$response = "[";
					if( $stmt === fslse ){
						die( print_r( sqlsrv_errors(), true) );
					}*/
					while($row = sqlsrv_fetch_aray($stmt, SQLSRV_FETCH_ASSOC)){
						echo $row['CompanyName'].", ".$row['Longitude']."<br />";
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
                ?>;  

		

</body>
</html>										