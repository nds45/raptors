<?php

function searchCocktails() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/search.php?i=".$_POST["drinkQuery"],
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

    $drinkName = $json['ingredients'][0]['strIngredient'];
    $drinkDescription = $json['ingredients'][0]['strDescription'];

    echo $drinkDescription;
}

searchCocktails();