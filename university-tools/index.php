<?php
require('functions.php');

if (isset($_POST['raw_events'])) {
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=university_calendar.csv');

	$events_json = $_POST['raw_events']; // or alternatively, use $events_json = file_get_contents("events.json"); instead of POST and remove the form below and the check for the POST var above

	$formatted_events = processEvents($events_json);
	eventsToCSV($formatted_events);
}

else {
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Tomi Calendar Converter</title>
		</head>
		<body>
			<form action="" method="POST">
				<textarea type="textarea" name="raw_events" rows="20" cols="100"></textarea>
				<br />
				<button type="submit">Convert Data</button>
			</form>
		</body>
	</html>
	<?php
}
