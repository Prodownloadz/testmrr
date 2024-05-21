function validateFaq()

{


if(emptycheck("form4","txtName","Enter your Name")==false){return false;}

txtName=document.form4.txtName.value;

txtnamepattern=/^([a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}[ ][a-zA-Z]{2,35})$/;

if(!txtnamepattern.test(txtName)){

	alert("Please enter valid Name");

	return false;

}

if(emptycheck("form4","txtEmail","Enter your E-mail")==false){return false;}

if(emailcheck("form4","txtEmail","Invalid E-Mail")==false){return false;}

if(emptycheck("form4","txtQuestion","Enter your Question")==false){return false;}

if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}

	//alert("Message Successfully Sent...!");



}





function validateContact()

{



if(emptycheck("form5","txtName","Enter your Name")==false){return false;}

txtName=document.form5.txtName.value;

txtnamepattern=/^([a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}[ ][a-zA-Z]{2,35})$/;

if(!txtnamepattern.test(txtName)){

	alert("Please enter valid Name");

	return false;

}

if(emptycheck("form5","txtEmail","Enter your E-mail")==false){return false;}

if(emailcheck("form5","txtEmail","Invalid E-Mail")==false){return false;}

if(emptycheck("form5","txtPhone","Enter your Phone Number")==false){return false;}

txtPhone=document.form5.txtPhone.value;

txtPhone=txtPhone.replace(/^\s+|\s+$/g,'');

txtphonepattern=/^([(][0-9]{1,3}[)][ ][0-9]{3,5}[-][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,5}[ ][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,9}|\d{10}|\d{11}|[+][0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[-][0-9]{3}[-][0-9]{4}|[0-9]{1,5}[-][0-9]{3,20}|[0-9]{1,5}[ ][0-9]{3,20}|\+(?:[0-9] ?){6,14}[0-9]|[0-9]{3}[ ][0-9]{3}[ ][0-9]{4})$/;

if(!txtphonepattern.test(txtPhone)){

	alert("Please enter valid Phone Number");

	return false;

}	

if(emptycheck("form5","txtComments","Enter your Message")==false){return false;}
if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}
	// alert("Message Successfully Sent...!");

}



function validateDiscount()

{



if(emptycheck("form6","txtName","Enter your Name")==false){return false;}

txtName=document.form6.txtName.value;

txtnamepattern=/^([a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}[ ][a-zA-Z]{2,35})$/;

if(!txtnamepattern.test(txtName)){

	alert("Please enter valid Name");

	return false;

}

if(emptycheck("form6","txtEmail","Enter your E-mail")==false){return false;}

if(emailcheck("form6","txtEmail","Invalid E-Mail")==false){return false;}

if(emptycheck("form6","txtPhone","Enter your Phone Number")==false){return false;}

txtPhone=document.form6.txtPhone.value;

txtPhone=txtPhone.replace(/^\s+|\s+$/g,'');

txtphonepattern=/^([(][0-9]{1,3}[)][ ][0-9]{3,5}[-][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,5}[ ][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,9}|\d{10}|\d{11}|[+][0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[-][0-9]{3}[-][0-9]{4}|[0-9]{1,5}[-][0-9]{3,20}|[0-9]{1,5}[ ][0-9]{3,20}|\+(?:[0-9] ?){6,14}[0-9]|[0-9]{3}[ ][0-9]{3}[ ][0-9]{4})$/;

if(!txtphonepattern.test(txtPhone)){

	alert("Please enter valid Phone Number");

	return false;

}	

if(emptycheck("form6","txtProof","Attach Proof")==false){return false;}
if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}
	//alert("Attachment Submitted Successfully...!");



}





function validateEnquiry()

{



if(emptycheck("form1","txtName","Enter your Name")==false){return false;}

txtName=document.form1.txtName.value;

txtnamepattern=/^([a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}[ ][a-zA-Z]{2,35})$/;

if(!txtnamepattern.test(txtName)){

	alert("Please enter valid Name");

	return false;

}

if(emptycheck("form1","txtEmail","Enter your E-mail")==false){return false;}

if(emailcheck("form1","txtEmail","Invalid E-Mail")==false){return false;}

if(emptycheck("form1","txtCountry","Enter your Country")==false){return false;}

if(emptycheck("form1","drpState","Select State")==false){return false;}

drpState=document.form1.drpState.value;

drpstatepattern=/^0$/;

if(drpstatepattern.test(drpState)){

alert("Please Choose your State");

return false;

}

if(emptycheck("form1","txtPhone","Enter your Phone Number")==false){return false;}

txtPhone=document.form1.txtPhone.value;

txtPhone=txtPhone.replace(/^\s+|\s+$/g,'');

txtphonepattern=/^([(][0-9]{1,3}[)][ ][0-9]{3,5}[-][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,5}[ ][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,9}|\d{10}|\d{11}|[+][0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[-][0-9]{3}[-][0-9]{4}|[0-9]{1,5}[-][0-9]{3,20}|[0-9]{1,5}[ ][0-9]{3,20}|\+(?:[0-9] ?){6,14}[0-9]|[0-9]{3}[ ][0-9]{3}[ ][0-9]{4})$/;

if(!txtphonepattern.test(txtPhone)){

alert("Please enter valid Phone Number");

return false;

}

if(emptycheck("form1","txtSubject","Enter your Subject")==false){return false;}

if(emptycheck("form1","txtComments","Enter your Message")==false){return false;}

if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}

	//alert("Details sent Successfully..we will get back you soon..!");



}





function validateSample() {



if(emptycheck("form7","txtRequestorname","Enter Requestor Name")==false){return false;}

txtRequestorname=document.form7.txtRequestorname.value;

txtrequestornamepattern=/^([a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}|[a-zA-Z]{2,35}[ ][a-zA-Z]{2,35}[ ][a-zA-Z]{2,35})$/;

if(!txtrequestornamepattern.test(txtRequestorname)){

	alert("Please enter valid Requestor Name");

	return false;

}

if(emptycheck("form7","txtPhone","Enter your Phone Number")==false){return false;}

txtPhone=document.form7.txtPhone.value;

txtPhone=txtPhone.replace(/^\s+|\s+$/g,'');

txtphonepattern=/^([(][0-9]{1,3}[)][ ][0-9]{3,5}[-][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,5}[ ][0-9]{4,7}|[(][0-9]{1,3}[)][ ][0-9]{3,9}|\d{10}|\d{11}|[+][0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[ ][0-9]{4}[ ][0-9]{4}|[0-9]{3}[-][0-9]{3}[-][0-9]{4}|[0-9]{1,5}[-][0-9]{3,20}|[0-9]{1,5}[ ][0-9]{3,20}|\+(?:[0-9] ?){6,14}[0-9]|[0-9]{3}[ ][0-9]{3}[ ][0-9]{4})$/;

if(!txtphonepattern.test(txtPhone)){

	alert("Please enter valid Phone Number");

	return false;

}

if(emptycheck("form7","txtEmail","Enter your E-mail")==false){return false;}

if(emailcheck("form7","txtEmail","Invalid E-Mail")==false){return false;}

if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}

	//alert("Details submitted successfully..!");



}


function validateSubscribe() {

if(emptycheck("form25","txtEmail","Enter your E-mail")==false){return false;}
if(emailcheck("form25","txtEmail","Invalid E-Mail")==false){return false;}

	alert("Subscription added successfully..!");

}


function validateregisterform()
{
	if (grecaptcha.getResponse() == ""){
    alert("You can't proceed! Recaptcha requires Verification..");
    return false;
}
}