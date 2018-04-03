<?php

// extract the info from the index.php fields
$form_data = $_GET['address'];

// An empty field will redirect the page
if ($form_data === ""){
    http_redirect('index.html');
}

// separate them out by spaces
$params = explode(',', $form_data);
//var_dump($params);

############################# GOOGLE API CONNECTION                   st.address         city            state
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" .$params[0]. ",".$params[1]."&key=AIzaSyB9yYVF8UqmNA56YB3Fh2RuyXqQHdLkifI";
$url = str_replace(" ", "+", $url); //format the URL to work
//echo '<h5>Geo-Location APIs URL --> '.$url.'</h5>';

//
require_once ('connection.php');
//var_dump($response);

//Close the cURL handle.
curl_close($ch);

$json_output = json_decode($response);
//var_dump($json_output);

$centered_lat = $json_output->results[0]->geometry->location->lat;
//var_dump($centered_lat);

$centered_lng = $json_output->results[0]->geometry->location->lng;
//var_dump($centered_lng);

$formatted_address = $json_output->results[0]->formatted_address;

//Name of the city
$city_name = $json_output->results[0]->address_components[0]->long_name;

//get the length of the address_components outputs.
//its and array should be sizeof(address_components)

$length = sizeof($json_output->results[0]->address_components);
$stateIndex = -1;
$state_entered = $params[1];

//var_dump($length);
//var_dump($state_entered);

if (sizeof($state_entered) == 2) {
    strtoupper($state_entered);
}

//some states are in different locations on their API, So I need to search fro the state and get the index for each city in there API.
//The city name is always listed as the element in location at the [0] index

for ($i = 0; $i < $length; $i++) {

    $test_name_short = $json_output->results[0]->address_components[$i]->short_name;
    $test_name_long = $json_output->results[0]->address_components[$i]->long_name;

    //echo "[".$i . "] ". $test_name_short."<br>";
    //echo "[".$i . "] ". $test_name_long ."<br>";
    //echo "[".$i . "] ". $stateIndex . "<br>";

    // whether its "NY" or "New York"
    //WA should be index 2
    if ($test_name_short || $test_name_long === $state_entered) {
        $stateIndex = $i;
       //echo " index of state=".$stateIndex;
    }
}


//loop around and if the result output matched then set the city name to the short version.
$state_name_short = $json_output->results[0]->address_components[$stateIndex-1]->short_name;
$state_name_long = $json_output->results[0]->address_components[$stateIndex-1]->long_name;

//then set the country name too with a loop.
$country_name_short = $json_output->results[0]->address_components[3]->short_name;

$country_name_long = $json_output->results[0]->address_components[3]->long_name;
//echo $country_name_long."<br>";
?>