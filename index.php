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
        
        <form method="post">
            <!-- Weather Input   -->
            <fieldset class="form-group">
                <label for="city">Enter the name of a city</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Eg. Denver, Seattle">
            </fieldset>

            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
    
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="weatherScraper.js"></script>


</html>