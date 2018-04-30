# Brewery-Finder

Final Project for Web Application Development during Winter Quarter 2017-18 at North Seattle College.

On load up, the user is prompted to Enter a city, State. And that will have to be a correct format using HTML Regex form it has to be a 1 or two worded state followed by a 2 letter state which must be capital letters. example: Sante Fe, NM... or Brooklyn, NY. The Search then connects to the Googles's Geolocation API which sets the latitude and longitude of the the entered location (if it valid/exists) to be the map center.

If the location is valid/exist, then it will connect to the BeerMapping.com's API go grab the names of any and all Breweries or brewpubs  within there database that has the same city and state of city and country(if its in the correct format- see above for formatting). The Beermapping API will produces the JSON file which I pull in and read the information and pass if to the display page. So I grab the length and the JSON outputs; perform a for loop displaying the markers and on the google maps API endpoint of their locations, and display the information from the brewery I wanted and show it on the Google Map. A Button is displayed next to the table in column 0, so the user can add a brewery their favortes list and view it later.
