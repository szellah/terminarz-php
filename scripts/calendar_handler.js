function getMonthLength(month, year){
		var d = new Date();
	  	d.setMonth(month);
	  	d.setFullYear(year);
	    d.setDate(0);
	    return d.getDate();
	}

function getMonthOffset(month,year){
		month--;
		var d = new Date();
	    d.setDate(1);
	    d.setMonth(month);
	    d.setFullYear(year);
	    return d.getDay()-1;
	}

function calendarBuilder(month, year){
		var offset = getMonthOffset(month,year);
		var month_length = getMonthLength(month,year);
		var weeks = Math.floor((offset+month_length)/7)+1;
	  	var calendar_length = weeks*7;

	  	var calendar = [];
	  	var week;
	  	var day;
	  	var i = 0;
	 	while(i<calendar_length)
	 	{
		 	week=[];
		  	for(j=0;j<7;j++){
		    	if(i<offset||i>=offset+month_length)
		        {
		        	day="";
		        }
		        else{
		        	day=(i-offset+1)+"";
		        }
		        week.push(day);
		        i++;
		}
	    calendar.push(week);
	  }
	  return calendar;
	}
