<?php

function alcholicDrinks(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?a=Alcoholic",
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

    // Storing the responses in the correct variable name
    $drinkId = $json['drinks'][0]['idDrink'];
    $drinkName = $json['drinks'][0]['strDrink'];
    // echo $drinkName . $drinkId;

    /*
    TO DO
    For loop for the alcholic and non-alcholic drinks
    return the drink names along with their corresponding ID
    Key-value pairs with ID and drink names
    Store key-value pairs in database so users can search for drinks by the name instad of ID number
    */
}

alcholicDrinks();