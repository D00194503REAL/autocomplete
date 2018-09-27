<html>
    <head>
        <TITLE>Search country</TITLE>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href="css/country.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/country.js" type="text/javascript"></script>
        <script src="js/county.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    </head>
    <body>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
        
        <h2>Search for country</h2>
        <div class='login'>


            <form method="post" action="map.php">
                <input type="text" id="search-box" placeholder="Country" name="country" AUTOCOMPLETE="off" />
                <br>
                <div id="suggesstion-box"></div>

                <br>

                <input class='animated' type='submit' value='Search'>
                </form>
        </div>

    

    <script  src="js/index.js"></script>
</body>
</html>