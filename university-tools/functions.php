<?php

function processDate($date) {
	$processed_date = explode('T', $date);
	return $processed_date;
}

function processEvents ($events_json) {
	$events_array = (Array) json_decode($events_json);

	$events = $events_array['events'];
	$formatted_events = [];
	$event_details = [];

	$event_details['Subject'] = "Subject";
	$event_details['StartDate'] = "Start Date";
	$event_details['StartTime'] = "Start Time";
	$event_details['EndDate'] = "End Date";
	$event_details['EndTime'] = "End Time";
	$event_details['Location'] = "Location";
	$event_details['Description'] = "Description";
	$formatted_events[] = $event_details;

	foreach ($events as $event) {
		$event_details = [];
		$start = processDate($event->StartTime);
		$end = processDate($event->EndTime);

		$event_details['Subject'] = $event->ModuleName . " " . $event->RoomsAsString . " " . $event->WeekNumber . "-"  . $event->WeekDay;
		$event_details['StartDate'] = $start[0];
		$event_details['StartTime'] = $start[1];
		$event_details['EndDate'] = $end[0];
		$event_details['EndTime'] = $end[1];
		$event_details['Location'] = $event->RoomsAsString; // Add .  " Bournemouth University" if needed for better location based things on phones
		$event_details['Description'] = $event->ModuleTypeName . " " . $event->LecturerNames;

		$formatted_events[] = $event_details;
	}

	//$headers = generateCSVHeaders($formatted_events); // See below for why we cant use this
	array_unshift($formatted_events, $headers);

	return $formatted_events;
}

/*
IF csv headers ever need to be generated, although due to the non conventional naming of the keys in the json object from the server,
google calendar wont be able to process these, therefore I have to manually set the correct named headers
EG: The location is called "RoomsAsString" which while it makes sense in the uni contenxt, no external calendar can figure out to associate with the location field
*/
function generateCSVHeaders ($formatted_events) {
	$event = $formatted_events[0];
	$headers = [];
	foreach ($event as $key => $value) {
		$headers[] = $key;
	}
	return $headers;
}

function eventsToCSV ($events) {

	$file =	fopen('php://output', 'w'); // OR if a file is needed locally: $file = fopen('calendar_items.csv', 'w');

	foreach ($events as $event_info) {
	    fputcsv($file, $event_info);
	}

	fclose($file);
}
