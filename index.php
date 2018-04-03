<!DOCTYPE html>
<html>
<head>
    <title>CONNECT TO BEER DB</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>


<div id="wrapper">
    <h1> Brewery Finder!</h1>
    <form name="myForm" method="GET" action="map.php">

        <p>
            <label>City, State:</label>
                <input type="text" name="address" id="state_name" pattern="([A-Za-z]+(?: [A-Za-z]+)*),? ([A-Za-z]{2})" title="Brooklyn, NY or Sante Fe NM" >
                <input type="submit" value="Find Beer!">

        </p>
    </form>
    <form name="favoritesButton" action="favorites.php">


            <input type="submit" value="View Favorites!">
    </form>



</div> <!--  END OF Wrapper -->

</body>
</html>

