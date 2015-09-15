// Wrote this for Hitachi Rail EU
// Place an element with the ID of cookie_div containing the message
// Along with an element with the ID of accept_cookie that can be clicked to hide the message forever (unless cookies are cleared)

function getCookies(cookie_name) {

    var cookies = document.cookie.split(';');

    for (var counter=0; counter < cookies.length; counter++) {

        var cookie = cookies[counter].split("=",2);
        var name = cookie[0].trim();
        var value = cookie[1];
        if (name == cookie_name) {
            return value;
        }
    }

    return false;
}


$(function() {
    var first_visit_cookie = getCookies("first_visit_cookie");

    if (first_visit_cookie == false) {
        $( "#cookie_div" ).show();
    }

    $( "#accept_cookie" ).click(function() {
        document.cookie="first_visit_cookie=true; expires=Fri, 31 Dec 9999 23:59:59 GMT;";
        $( "#cookie_div" ).hide();
    });
    
});