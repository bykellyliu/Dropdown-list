<?php
  # load all the lines in the text file into an array where each line is
  # an element in the array
  $myArray = file("province_city.txt");
  $province = $_GET["prov"];
  $result = "";

  # FILL IN THE REST OF THE CODE HERE
   foreach ($myArray as $city) {
        if (strstr($city, $province)) 		
		echo substr($city,strlen($province));
	}

  # send back the result(s) to the requesting client
  
?>


