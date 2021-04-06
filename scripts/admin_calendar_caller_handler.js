	$(document).ready(function(){
  $("#calendar_caller").click(function(){
    var month = t_month+1;
    var year = t_year;
    var prefrence = $("#sent_prefrence").val()*1;
    var teacher = $("#sent_teacher").val()*1;
    var student = $("#sent_student").val()*1;
    grid_array = calendarBuilder(month, year);
    $("#place").load("scripts/lesson_getter.php", {
    		SentMonth: month,
    		SentYear: year,
    		SentPrefrence: prefrence,
    		SentTeacher: teacher,
    		SentStudent: student
		});
	  });

    $("#place").load("scripts/lesson_getter.php", {
            SentMonth: t_month+1,
            SentYear: t_year,
            SentPrefrence: -1,
            SentTeacher: 0,
            SentStudent: 0
        });
	});