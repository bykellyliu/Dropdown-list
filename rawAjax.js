var ajax = new XMLHttpRequest(); // We create the HTTP Object

function getCitiesFromProvince() {
    var url = "cities_from_province.php"; // The server-side script
    var province = document.getElementById("provSelect").value;
    url += "?prov=" + escape(province);
    ajax.open("GET", url, true);
    ajax.onreadystatechange = handleHttpResponse;
    ajax.send(null);
}

function handleHttpResponse() {
    var cities;
    if (ajax.readyState == 4 && ajax.status == 200) {
        cities = ajax.responseText;

	// Split the tilde (or other character of your choice) delimited	
	// cities variable into an array
		cities = cities.substring(1).split("~");
       // Then add code that populates the cities drop-down list
		document.getElementById("citySelect").options.length=0;
		for (i =0; i< cities.length;i++)		
		  document.getElementById("citySelect").options[i] = new Option(cities[i], cities[i]);
    }
}
