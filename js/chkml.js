// JavaScript Document


function validateNotEmpty( strValue ) {
   var strTemp = strValue;
   strTemp = trimAll(strTemp);
   if(strTemp.length > 0){
     return true;
   }
   return false;
}

function trimAll( strValue ) {
 var objRegExp = /^(\s*)$/;

    //check for all spaces
    if(objRegExp.test(strValue)) {
       strValue = strValue.replace(objRegExp, '');
       if( strValue.length == 0)
          return strValue;
    }

   //check for leading & trailing spaces
   objRegExp = /^(\s*)([\W\w]*)(\b\s*$)/;
   if(objRegExp.test(strValue)) {
       //remove leading and trailing whitespace characters
       strValue = strValue.replace(objRegExp, '$2');
    }
  return strValue;
}
//Check the text field is not empty End

function emptycheck(form,control,msg)
{	
	
	var formname=form;
	var msg = msg;
	var cnt=control;
	var doc=document.forms[formname];
	if(validateNotEmpty(doc.elements[cnt].value)==false)
	{
		alert("Please " + msg + " !");
		doc.elements[cnt].focus();
		return false;
	}
	return true;
}
function check_number_m(a,b) {
	e=a.value;
	ok = "1234567890.- ";

	for(i=0; i < e.length ;i++){
		if(ok.indexOf(e.charAt(i))<0){ 
		alert('Wrong value. Only number is allowed.'+a);
		a.focus();
		return (false);
		}	
	} 
	return true;
}
function check_number_m_array(e) {
	//e=a.value;
	ok = "1234567890. ";

	for(i=0; i < e.length ;i++){
		if(ok.indexOf(e.charAt(i))<0){ 
		alert('Wrong value. Only number is allowed.'+a);
		//a.focus();
		return (false);
		}	
	} 
	return true;
}
function check_number_integer(a,b) {
	e=a.value;
	ok = "1234567890 ";

	for(i=0; i < e.length ;i++){
		if(ok.indexOf(e.charAt(i))<0){ 
		alert('Wrong value. Only number is allowed.');
		a.focus();
		return (false);
		}	
	} 
	return true;
}
function emailcheck(form,control)
{
	var formname=form;
	
	var cnt=control;
	var doc=document.forms[formname];
	var e = doc.elements[cnt];
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
	var returnval=emailfilter.test(e.value);
	if (returnval==false){
	alert("Please enter a valid email address.");
	e.focus();
	}
	return returnval;

}

