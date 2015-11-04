<?php
    require_once "connectioninfo.php";

    $location = $_GET["Location"];
    $streetAddress = $_GET["StreetAddress"];
    $phoneNumber = $_GET["PhoneNumber"];

    $connectionString = "Database=SidewalkCafes;Data Source=eu-cdbr-azure-north-a.cloudapp.net;User Id=bc60b77133bf77;Password=95fe3ea7";
    $connectionValues = ConnectionStringToArray($connectionString);
    // Create database connection
    $databaseConnection = new mysqli($connectionValues[DB_HOST], 
                                     $connectionValues[DB_USER], 
                                     $connectionValues[DB_PASSWORD], 
                                     $connectionValues[DB_NAME]);
    if (!$databaseConnection->connect_error)
    {
        $query = "INSERT INTO swc (Location, StreetAddress, CamisPhoneNumber) VALUES (?,?,?)";
        $statement = $databaseConnection->prepare($query);
        if ($statement)
        {
            $statement->bind_param('sss', $location, $streetAddress, $phoneNumber);
            $statement->execute();
            if (!$statement->execute())
            {
                echo "Database error".$databaseConnection->error;
            }
            $statement->store_result();
            $statement->close();
        }
        $databaseConnection->close();
    }
?>