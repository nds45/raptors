<?php

function ordinaryDrinksToDB(){
    $curl = curl_init();
    $startTime = microtime(true);

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?c=Ordinary_Drink",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
            "x-rapidapi-key: 9a84606931mshdde29538ddf2f5ap15e6f6jsncd0b2c1872ef"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $json = json_decode($response, true);
    
    $arr = [];

    $db = new mysqli('localhost','root','','raptor');

    for ($count=0; $count < 100; $count++) { 
        $drinkId = $json['drinks'][$count]['idDrink'];
        $drinkName = $json['drinks'][$count]['strDrink'];

        $arr[$drinkId] = $drinkName;
        

        $result = $db->query("SELECT COUNT(*) FROM objectif");

        if (!empty($result) && $result->num_rows > 0){
            echo "Table is empty. Filling table with data";
            // This is where the drinkID and drink name will be sent to the database
            $sql = 'INSERT INTO "drinkInfo" (drinkID, drinkName) VALUES ($drinkId, $drinkName)';

        }else{
            echo "Table is not empty. Fetching data";
            // print_r($arr); // Do this for now due to time constraint
            $query = "SELECT * FROM drinkInfo";
            $row = mysql_fetch_array($query);
            echo $row;
        }
    }

    $endTime = microtime(true);
    $elapsedTime = $endTime - $startTime; 

    echo 'Time elapsed: ' . $elapsedTime . ' ms';
    // return $arr;

}

/*
TO DO
Store key-value pairs of the Drink ID and Drink Names from ordinaryDrinksToDB and cocktailsToDB in database so users can search for drinks by the name instad of ID number
Only store them if the database is empty
*/
function dbConnection(){
        
    $hostname = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'raptor';
    
    $connection = mysqli_connect($hostname, $user, $pass, $dbname);
    
    if (!$connection){
        echo "Error connecting to database: ".$connection->connect_errno.PHP_EOL;
        exit(1);
    }
    echo "Connection established to database".PHP_EOL;
    // return $connection;
}

// dbConnection();

ordinaryDrinksToDB();