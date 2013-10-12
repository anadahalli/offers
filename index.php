<!DOCTYPE html>
<html>
<head>
	<title>Offers!</title>
</head>
<body>
	<h1>Offers!</h1>
	<form>
		Bank
		<select id="bank">
			<option value="City">City Bank</option>
		</select>
		City
		<select id="city">
			<option value="Delhi / NCR">Delhi</option>
			<option value="Mumbai">Mumbai</option>
			<option value="Pune">Pune</option>
			<option value="Ahmedabad">Ahmedabad</option>
			<option value="Vadodara">Vadodara</option>
			<option value="Bengaluru">Bengaluru</option>
			<option value="Chennai">Chennai</option>
			<option value="Hyderabad">Hyderabad</option>
			<option value="Kolkata">Kolkata</option>
		</select>
		Genre
		<select id="genre">
			<option value="special">Specials</option>
			<option value="dining">Dining</option>
		</select>
		<input type="button" id="offers" value="Get Offers!">
	</form>
	<hr>
	<div id="results">
	</div>
	<script src="jquery-2.0.3.min.js"></script>
	<script src="app.js"></script>
</body>
</html>
