<?php
    session_start();

	//only allow access to this page if the user has successfullly logged in
	if (!isset($_SESSION["user_id"])) {
		header("Location: ../mainpage.php");
		exit();
	} 
	else
	{
        $validate = true;
        $error = "";
        $date = "yyyy-mm-dd";
        $reg_Date = "/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/";  
        
        if (isset($_POST["submitted"]) && $_POST["submitted"])
        {
            echo "<p>1</p>";
            $user_id = $_SESSION["user_id"];
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
                echo "<p>2</p>";
            }

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
            // check question length validation
            $questionLen = strlen($question);
            if($question == null || $question == "" || $questionLen > 100 )
            {
                $validate = false;
            }
            // check answer1 length validation
            $answer1Len = strlen($answer1);
            if($answer1 == null || $answer1 == "" || $answer1Len > 50 )
            {
            	$validate = false;
            }
            
            // ---------------------------------------------------------------------------------------------------
            
            if($validate == true)
            {
            	$open_dtFormat = date("Y-m-d", strtotime($open_dt));
            	$close_dtFormat = date("Y-m-d", strtotime($close_dt));
            	$created_dtFormat = date("Y-m-d");
            	
            	$q2 = "INSERT INTO Polls (user_id, question, created_dt, open_dt, close_dt) VALUES ('$user_id', '$question', '$created_dtFormat', '$open_dtFormat', '$close_dtFormat');";
            	$r2 = $db->query($q2);
            	echo "<p>5</p>";
            	$poll_id = $db->insert_id;
            	
            	if ($r2 === true)
            	{
            		if ($answer1 != NULL)
            		{
            			$q3 = "INSERT INTO Answers (poll_id, answer) VALUES ('$poll_id', '$answer1');";
            			$r3 = $db->query($q3);
            		}
            		if ($answer2 != NULL)
            		{
            			$q4 = "INSERT INTO Answers (poll_id, answer) VALUES ('$poll_id', '$answer2');";
            			$r4 = $db->query($q4);
            		}
            		if ($answer3 != NULL)
            		{
            			$q5 = "INSERT INTO Answers (poll_id, answer) VALUES ('$poll_id', '$answer3');";
            			$r5 = $db->query($q5);
            		}
            		if ($answer4 != NULL)
            		{
            			$q6 = "INSERT INTO Answers (poll_id, answer) VALUES ('$poll_id', '$answer4');";
            			$r6 = $db->query($q6);
            		}
            		if ($answer5 != NULL)
            		{
            			$q7 = "INSERT INTO Answers (poll_id, answer) VALUES ('$poll_id', '$answer5');";
            			$r7 = $db->query($q7);
            		}
            		header("Location: poll_managment.php");
            		$db->close();
            		exit();
            	}
            }
            else
            {
            	$error = "something went wrong";
            	$db->close();
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
                    <img class="img" src="<?=$_SESSION['avatar']?>" width="130" height="130"/>
                </td>
                <td>
                    <h1 class="Title">Welcome to <?=$_SESSION["screen_name"]?>'s micro-polling site Management page</h1>
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
    <form id="NewPoll" action="newpoll.php" method="POST">
<!-----------------------------------------------------------------FORM----------------------------------------------------------------------------------------------->
        <section class="Nsection2">
            <article class="Ncontainer">
                <h2 class="Nh2">Open &amp; Close Date/Time</h2>
                <div style="text-align: center;">
                    <!-------------------------------------Open & Close Date---------------------------------------->
                    <label for="date"><b>Open Date/Time</b></label>
                    <input class="Ninput" type="date" name="openD" placeholder="YYYY-MM-DD" id="openD">
                    <label id="openDT_msg" class="err_msg"></label>
                    <br>
                    <label for="date"><b>Close Date/time</b></label>
                    <input class="Ninput" type="date" name="closeD" placeholder="YYYY-MM-DD" id="closeD">
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

                <textarea class="Ninput" rows="5" cols="50" id="answer5" name="answer5" onkeyup="cal_words5()" placeholder="Enter your Answer5 here..."></textarea>
                <div><span id="num5">50</span> character remaining</div><br>
                <label id="answer5_msg" class="err_msg"></label><br>

                <input type="hidden" name="submitted" value="1"/>
                
                <input type="submit" value="submit">
                <input type="reset" value="reset">
                <!---------------------------------------------------------------------------------------------->
            </div>
        </section>
<!-----------------------------------------------------------------FORM----------------------------------------------------------------------------------------------->
    </form>
    <script type="text/javascript" src="../js/newpoll-r.js"></script>
</body>

</html>