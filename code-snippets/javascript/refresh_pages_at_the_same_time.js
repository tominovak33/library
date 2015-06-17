// Paste this snippet into the js console of multiple different pages and press enter on both within as short an amount of time as possible.
// This will then refresh the pages at the same time within the amount of time (ms) specified as the 'time_limit' variable.
//
// Note: due to the simple way the code is written, there is a small chance that the refresh will not happen at the same time if, this chance gets greater the longer you leave between executing the code on the different pages)
// The greater the time_limit variable is, the less likely this will be. Howerver that also means waiting longer for the refreshes to happen.

var time_limt = 15000; //Max time until refresh happens

var when_to_run = Math.ceil(Date.now()/time_limt)*time_limt; //Get the nearest upcoming timestamp that is a multiple of the time specified above

var time_delay = (when_to_run - Date.now()); //Find out how long it is from now until the time found above

//Refresh the window at the timestamp (variable: when_to_run) using the delay found above
setTimeout(function(){ 
	//alert(Date.now()); 
	window.location.reload(true);
}, time_delay);