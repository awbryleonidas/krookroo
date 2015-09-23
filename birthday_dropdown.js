/**
* Name:  Birthday Dropdown Select
*
* Author:	Rossette Romilla
*			rlromilla_05@yahoo.com
*
* Created:  09.23.2015
*
* Description:  Create birthday dropdown programmatically
*
* Requirements: n/a
*
*/
/*JS File*/
var monthtext=['Month','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

function populatedropdown(monthfield, dayfield, yearfield){
	var today = new Date();
	var dayfield = document.getElementById(dayfield);
	var monthfield = document.getElementById(monthfield);
	var yearfield = document.getElementById(yearfield);
	
	dayfield.options[0]=new Option('Day', 1);

	for (var i=1; i<32; i++){
		dayfield.options[i]=new Option(i, i);
	}

	//	dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true) //select today's day
		
	for (var m=0; m<13; m++){
		monthfield.options[m]=new Option(monthtext[m], monthtext[m]);
	}
	//	monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month

	var thisyear=today.getFullYear()
	yearfield.options[0]=new Option('Year', thisyear);
	for (var y=1; y<40; y++){
		yearfield.options[y]=new Option(thisyear, thisyear);
		thisyear-=1;
	}
		
	//yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
}

/*Sample Function call*/
$(document).ready(function() {
	//populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
	window.onload=function(){
		populatedropdown("month", "day", "year")
	}
});

/*View file*/
<label class="col-md-12">Birthday</label>
<span class="col-md-4"><select id="month" class="form-control" name="month" value="<?php echo set_value('month')?>"></select></span>
<span class="col-md-4"><select id="day" class="form-control" name="day" value="<?php echo set_value('day')?>"></select></span>
<span class="col-md-4"><select id="year" class="form-control" name="year" value="<?php echo set_value('year')?>"></select></span>
