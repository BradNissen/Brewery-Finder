<?php

require_once ('DBconfig.php');

//access the database, naming it mysqli
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE_NAME, $DB_PORT);

//if the database dosent connect
if ($mysqli === FALSE) {
    //spit out the error
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    ?>