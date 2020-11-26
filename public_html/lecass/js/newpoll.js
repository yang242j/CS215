function NewPollForm(event) {

    var elements = event.currentTarget;

    //declare variable
    var a = elements[0].value; //Open Date
    var b = elements[1].value; //Close Date
    var c = elements[2].value; //Question
    var d = elements[3].value; //Answer1
    var e = elements[4].value; //Answer2
    var f = elements[5].value; //Answer3
    var g = elements[6].value; //Answer4
    var h = elements[7].value; //Answer5
    var result = true; //default result

    //variable equation
    var date_v = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/;

    //default err_msg is empty
    document.getElementById("openDT_msg").innerHTML = "";
    document.getElementById("closeDT_msg").innerHTML = "";
    document.getElementById("question_msg").innerHTML = "";
    document.getElementById("answer1_msg").innerHTML = "";
    document.getElementById("answer2_msg").innerHTML = "";
    document.getElementById("answer3_msg").innerHTML = "";
    document.getElementById("answer4_msg").innerHTML = "";
    document.getElementById("answer5_msg").innerHTML = "";

    //open date (proper date format) a
    if (a == null || a == "" || !date_v.test(a)) {
        document.getElementById("openDT_msg").innerHTML = "Invalid Open Date format. Example: 2010-10-10";
        document.getElementById("openD").style.backgroundColor = "red";
        result = false;
    }
    //close date (proper date format) b
    if (b == null || b == "" || !date_v.test(b)) {
        document.getElementById("closeDT_msg").innerHTML = "Invalid Close Date format. Example: 2010-10-10";
        document.getElementById("closeD").style.backgroundColor = "red";
        result = false;
    }
    //question (non-blank; shorter than 100 characters) c
    if (c == null || c == "" || c.length > 100) {
        document.getElementById("question_msg").innerHTML = "Question should not be empty or larger than 100 characters";
        document.getElementById("question").style.backgroundColor = "red";
        result = false;
    }
    //answers (up to five; either blank or shorter than 50 characters) d
    if (d == null || d == "" || d.length > 50) {
        document.getElementById("answer1_msg").innerHTML = "Answer 1 should not be empty or larger than 50 characters";
        document.getElementById("answer1").style.backgroundColor = "red";
        result = false;
    }
    //answers (up to five; either blank or shorter than 50 characters) e
    if (e.length > 50) {
        document.getElementById("answer2_msg").innerHTML = "Answer 2 should not be larger than 50 characters";
        document.getElementById("answer2").style.backgroundColor = "red";
        result = false;
    }
    //answers (up to five; either blank or shorter than 50 characters) f
    if (f.length > 50) {
        document.getElementById("answer3_msg").innerHTML = "Answer 3 should not be larger than 50 characters";
        document.getElementById("answer3").style.backgroundColor = "red";
        result = false;
    }
    //answers (up to five; either blank or shorter than 50 characters) g
    if (g.length > 50) {
        document.getElementById("answer4_msg").innerHTML = "Answer 4 should not be larger than 50 characters";
        document.getElementById("answer4").style.backgroundColor = "red";
        result = false;
    }
    //answers (up to five; either blank or shorter than 50 characters) h
    if (h.length > 50) {
        document.getElementById("answer5_msg").innerHTML = "Answer 5 should not be larger than 50 characters";
        document.getElementById("answer5").style.backgroundColor = "red";
        result = false;
    }
    // Somting went wrong
    if (result == false) {
        event.preventDefault();
    }
}

function ResetForm() {
    document.getElementById("openDT_msg").innerHTML = "";
    document.getElementById("openD").style.backgroundColor = "white";
    document.getElementById("closeDT_msg").innerHTML = "";
    document.getElementById("closeD").style.backgroundColor = "white";
    document.getElementById("question_msg").innerHTML = "";
    document.getElementById("question").style.backgroundColor = "white";
    document.getElementById("answer1_msg").innerHTML = "";
    document.getElementById("answer1").style.backgroundColor = "white";
    document.getElementById("answer2_msg").innerHTML = "";
    document.getElementById("answer2").style.backgroundColor = "white";
    document.getElementById("answer3_msg").innerHTML = "";
    document.getElementById("answer3").style.backgroundColor = "white";
    document.getElementById("answer4_msg").innerHTML = "";
    document.getElementById("answer4").style.backgroundColor = "white";
    document.getElementById("answer5_msg").innerHTML = "";
    document.getElementById("answer5").style.backgroundColor = "white";
}

function cal_words() {
    var length = document.getElementById("question").value.length;
    document.getElementById("num").innerHTML = 100 - length;
}

function cal_words1() {
    var length = document.getElementById("answer1").value.length;
    document.getElementById("num1").innerHTML = 50 - length;
}

function cal_words2() {
    var length = document.getElementById("answer2").value.length;
    document.getElementById("num2").innerHTML = 50 - length;
}

function cal_words3() {
    var length = document.getElementById("answer3").value.length;
    document.getElementById("num3").innerHTML = 50 - length;
}

function cal_words4() {
    var length = document.getElementById("answer4").value.length;
    document.getElementById("num4").innerHTML = 50 - length;
}

function cal_words5() {
    var length = document.getElementById("answer5").value.length;
    document.getElementById("num5").innerHTML = 50 - length;
}