<?php

date_default_timezone_set('America/Denver');
$weather = "";
$error = "";

if ($_GET['city']) {


    $urlContents =  file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",&appid=0f0a9318513b5fa9f733cbd95ee17fd3");

    $weatherArray = json_decode($urlContents, true);

      if ($weatherArray['cod'] == 200) {
          $weather = "<b>The weather in ".$_GET['city']." is currently: <br></b>".$weatherArray['weather'][0]['description'];

          $temperatureInFahrenheit = intval(($weatherArray['main']['temp'] -273) * (9/5) + 32);

          $weather .= "<br>"." The temperature is currently: ".$temperatureInFahrenheit."&deg;F. ";

          $sunRise .= "<br>"."The sun will rise at: ".date("g:i a", ($weatherArray['sys']['sunrise']
))." (MST)";
          $sunSet .= "<br>"." The sun will set at: ".date("g:i a", ($weatherArray['sys']['sunset']
))." (MST)";

          $weather .= $sunRise .= $sunSet;

      } else {
          $error = "Sorry, We could not find the city you are looking for.";
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

    <div class="container" class="col-sm-12">
        <h1>What's The Weather?</h1>

        <form class="col-sm-12">
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

        <div class="col-sm-12" id="weather"><?php
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
    <!-- <script type="text/javascript" src="weatherScraper.js"></script> -->


</html>
