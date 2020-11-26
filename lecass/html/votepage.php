<?php 
session_start();

	// Open database
	$db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
	if ($db->connect_error)
	{
		die ("Connection failed: " . $db->connect_error);
	}
	else
	{
		$q1 = "SELECT * FROM Polls";
		$r1 = $db->query($q1);
	}

	// update all the selection to database
	
	$vote_dt = date("Y-m-d");
	
	if (isset($_POST["submitted"]) && $_POST["submitted"])
	{
		echo "1";
		$answer_id= $_POST["option"];
		$q4 = "UPDATE Answers SET vote_count=vote_count+1 WHERE answer_id='$answer_id'";
		$r4 = $db->query($q4);
	
		$q5 = "SELECT * FROM Answers WHERE answer_id='$answer_id'";
		$r5 = $db->query($q5);
	
		$answer = $r5->fetch_assoc();
		$poll_id = $answer["poll_id"];
	
	
		$q6 = "UPDATE Polls SET last_vote_dt='$vote_dt' WHERE poll_id='$poll_id'";
		$r6 = $db->query($q6);
	
		if ($r4 === true and $r6 === true)
		{
			header("Location: poll_result.php");
			$db->close();
			exit();
		}
	
		else
		{
			echo "vote failed";
			$db->close();
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/external.css">
</head>

<body class="Mbody">
    <header class="Mheader">
        <table>
            <tr>
                <td>
                    <img class="img" src="../img/logo.jpg" alt="logo">
                </td>
                <td>
                    <h1 class="Title">Welcome to micro-polling site voting page</h1>
                </td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
            <li><a href="../mainpage.php">Main Page</a></li>
            <?php if (!empty($_SESSION["user_id"])){ ?>
            <li>||</li>
            <li><a href="poll_managment.php">Managment Page</a></li>
            <?php } ?>
        </ul>
    </nav>
	    
	    <?php 
	    if ($r1->num_rows > 0) {
	    while ($poll = $r1->fetch_assoc()) {
			$q2 = "SELECT * FROM Polls JOIN Users ON Polls.user_id=Users.user_id WHERE poll_id=".$poll["poll_id"]."";
			$r2 = $db->query($q2);
			if ($r2->num_rows > 0){
				$poll = $r2->fetch_assoc();
		?>
	    <section class="Nsection">
	            <table>
	                <tr>
	                    <td>
	                        <img src="<?php echo $poll["avatar"]?>" width="130" height="80">
	                    </td>
	                    <td>
	                        <h3 class="Title"><?php echo $poll["screen_name"]?>'s Voting Question</h3>
	                        <p><b>Question: </b><?php echo $poll["question"];?></p>
	                    </td>
	                </tr>
	            </table>
	            
	            <form action="votepage.php" method="POST">
	                <input type="hidden" name="submitted" value="1"/>
	                <?php
					$q3 = "SELECT * FROM Answers WHERE poll_id=" .$poll["poll_id"]."";
					$r3 = $db->query($q3);
					if ($r3->num_rows > 0){
						while ($answer = $r3->fetch_assoc()){
					?>
	                <input type="radio" name="option" id="option" value="<?php echo $answer["answer_id"]?>"><?=$answer["answer"];?><br>
	                <?php }}?>
	              	<input type="submit" value="Submit">
	            </form>
	           
	        </section>
	 <?php }}}?>
	 
	<footer class="Mfooter">
        <p>© 2018 JK Yang All rights reserved.
        <a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate HTML5</a>
        </p>
    </footer>
    
</body>

</html>
