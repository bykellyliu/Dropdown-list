<?php
  $myArray = file("province_city.txt");
  sort($myArray);
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Canada</title><meta charset="utf-8" />	
    <script type="text/javascript"  src="rawAjax.js"></script>

  </head>
	<body style = "font-family: arial, sans-serif">
    <table>
      <tr>
        <td>Province:</td>
        <td>
          <select id="provSelect" onchange="getCitiesFromProvince()">
            <?php
              $aProv = "";
              foreach ($myArray as $provCity) {
                if (preg_match("/[~]/", trim($provCity))) {
                  // remove newline character from end of line
                  $provCity = chop( $provCity );
                  // make $province first string and $city second string
                  list($province, $city) = explode("~", $provCity, 2);
                  if ($aProv != $province) {
                    echo "<option value='$province'>" . $province . "</option>"; 
                    $aProv = $province;
                  }
                }
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>City:</td>
        <td>
          <select id="citySelect">
            <?php
              foreach ($myArray as $provCity) {
                if (preg_match("/^Alberta/", trim($provCity))) {
                  // remove newline character from end of line
                  $provCity = chop( $provCity );
                  // make $province first string and $city second string
                  list($province, $city) = explode("~", $provCity, 2);
                  echo "<option>" . $city . "</option>"; 
                }
              }
            ?>
          </select>
        </td>
      </tr>
		</table>
	</body>
</html>
