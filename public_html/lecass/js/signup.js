function SignUpForm(event) {

    var elements = event.currentTarget;

    //declare variable
    var a = elements[0].value; //Email
    var b = elements[1].value; //Name
    var c = elements[2].value; //DoB
    var e = elements[4].value; //Password
    var f = elements[5].value; //R_Password
    var result = true; //default result

    //variable equation
    var email_v = /^\w+@[a-zA-Z0-9_-]+?\.[a-zA-Z0-9_-]{2,3}$/;
    var name_v = /^[a-zA-Z0-9]+$/;
    var date_v = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/;
    var pwd_v = /^(\S*)?\d+(\S*)?$/;
    var space_v = /^\S{2,}$/;

    //default err_msg is empty
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("name_msg").innerHTML = "";
    document.getElementById("birthday_msg").innerHTML = "";
    document.getElementById("pwd_msg").innerHTML = "";
    document.getElementById("pwdr_msg").innerHTML = "";

    //Email address shoule be valid format
    if (a == null || a == "" || !email_v.test(a)) {
        document.getElementById("email_msg").innerHTML = "Email address shoule have valid format. Example: cs215@uregina.ca ";
        document.getElementById("email").style.borderColor = "red";
        result = false;
    }
    //Name should have no other non-word characters
    if (b == null || b == "" || !name_v.test(b)) {
        document.getElementById("name_msg").innerHTML = "Name should have no space or other non-word characters. Example: cs215 ";
        document.getElementById("name").style.borderColor = "red";
        result = false;
    }
    //Name should have no space
    if (!space_v.test(b)) {
        document.getElementById("name_msg").innerHTML = "Name must have no spaces. Example: cs215 ";
        document.getElementById("name").style.borderColor = "red";
        result = false;
    }
    //Date of birth should have proper format
    if (c == null || c == "" || !date_v.test(c)) {
        document.getElementById("birthday_msg").innerHTML = "Date of birth should have proper format. YYYY-MM-DD";
        document.getElementById("date").style.borderColor = "red";
        result = false;
    }
    //Password should have 8 characters long and at least one non-letter character
    if (e == null || e == "" || !pwd_v.test(e)) {
        document.getElementById("pwd_msg").innerHTML = "Invalid password format (8 characters long and at least one non-letter)";
        document.getElementById("pwd").style.borderColor = "red";
        result = false;
    }
    if (e.length < 8) {
        document.getElementById("pwd_msg").innerHTML = "password must be 8 characters or longer";
        document.getElementById("pwd").style.borderColor = "red";
        result = false;
    }
    if (!space_v.test(e)) {
        document.getElementById("pwd_msg").innerHTML = "password must be no spaces";
        document.getElementById("pwd").style.borderColor = "red";
        result = false;
    }
    //Verify comfirmed password should match with the password
    if (f == null || f == "" || f != e) {
        document.getElementById("pwdr_msg").innerHTML = "Comfirmed password should match with the password";
        document.getElementById("pwdr").style.borderColor = "red";
        result = false;
    }
    // Somting went wrong
    if (result == false) {
        event.preventDefault();
    }
}

function ResetForm() {
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("email").style.borderColor = "rgb(255, 153, 233)";
    document.getElementById("name_msg").innerHTML = "";
    document.getElementById("name").style.borderColor = "rgb(255, 153, 233)";
    document.getElementById("birthday_msg").innerHTML = "";
    document.getElementById("date").style.borderColor = "rgb(255, 153, 233)";
    document.getElementById("pwd_msg").innerHTML = "";
    document.getElementById("pwd").style.borderColor = "rgb(255, 153, 233)";
    document.getElementById("pwdr_msg").innerHTML = "";
    document.getElementById("pwdr").style.borderColor = "rgb(255, 153, 233)";
    if (window.confirm('OK to mainpage, Cancel to reset signup page')) {
        window.location.href = 'http://www2.cs.uregina.ca/~yang242j/lecass/mainpage.php';
    };
}