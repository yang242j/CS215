function RegistrationForm(){

var warn="";
var rt=true;
var str_user_inputs = "";

//-- validate email --

var x=document.forms.SignUp.email.value;

if (x==null || x==""){

    warn +="The following fields must be filled out: \nEmail: \n";
    rt=false;
  
}
else if(x.length > 60){
   warn += "Max length for email is 60 characters.\n";
   rt =false;
}

else{ // if everything is okay, then collect email 
   
    str_user_inputs +="Email: "+x+"\n";

}




//-- validate Username --
// var y=document.forms.SignUp.uname.value;
//-- add code here:
var y=document.forms.SignUp.uname.value;

if (y==null || y==""){
    
    warn +="Username: \n";
    rt=false;
  
}
else if(y.length > 40){
   warn += "Max length for username is 40 characters.\n";
   rt =false;
}

else{
   
    str_user_inputs +="Username: "+y+"\n";

}





//-- validate password --
// var z=document.forms.SignUp.pswd.value;
//-- add code
var z=document.forms.SignUp.pswd.value;

if (z==null || z==""){
    
    warn +="Password: \n";
    rt=false;
  
}



else if (z.length != 8){
	   warn += "Password length is 8 characters.\n";
		   rt =false;
		}

else{
	   
    str_user_inputs +="Password: "+z+"\n";

}




//-- Confirm password --
var c=document.forms.SignUp.pswdr.value;
//-- add code

if (c==null || c==""){
    
    warn +="Confirm Password: \n";
    rt=false;
  
}



else if (z != c){
	   warn += "Confirm Password field has to match Password field.\n";
		   rt =false;
		}

var d=document.forms.SignUp.birthday.value;

if (d==null || d==""){

    warn +="Birthday: \n";
    rt=false;
  
}
else if(b.length > 10){
   warn += "Max length for email is 10 characters.\n";
   rt =false;
}

else{ // if everything is okay, then collect email 
   
    str_user_inputs +="Birthday: "+d+"\n";

}







//warning
if(rt==false){
  
  alert(warn);
  return false;

}
else{
  
  // display the user inputs:
  alert(str_user_inputs);

  // when return true, we send an HTTP request 
  // and call the .php at the server side
  // Here, we return false, and do not send an HTTP request 
  // to the server, since we haven't learn PHP yet.  
  
  return false; // should be: return true; when using PHP

}

}

