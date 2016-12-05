<?php

$weather = "";
$error = "";

if (array_key_exists('city', $_GET)) {
    
    $city = str_replace(' ', '', $_GET['city']);
    
    $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
    
    if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $error = "That City could not be found";
    } else {
    
    $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
    
    $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
        
    if (sizeof($pageArray) > 1) {
    
        $secondPageArray = explode('</span></span></span>', $pageArray[1]);
        
        if (sizeof($secondPageArray) > 1) {
            $weather = $secondPageArray[0];    
        } else {
            $error = "Sorry, we can't seem to get the weather for that city. Please try again later.";
        }
    } else {
        $error = "Sorry, we can't seem to get the weather for that city. Please try again later.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">

<title>Weather Scraper</title>
    
</head>

<body>

    <div class="container">
        <h1>What's The Weather?</h1>
        
        <form>
            <!-- Weather Input   -->
            <fieldset class="form-group">
                <label for="city">Enter the name of a city</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Eg. Denver, Seattle" value="<?php
                    if (array_key_exists('city', $_GET)) {
                        echo $_GET['city'];
                    }
                ?>">
            </fieldset>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <div id="weather"><?php
            if ($weather) {
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
            } else if ($error) {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; 
            }
        ?></div>
    
    </div>
    
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="weatherScraper.js"></script>


</html>