$(function() {
	  $('#provSelect').change(function() {
	    $('#result').append('<img id="loading" src="../images/ajax-loader.gif" alt="Currently Loading" />');
	    var province= $('#provSelect').val();
	    $.ajax({
	      url: 'cities_from_province.php',
	      type: 'GET',
	      data: 'prov=' + province,
	      success: function(result) {
	        $('#citySelect')[0].options.length = 0;
	        var cityArray = result.split("~");
			for (index in cityArray) {
				var city = cityArray[index];
				if ($.trim(city) != "") {
					$("#citySelect").append($("<option/>", {
				        value: city,
				        text: city
				    }));
					
    			}
			}
	        $('#loading').fadeOut(500, function() {$(this).remove()});
	      }
	    });
	  });
	});
