<?php
    define('DB_NAME', 'Database');
    define('DB_USER', 'User Id');
    define('DB_PASSWORD', 'Password');
    define('DB_HOST', 'Data Source');

    // Break an Azure conenction string into an associative array containing the four parts

    function ConnectionStringToArray($connectionString)
    {
        $connectionArray = array();
        $parts = explode(";", $connectionString);
        foreach ($parts as $part)
        {
            $components = explode("=", $part);
            $connectionArray[$components[0]] = $components[1];
        }
        return $connectionArray;
    }
?>