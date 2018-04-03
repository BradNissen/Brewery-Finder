// https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false
// //code.jquery.com/jquery-1.11.0.min.js

var map;

// The JSON data
/*
var json =
    [{
        "id":48,
        "name":"Helgelandskysten",
        "longitude":"12.63376",
        "latitude":"66.02219"
    },
    {
        "id":46,
        "name":"Tysfjord",
        "longitude":"16.50279",
        "latitude":"68.03515"
    },
    {
        "id":44,
        "name":"Sledehunds-ekspedisjon",
        "longitude":"7.53744",
        "latitude":"60.08929"
    },
    {
        "id":43,
        "name":"Amundsens sydpolferd",
        "longitude":"11.38411",";
        "latitude":"62.57481"
    },
    {
        "id":39,
        "name":"Vikingtokt",
        "longitude":"6.96781",
        "latitude":"60.96335"
    },
    {
        "id":6,
        "name":"Tungtvann- sabotasjen",
        "longitude":"8.49139",
        "latitude":"59.87111"
    }];

*/

// GET THE JSON DATA
var jsonObj = "<?php  ?>";

//GET THE CITY LAT AND LNG


function initMap() {
    var center_lat = parseFloat("<?php echo $centered_lat?>");
    var center_lng = parseFloat("<?php echo $centered_lng?>");
    alert(center_lng);

    //var map_center = {lat: center_lat, lng: center_lng};

    // Giving the map som options
    var mapOptions = {
        zoom: 13,
        center: new google.maps.LatLng(center_lat,center_lng)
    };

    // Creating the map
    map = new google.maps.Map(document.getElementById('map'), mapOptions);


    // Looping through all the entries from the JSON data
    for(var i = 0; i < JSONBeerObject.length; i++) {

        // Current object
        var obj = JSONBeerObject[i];

        // Adding a new marker for the object
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(obj.lat,obj.lng),
            map: map,
            title: obj.name // this works, giving the marker a title with the correct title
        });

        // Adding a new info window for the object
        var clicker = addClicker(marker, obj.name);





    } // end loop


    // Adding a new click event listener for the object
    function addClicker(marker, content) {
        google.maps.event.addListener(marker, 'click', function() {

            if (infowindow) {infowindow.close();}
            infowindow = new google.maps.InfoWindow({content: content});
            infowindow.open(map, marker);

        });
    }


}

// Initialize the map
//google.maps.event.addDomListener(window, 'load', initMap);
