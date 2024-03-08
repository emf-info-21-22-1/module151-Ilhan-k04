$(document).ready(function(){

    $.getScript("./javascripts/helpers/dateHelper.js", function(){
        console.log("dateHelper chargé");
    });
    //chargé service http

    console.log("chargement calendrier");
    $('#calendar').evoCalendar({
        'theme': 'Orange',
		'language': 'fr',
		'firstDayOfWeek': 1,
		'todayHighlight': true,
		'sidebarDisplayDefault': false,
		'eventDisplayDefault': false,
		'eventHeaderFormat': 'dd MM yyyy'
    });
    
    if (typeof callback !== "undefined") {
		callback();
	}
})