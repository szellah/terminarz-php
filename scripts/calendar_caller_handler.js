	$(document).ready(function(){
  $("#calendar_caller").click(function(){
    var month = t_month+1;
    var year = t_year;
    grid_array = calendarBuilder(month, year);
    $("#place").load("scripts/lesson_getter.php", {
    		SentMonth: month,
    		SentYear: year
		});
	  });


    $("#place").load("scripts/lesson_getter.php", {
            SentMonth: t_month+1,
            SentYear: t_year
        });
	});