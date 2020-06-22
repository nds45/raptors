import requests
import json

def randomCocktail():
    url = 'https://the-cocktail-db.p.rapidapi.com/random.php'

    headers = {
        'x-rapidapi-host': 'the-cocktail-db.p.rapidapi.com',
        'x-rapidapi-key': '9a84606931mshdde29538ddf2f5ap15e6f6jsncd0b2c1872ef'
        }

    response = requests.request('GET', url, headers=headers)
    jsonResponse = json.loads(response.text)

    drinkId = jsonResponse['drinks'][0]['idDrink']
    drinkName = jsonResponse['drinks'][0]['strDrink']
    drinkCategory = jsonResponse['drinks'][0]['strCategory']
    drinkInstructions = jsonResponse['drinks'][0]['strInstructions']
    drinkThumbnail = jsonResponse['drinks'][0]['strDrinkThumb']
    drinkGlass = jsonResponse['drinks'][0]['strGlass']

    # print('Drink Name: ' + drinkName + '\nDrink Category: ' + drinkCategory + '\nDrink ID: ' + drinkId + '\nDrink Instructions: ' + drinkInstructions + '\nImage of the finished drink: ' + drinkThumbnail)
    print('Image of ' + drinkName + ': ' + drinkThumbnail)
    print('Drink Name: ' + drinkName)
    print('Drink category: ' + drinkCategory)
    print('Drink ID #: ' + drinkId)
    print('Type of glass for the drink: ' + drinkGlass)
    print()

    # Lists to store the ingredients and measurements for measuring the ingredients
    ingredientsList = []
    measuringList = []

    # Counter variable for going through the ingredients and measuring
    ingredientCount = 1
    measuringCount = 1

    # Ingredients and measuring instructions go up to 15
    # While ingredients != null && measuring != null -> append to ingredients and measuring lists accordingly
    while jsonResponse['drinks'][0]['strIngredient' + str(ingredientCount)] != 'null':
        ingredientsList.append(jsonResponse['drinks'][0]['strIngredient' + str(ingredientCount)])
        ingredientCount += 1
        if ingredientCount == 16:
            break

    while jsonResponse['drinks'][0]['strMeasure' + str(measuringCount)] != 'null':
        measuringList.append(jsonResponse['drinks'][0]['strMeasure' + str(measuringCount)])
        measuringCount += 1
        if measuringCount == 16:
            break

    # Need to remove the None value from the lists
    cleanIngredientsList = [] 
    for ingredients in ingredientsList: 
        if ingredients != None : 
            cleanIngredientsList.append(ingredients)

    cleanMeasuringList = [] 
    for measurements in measuringList: 
        if measurements != None : 
            cleanMeasuringList.append(measurements)
    
    # Merge both lists as a key-value pair (Measurements:Ingredients)
    combinedRecipeList = dict(zip(cleanMeasuringList, cleanIngredientsList))

    # Print the measurements with the ingredients
    print('Measurements')
    for recipes in combinedRecipeList:
        print(recipes + ' ' + combinedRecipeList[recipes])

    print('Drink instructions: ' + drinkInstructions)

randomCocktail()