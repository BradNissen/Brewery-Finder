<?php

//get the information from the entered city
include('geolocationConnection.php');
//echo '<h5>Geo-Location APIs URL --> '.$url.'</h5>';


//CITY --> Seattle
$city_geo = $city_name;
//echo "City = ".$city_geo. "<br><br>";

//STATE --> WA
$short_state_geo = $state_name_short;
//echo "State short = ".$short_state_geo. "<br><br>";

//STATE --> Washington
$long_state_geo = $state_name_long;
//echo "State long = ".$long_state_geo. "<br><br>";

//COUNTRY --> USA
$short_country_geo = $country_name_short;
//echo "Country short =".$short_country_geo. "<br><br>";

//COUNTRY --> United States of America
$long_country_geo = $country_name_long;
//echo "Country long = ".$long_country_geo. "<br><br>";

//Replace the spaces to format so we can search the other part of the API
$city_name = str_replace(" ", "+", $params[0]);
$city_name = strtolower($city_name);
//echo $city_name;

//Search the other part of the API
$url = "http://beermapping.com/webservice/loccity/7764e1b0f4ec53aedba41045f531b82f/".$city_name."&s=json";
//echo '<h5>Beer Mapping APIs URL --> '.$url.'</h5>';

//store them in an array
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);//Execute the request.
//var_dump($response);

curl_close($ch);

$json_output = json_decode($response);
//var_dump($json_output);

$object[] = new stdClass();
$id_array=array();
$post_data = array();
$j = 0;

$number_of_locations = sizeof($json_output);

echo "<table>";
echo "<tr>";
echo "<th>Add to Favorites?</th>";
echo "<th> ID </th>";
echo "<th> Name </th>";
echo "<th> City </th>";
echo "<th> State </th>";
echo "<th> Country </th>";
echo "<th> Address </th>";
echo "<th> phone </th>";
echo "<th> status </th></tr>";

for ($i = 0; $i < $number_of_locations; $i++) {
    //get out the state
    $id = $json_output[$i]->id;
    $state = $json_output[$i]->state;
    $country = $json_output[$i]->country;
    $status = $json_output[$i]->status;
    $name = $json_output[$i]->name;
    $street = $json_output[$i]->street;
    $zip = $json_output[$i]->zip;
    $address = $street.", ". $city_geo.", ". $short_state_geo.", ".$long_country_geo." ". $zip;
    $phone = $json_output[$i]->phone;

    //make sure its the right state, perhaps a same city name...
    if (($state === $short_state_geo || $state === $long_state_geo || $state === "") &&  ($status === "Brewpub" || $status === "Brewery")) {


        echo "<form action='favorites.php' method='POST'>";
        echo "<tr>";
        echo "<td><input type='submit' name='info' value='$id'></td>";
        echo "<td>" . $id . '</td>';
        echo "<td>" . $name . "</td>";
        echo "<td>" . $city_geo . "</td>";
        echo "<td>" . $state . "</td>";
        echo "<td>" . $country . "</td>";
        echo "<td>" . $address . "</td>";
        echo "<td>" . $phone . "</td>";
        echo "<td>".  $status . "</td></tr>";

       // echo sizeof($id_array) . "<br>";
        $id_array[$i] = $id;



        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $street . "," . $city_name . "," . $short_country_geo . "&key=AIzaSyB9yYVF8UqmNA56YB3Fh2RuyXqQHdLkifI";
        $url = str_replace(" ", "+", $url); //format the URL to work
        //echo '<h5>Geo-Location APIs URL --> ' . $url . '</h5>';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
        //var_dump($response);

        //Close the cURL handle.
        curl_close($ch);

        $response = json_decode($response);
        //var_dump($response);


        $lat = $response->results[0]->geometry->location->lat;
        //echo "Latitude= ".$lat . "<br>";


        $lng = $response->results[0]->geometry->location->lng;
        //echo "Longitude= ".$lng . "<br><br><br>";


        //create a JSON Object
        //$BeerObject = (object) [

        $object[$j]->id = $id;
        $object[$j]->name = $name;
        $object[$j]->street = $street;
        $object[$j]->city = $city_geo;
        $object[$j]->state = $short_state_geo;
        $object[$j]->country = $long_country_geo;
        $object[$j]->address = $address;
        $object[$j]->lat = $lat;
        $object[$j]->lng = $lng;

        $j++;

        //var_dump($object);

//
//        $post_data[$i] = array(
//            'id' => $id,
//            'name' => $name,
//            'street' => $street,
//            'city' => $city_geo,
//            'state' => $short_state_geo,
//            'country' => $long_country_geo,
//            'address' => $address,
//            'lat' => $lat,
//            'lng' => $lng
//
//        );



        //var_dump($post_data[$i]);
        //echo "<br>";



    }

}
echo "</table>";
//var_dump($object);

$var = json_encode($object);

$size = $j;
//$jsonData = json_encode($post_data);
//var_dump($post_data)."<br>";
//echo sizeof($post_data);
$count = sizeof($id_array);

?>