<?php
include('index.php');
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div id="display_favorites">
    <?php
    //ini_set("display_errors", "1");
    //error_reporting(E_ALL);


    $favorites_id = $_POST['info'];

    $url ="http://beermapping.com/webservice/locquery/7764e1b0f4ec53aedba41045f531b82f/".$favorites_id."&s=json";
    //echo $url."<br>";

    require_once ('connection.php');


    //var_dump($result);
    // Closing
    curl_close($ch);

    $json = json_decode($response);

    $id = $json[0]-> id;
    $name = $json[0]-> name;
    $status = $json[0]-> status;
    $street = $json[0]-> street;
    $city = $json[0]-> city;
    $state = $json[0]-> state;
    $zip = $json[0]-> zip;
    $country = $json[0]-> country;
    $phone = $json[0]-> phone;
    $www = $json[0]-> url;

    //echo $id ."<br>".$name ."<br>".$status ."<br>".$street."<br>". $city ."<br>".$state ."<br>".$zip ."<br>".$country."<br>". $phone."<br>". $www;


    require_once('DB.php');


    $query = "INSERT INTO faves (id, title, street,city,state,zip,country,phone,www,stat) VALUES ('$id','$name','$street','$city','$state','$zip','$country','$phone','$www', '$status')";

    $check = mysqli_query($mysqli, $query);

//    if (!$check) {
//
//        include"stall.php";
//        die();
//    }


    $sql = "SELECT *"
        . "FROM faves"
    ;
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {


        echo "<table>"
            . "<tr>"
            . "<th><u>id</u></th>"
            . "<th><u>name</u></th>"
            . "<th><u>street</u></th>"
            . "<th><u>city</u></th>"
            . "<th><u>state</u></th>"
            . "<th><u>zip</u></th>"
            . "<th><u>country</u></th>"
            . "<th><u>phone</u></th>"
            . "<th><u>website</u></th>"
            . "<th><u>status</u></th>"
            . "</tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["id"] > 0 ){
            echo "<tr><td>" . $row["id"] . "</td>"
                . "<td>" . $row["title"] . "</td>"
                . "<td>" . $row["street"] . "</td>"
                . "<td>" . $row["city"] . "</td>"
                . "<td>" . $row["state"] . "</td>"
                . "<td>" . $row["zip"] . "</td>"
                . "<td>" . $row["country"] . "</td>"
                . "<td>" . $row["phone"] . "</td>"
                . "<td>" . $row["www"] . "</td>"
                . "<td>" . $row["stat"] . "</td></tr>";
        }}
        echo "</table>";
    } else {
        echo "No favorites!";
    }

    //query a row, and store the variable

    // Close connection
    $mysqli->close();
    ?>


</div> <!-- END OF display_favorites -->
</body>
</html>




