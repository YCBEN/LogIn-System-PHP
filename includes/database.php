<?php

    $dbhostName ="localhost";
    $dbUserName ="root";
    $dbPassword ="";
    $dbName ="phplogin";


    $conn = mysqli_connect($dbhostName,$dbUserName,$dbPassword,$dbName);



    if(!$conn){
        die('Connection Failed');
        
    }


?>