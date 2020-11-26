function SignUpForm(event) {

    // This example treats all 4 input fields (Email, Username, Password, Confirm Password)
    // as elements of the event currentTarget.
    // Pay attention to SignUp-r.js since the form id is "SignUp".
    // You can also implement individual function to validate each input field
    // by modify the online lab6 website example "DOM2 Event Registration", 
    // therefore each input field is a function. For example, checkEmail(), CheckUsername(), CheckPswd(), CheckMatchPswd()




    var elements = event.currentTarget;

    //declare variable a for the email value

    var a = elements[0].value;

    // add code here to 
    // declare Username,Password and confirm 
    // Password as elements in event.curretTarget
    // for example: var b = elements[1].value
    var b = elements[1].value
    var c = elements[2].value
    var d = elements[3].value

    var result = true;

    // declare variables for valid input in regular expression for email, username and password

    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var Uname_v = /^[a-zA-Z0-9_-]+$/;
    var pswd_v = /^(\S*)?\d+(\S*)?$/;


    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("uname_msg").innerHTML = "";
    document.getElementById("pswd_msg").innerHTML = "";
    document.getElementById("pswdr_msg").innerHTML = "";


    //email can not be empty or wrong format
    if (a == null || a == "" || !email_v.test(a)) {
        document.getElementById("email_msg").innerHTML = "Email is empty or invalid(example: cs215@uregina.ca)";
        result = false;
    }




    // add code here to validate username	
    // if username is empty or wrong format, print "username is empty or invalid"
    if (b == null || b == "" || !uname_v.test(b)) {
        document.getElementById("uname_msg").innerHTML = "username is empty or invalid";
        result = false;
    }






    // add code here to validate password	
    // if password is empty, wrong format or != 8, print
    //"Invalid password format (8 characters long at least one non-letter)"

    if (c == null || c == "" || c.length != 8 || !pswd_v.test(c)) {
        document.getElementById("pswd_msg").innerHTML = "Invalid password format (8 characters long at least one non-letter)";
        result = false;
    }




    // add code here to validate confirmed password
    // password and confirmed password has to match


    if (d == null || d == "" || d != c) {
        document.getElementById("pswdr_msg").innerHTML = "password and confirmed password has to match";
        result = false;
    }




    //prevent form to be submitted if one of above field is invalid		
    if (result == false) {
        event.preventDefault();
    }
}

function ResetForm(event) {
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("uname_msg").innerHTML = "";
    document.getElementById("pswd_msg").innerHTML = "";
    document.getElementById("pswdr_msg").innerHTML = "";
}