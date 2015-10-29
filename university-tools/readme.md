# Tomi University Calendar Converter

#### Background info

###### My university lecture timetable/calendar system is some strange proprietary thing which has the following issues:

* Data cannot be exported into any format.
* Despite the calendar not being specific to me (seeing as I have to apply a calendar, that is available for anyone to select and then view, to my account before accessing it) the calendar system requires me to log in. This along with the fact that my username has to be a long mix of letters and numbers is quite inconvenient.
* Sometimes (I have only been here a month) the timetable website has in invalid SSL certificate so unless I'm willing to add their cert as a trusted certificate I would be unable to access the site.
  * Even putting the issues of making them a trusted certificate authority, being the victim of a man in the middle attack when using this site would be quite inconvenient seeing as the password (and username) I have to use in order to access this site is the same as I have to use for literally every other digital service related to the uni, including remote access to all my files on their Windows server and the site on which I have to submit all my assignments... so having to occasionally trust random certificates is a risk I'd rather not take anymore.
* The site is pretty difficult to navigate on my phone, which is what I'd mostly access it on to see out my room numbers when I'm at uni wandering from room to room. (I can usually remember what time to get there each day, but not what rooms I'm in)
* I can't view the timetable on my watch (Pebble time). - This is actually a 'problem' that I retroactively discovered once I found out how amazing it is to be able to view this on my watch. Getting an alert 5 mins before the end of the lecture (or break) I'm in that pops up on my watch showing me what room I'm in next is incredibly convenient.

#### Solution:

In order to *circumvent* the issues outlined above, I decided that the best solution was to extract the data from the uni system, convert it (not sure why anyone creating a system for thousands of people would go out of their way to NOT use a normal standard or format.. but whatever...) then import it into my google calendar so I can access it very easily on my phone and also due to the naturally great Google calendar integration in android, also on my watch.

Once done I published the source code (its quite simple and only a few lines but it maybe useful to someone) and [I also made the the tool available online](http://tools.tomi33.co.uk/uni-calendar-converter/ "Calendar converter")

The tool is designed to just have the raw JSON calendar data pasted into it. This can be retrieved from the timetable system quite easily with just a touch of reverse engineering. I also may have created a tool using phantomJS that logs me into the system and grabs this data for me programatically, however the source code of this, or even its existence, I cannot release at the time for various reasons (breaking EULAs and that kind of stuff, plus various other university reasons which I will ramble about through some other medium)  

Once the raw data has been processed, the tool returns a formatted (google calendar compatible) csv file which can then be imported into Google calendar. (Calendars->settings->calendars->create calendar->import calendar)

###### Issues with my solution:

* While the one benefit of using the timetable system would be that it can be updated by the university, however this does not really matter for two simple reasons. Firstly so far once I have been notified on a different notice feed that my seminar was cancelled with no update every actually made to the timetable system. Secondly, when the system was actually updated the other time I, was sent an email regarding the change anyway the day before. This means that the fact that not getting the actual timetable system updates is acceptable to me.
