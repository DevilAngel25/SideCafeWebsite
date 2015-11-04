<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SideWalk</title>
        <link rel="StyleSheet" href="../css/style.css" type="text/css">

        <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
        <script type="text/javascript" src="../javaScript/map.js"></script>  
    </head>
    <body onload="GetMap();">
      <div id='myMap' style="position:relative; width:400px; height:400px;"></div>
<?php
    error_reporting(1);
    require_once "connectioninfo.php";

    //azura connection string
    $connectionString = "Database=SidewalkCafes;Data Source=eu-cdbr-azure-north-a.cloudapp.net;User Id=bc60b77133bf77;Password=95fe3ea7";

    $connectionValues = ConnectionStringToArray($connectionString);

    // Create database connection
    $databaseConnection = new mysqli($connectionValues[DB_HOST], 
                                     $connectionValues[DB_USER], 
                                     $connectionValues[DB_PASSWORD], 
                                     $connectionValues[DB_NAME]);

    if ($databaseConnection->connect_error)
    {
        echo "<p>Database connection failed: $databaseConnection->connect_error</p>";
    }
    else
    {
?>
        <h1>Sidewalk Cafe Locations</h1>
		<p>This Map Displays the locations of Sidewalk Cafes around New York.</p>
         <table>
            <tr>
                <td>Location</td>
                <td>Lon</td>
                <td>Lat</td>
                <td>C4p</td>
            </tr>
<?php
        include "locationLonLat.php";

        $query = "SELECT Location FROM swc LIMIT 0, 1";
        $statement = $databaseConnection->prepare($query);
        $statement->execute();
        $statement->store_result();
        $statement->bind_result($location);
        while ($statement->fetch())
        {
            $lon = FindLon($location);
            $lat = FindLat($location);
            $cp = FindCP($location);

            echo "<td>$location</td>";
            echo "<td>$lon</td>";
            echo "<td>$lat</td>";
            echo "<td>$cp</td></tr>";
        }
        $statement->close();
        echo "</table>";
        $databaseConnection->close();
    }
?>
    </body>
</html>
