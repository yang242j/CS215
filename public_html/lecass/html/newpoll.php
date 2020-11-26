<?php
    session_start();

	//only allow access to this page if the user has successfullly logged in
	if (!isset($_SESSION["user_id"])) {
		header("Location: ../mainpage.php");
		exit();
	} 
	else
	{
		$user_id = $_SESSION["user_id"];
        $screen_name = $_SESSION["screen_name"];
        $avatar = $_SESSION["avatar"];

        $validate = true;
        $error = "";
        $date = "yyyy-mm-dd";
        $reg_Date = "/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/";  
        
        echo "<p>0</p>";
        if (isset($_POST["submitted"]) && $_POST["submitted"])
        {
            echo "<p>1</p>";
            $open_dt = trim($_POST["openD"]);
            $close_dt = trim($_POST["closeD"]);
            $question = trim($_POST["question"]);
            $answer1 = trim($_POST["answer1"]);
            $answer2 = trim($_POST["answer2"]);
            $answer3 = trim($_POST["answer3"]);
            $answer4 = trim($_POST["answer4"]);
            $answer5 = trim($_POST["answer5"]);
    
            // load the database and get the name and img for this Users
            $db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
            if ($db->connect_error)
            {
                die ("Connection failed: " . $db->connect_error);
            }
            //take the screen name and avatar img out from database
            $q1 = "SELECT screen_name, avatar FROM Users WHERE user_id = '$user_id';";
            $r1 = $db->query($q1);	

            // check open date validation
            $Open_dtMatch = preg_match($reg_Date, $open_dt);
            if($open_dt == null || $open_dt == "" || $Open_dtMatch == false)
            {
                $validate = false;
            }
            // check close date validation
            $Close_dtMatch = preg_match($reg_Date, $close_dt);
            if($close_dt == null || $close_dt == "" || $Close_dtMatch == false)
            {
                $validate = false;
            }
            // check question validation
            $questionLen = strlen($password);
            if($question == null || $question == "" || $question. == false)
            {
                $validate = false;
            }

        }
    
    }
    

    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/external.css">
    <script type="text/javascript" src="../js/newpoll.js"></script>
</head>

<body class="Mbody">
    <header class="Mheader">
        <table>
            <tr>
                <td>
                    <img class="img" src="uploads/<?php echo $_FILES["fileToUpload"]["name"] ;?>" width="130" height="130" alt="user img">
                </td>
                <td>
                    <h1 class="Title">Welcome to <?=$screen_name?>'s micro-polling site Management page</h1>
                </td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
            <li><a href="logout.php">Log Out</a></li>
            <li>||</li>
            <li><a href="poll_managment.php">Back</a></li>
            <li>||</li>
            <li><a href="votepage.php">Vote Page</a></li>
            <li>||</li>
            <li><a href="poll_result.php">Poll Result</a></li>
        </ul>
    </nav>

    <section class="Nsection">
        <h1 class="Nh1">Creating New Polls</h1>
    </section>
    <form id="NewPoll" method="POST">
        <section class="Nsection2">
            <article class="Ncontainer">
                <h2 class="Nh2">Open &amp; Close Date/Time</h2>
                <div style="text-align: center;">
                    <!-------------------------------------Open & Close Date---------------------------------------->
                    <label for="date"><b>Open Date/Time</b></label>
                    <input class="Ninput" type="date" name="openD" placeholder="YYYY/MM/DD" id="openD">
                    <label id="openDT_msg" class="err_msg"></label>
                    <br>
                    <label for="date"><b>Close Date/time</b></label>
                    <input class="Ninput" type="date" name="closeD" placeholder="YYYY/MM/DD" id="closeD">
                    <label id="closeDT_msg" class="err_msg"></label>
                    <!---------------------------------------------------------------------------------------------->
                </div>
            </article>
        </section>

        <section class="Nsection">
            <h3 class="Nh2">Question to be asked (maximum 100 characters)</h3>
            <div style="text-align: center;">
                <!-------------------------------------Question------------------------------------------------->
                <textarea class="Ninput" rows="10" cols="50" id="question" name="question" onkeyup="cal_words()" placeholder="Enter your question here..."></textarea>
                <div><span id="num">100</span> character remaining</div><br>
                <label id="question_msg" class="err_msg"></label>
                <!---------------------------------------------------------------------------------------------->
            </div>
        </section>

        <section class="Nsection2">
            <h2 class="Nh2">Up to 5 possible answers</h2>
            <div style="text-align: center;">
                <!-------------------------------------Answers-------------------------------------------------->
                <textarea class="Ninput" rows="5" cols="50" id="answer1" name="answer1" onkeyup="cal_words1()" placeholder="Enter your Answer1 here..."></textarea>
                <div><span id="num1">50</span> character remaining</div><br>
                <label id="answer1_msg" class="err_msg"></label><br>

                <textarea class="Ninput" rows="5" cols="50" id="answer2" name="answer2" onkeyup="cal_words2()" placeholder="Enter your Answer2 here..."></textarea>
                <div><span id="num2">50</span> character remaining</div><br>
                <label id="answer2_msg" class="err_msg"></label><br>

                <textarea class="Ninput" rows="5" cols="50" id="answer3" name="answer3" onkeyup="cal_words3()" placeholder="Enter your Answer3 here..."></textarea>
                <div><span id="num3">50</span> character remaining</div><br>
                <label id="answer3_msg" class="err_msg"></label><br>

                <textarea class="Ninput" rows="5" cols="50" id="answer4" name="answer4" onkeyup="cal_words4()" placeholder="Enter your Answer4 here..."></textarea>
                <div><span id="num4">50</span> character remaining</div><br>
                <label id="answer4_msg" class="err_msg"></label><br>

                <textarea class="Ninput" rows="5" cols="50" id="answer5" name="answer1" onkeyup="cal_words5()" placeholder="Enter your Answer5 here..."></textarea>
                <div><span id="num5">50</span> character remaining</div><br>
                <label id="answer5_msg" class="err_msg"></label><br>

                <input type="submit" value="submit">
                <input type="reset" value="reset">
                <!---------------------------------------------------------------------------------------------->
            </div>
        </section>
    </form>
    <script type="text/javascript" src="../js/newpoll-r.js"></script>
</body>

</html>