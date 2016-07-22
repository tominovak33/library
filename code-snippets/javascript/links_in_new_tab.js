// Make all EXTERNAL links on a page open in a new tab.

// How to use: 
// 1: (Optionally) Minify this file.
// 2: Include it in the bottom of your desired page(s) as a JS script. 

var links = document.querySelectorAll('a[href]');

[].forEach.call(links, function(link) {
	url_value = link.href

 if (url_value.indexOf(window.location.host) == -1) {
	link.setAttribute("target","_blank")
 } 
 
});
