# Brewery-Finder

Final Project in Spring Quarter at North Seattle College.

On load up, the user is prompted to Enter a city, State. And that will have to be a correct format using HTML Regex form it has to be a 1 or two letter state followed by a 2 letter state which must be capital letters. example: Sante Fe, NM... or Brooklyn, NY. The Search then connects to the Googles's API with the Geolocation endpoint to obtain the latitude and longitude of the the entered location (if it exist).
If the place does exist, then I will connect to the BeerMapping.com's API go grab the names of any and all Breweries or brewpubs in within there database that has the same city and state of city and country(if its in the correct format- see above for formatting). Beermapping API will produce a JSON in an array, so I grab the length and the JSON array and perform a for loop displaying the markers and on the google maps Endpoint of there API. And also display the list of all the breweries in the DB. A Button is displayed next to the table in column 0, so the user can add a brewery their favortes list and view it later.
