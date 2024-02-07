<?php


try{
    //host
    define("HOST", "localhost");

    //dbName
    define("DBNAME", "your-db-name");

    //User
    define("USER", "your-username");

    //Password
    define("PASS", "your-password");


    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $Exception){

    echo $Exception->getMessage();
} 


    