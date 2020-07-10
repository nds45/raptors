<?php

function randomCocktail(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/random.php",
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

    curl_close($curl);

    $json = json_decode($response, true);

    // Storing the responses in the correct variable name
    $drinkId = $json['drinks'][0]['idDrink'];
    $drinkName = $json['drinks'][0]['strDrink'];
    $drinkCategory = $json['drinks'][0]['strCategory'];
    $drinkInstructions = $json['drinks'][0]['strInstructions'];
    $drinkThumbnail = $json['drinks'][0]['strDrinkThumb'];
    $drinkGlass = $json['drinks'][0]['strGlass'];


    $ingredientCount = 1;
    $measuringCount = 1;

    echo $drinkThumbnail, "\n", $drinkName, "\n", $drinkId, "\n", $drinkGlass, "\n";
    while ($json['drinks'][0]['strIngredient' . strval($ingredientCount)] != 'null' and $json['drinks'][0]['strMeasure' . strval($measuringCount)] != 'null') {
        echo $json['drinks'][0]['strMeasure' . strval($measuringCount)], $json['drinks'][0]['strIngredient' . strval($ingredientCount)], "\n";
        $ingredientCount += 1;
        $measuringCount += 1;
        if ($ingredientCount == 16 and $measuringCount == 16) {
            break;
        }
    }

    // Still need to return data onto the page
    echo $drinkInstructions;
}

randomCocktail();