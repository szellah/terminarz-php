
function passwordRegexButtonHandler(target, container, destination){

$(target).prop( "disabled", true );

  
  	var t = target;
  	var c = container;
    var d = destination;
  $(c).on("input",function(){
  	$(d).html("");
 
  	if(regexPasswordCheck(c,d)){
    $(t).prop( "disabled", false );
    $(".password_error_display").fadeOut(150);
    }
    else{
    $(t).prop( "disabled", true );
    $(".password_error_display").fadeIn(150);
    }
  
  
    
  });


}

function passwordCompleteButtonHandler(target, container1, container2, destination1, destination2){

$(target).prop( "disabled", true );

  
    var t = target;
    var c1 = container1;
    var c2 = container2;
    var d1 = destination1;
    var d2 = destination2;
  $(c1).on("input",function(){
    $(d1).html("");
    $(d2).html("");
 
    if(regexPasswordCheck(c1,d1)&compareFields(c1,c2,d2)){
    $(t).prop( "disabled", false );
    $(".password_error_display").fadeOut(150);
    }
    else{
    $(t).prop( "disabled", true );
    $(".password_error_display").fadeIn(150);
    }
  
  
    
  });

  $(c2).on("input",function(){
    $(d1).html("");
    $(d2).html("");
 
    if(regexPasswordCheck(c1,d1)&compareFields(c1,c2,d2)){
    $(t).prop( "disabled", false );
    $(".password_error_display").fadeOut(150);
    }
    else{
    $(t).prop( "disabled", true );
    $(".password_error_display").fadeIn(150);
    }
  
  
    
  });


}

function compareFields(x,y,destination) {
    if($(x).val() == $(y).val())
    {
        return true;
    }
    else
    {
        $(destination).append("Hasła się różnią<br>");
        return false;
    }
}


  
 function regexPasswordCheck(container,destination){
 	var c = container;
    var d = destination;
 	return regexSmallLetters(c,d) & regexBigLetters(c,d) & regexNumbers(c,d) & regexSigns(c,d) & regexLength(c,d);
 }
 

function regexCheck(container, destination, re, msg){

    	if($(container).val().search(re)==-1)
        {
        	$(destination).append(msg+"<br>");
            return false;
        }
        else
        {
        	return true;
        }
        

}


function regexSmallLetters (container,destination){
    	let pattern = /.*[a-ąćęłńóśżź]+.*/g;
    	return regexCheck(container,destination, pattern,"brak małych liter");
}

function regexBigLetters (container,destination){
    	let pattern = /.*[A-ZĄĆĘŁŃÓŚŻŹ]+.*/g;
    	return regexCheck(container,destination, pattern,"brak dużych liter");
}

function regexNumbers (container,destination){
    	let pattern = /.*[0-9]+.*/g;
    	return regexCheck(container,destination, pattern,"brak cyfr");
}

function regexSigns (container,destination){
    	let pattern = /.*([!#$%^&*()_\-+={}|\\/\"'?><.,;:\[\]])+.*/g;
    	return regexCheck(container,destination, pattern,"brak znaków interpunkcyjnych");
}

function regexLength (container,destination){
    	let pattern = /.{8,}/g;
    	return regexCheck(container,destination, pattern,"mniej niż 8 znaków");
}
