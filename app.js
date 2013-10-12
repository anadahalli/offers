$(function() {
	
	//~ $('#bank, #city, #genre').prop('selectedIndex', -1);
	
	$('#offers').click(function() {
		
		var bank = $('#bank').val();
		var city = $('#city').val();
		var query = $('#genre').val();
		
		if (!bank || !city || !query)
			$('#results').text('Invalid options!');
		else {
			$('#results').text('Please wait...');
			$.get('offers.php', {'bank':bank, 'city':city, 'query':query}, function(data) {
				if (!data) $('#results').text('Something went wrong!');
				else {
					data = JSON.parse(data);
					$('#results').text('');
					if (query == 'special') {
						$('#results').append('<h2>Hot Offers!</h2>');
						for (var i = 0; i < data[0].length; i++)
							$('#results').append(data[0][i] + "<br><br>");
						$('#results').append('<hr>');
						$('#results').append('<h2>Latest Offers!</h2>');
						for (var i = 0; i < data[1].length; i++)
							$('#results').append(data[1][i] + "<br><br>");
					} else if (query == 'dining') {
						$('#results').append('<h2>Dining Offers!</h2>');
						for (var i = 0; i < data.length; i++)
							$('#results').append(data[i] + "<hr>");
					} else {
						$('#results').text('Something went wrong!');
					}
				}
			});
		}
	});
	
});
