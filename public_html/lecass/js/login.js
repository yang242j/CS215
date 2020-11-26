function LoginForm(event) {

    var elements = event.currentTarget;

    //declare variable a for the email value
    var a = elements[0].value;
    var b = elements[1].value;
    var result = true;

    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var password_v = /^(.*)?\d+(.*)?$/;
    var space_v = /^\S{2,}$/;

    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("password_msg").innerHTML = "";

    //email can not be empty or wrong format
    if (a == null || a == "" || !email_v.test(a)) {
        document.getElementById("email_msg").innerHTML = "Email is empty or invalid (example: cs215@uregina.ca)";
        document.getElementById("email").style.borderColor = "red";
        result = false;
    }

    //password can not be empty or less than 8 or having space
    if (b == null || b == "" || !password_v.test(b)) {
        document.getElementById("password_msg").innerHTML = "Password is empty or invalid (8 characters or longer, no spaces)";
        document.getElementById("password").style.borderColor = "red";
        result = false;
    }
    if (b.length < 8) {
        document.getElementById("password_msg").innerHTML = "Password must be 8 characters or longer";
        document.getElementById("password").style.borderColor = "red";
        result = false;
    }
    if (!space_v.test(b)) {
        document.getElementById("password_msg").innerHTML = "password must be no spaces";
        document.getElementById("password").style.borderColor = "red";
        result = false;
    }

    //prevent form to be submitted if one of above field is invalid		
    if (result == false) {
        event.preventDefault();
    }
}



