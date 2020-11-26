<?php
	session_start();
	if (!isset($_SESSION["user_id"])) 
	{
		header("Location: ../mainpage.php");
		exit();
	} 
	else 
	{	
		// load the database and get the question information for this user
		$db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
		echo "0";
	  	if ($db->connect_error) 
	  	{
	  		die ("Connection failed: " . $db->connect_error);
	  		echo "1";
		}
		else 
		{
			$q1 = "SELECT * FROM Polls WHERE user_id=" .$_SESSION["user_id"] ." ORDER BY created_dt DESC";
			$r1 = $db->query($q1);
			echo "2";
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
            <li><a id="posted" href="#posted">Posted Polls</a></li>
            <li>||</li>
            <li><a id="piechart" href="#piechart">Pie Chart</a></li>
            <li>||</li>
            <li><a href="votepage.php">Vote Page</a></li>
            <li>||</li>
            <li><a href="newpoll.php">Post a new Poll</a></li>
            <li>||</li>
            <li><a href="poll_result.php">Poll Result</a></li>
            <li>||</li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>

    <section class="Msection">
        <h1>Polls you have post</h1>
		<?php 
		if($r1->num_rows > 0)
				{
					while ($poll = $r1->fetch_assoc())
					{
		?>
						<article class="Marticle">
							<h2>Created Date: <?=$poll["created_dt"];?></h2>
							<p><b>Last vote date: </b><?=$poll["last_vote_dt"];?></p>
							
							<p><b>Question: </b><a href="votepage.php?poll_id=<?=$poll["poll_id"];?>"><?=$poll["question"];?></a></p>
							
							<?php $q2 = "SELECT * FROM Answers WHERE poll_id=" .$poll["poll_id"]."";
								$r2 = $db->query($q2);
								if ($r2->num_rows > 0)
								{
									while ($answer = $r2->fetch_assoc())
									{
							?>
										<div class="Mcontainer">
											<p><b>Vote Count: </b><?=$answer["vote_count"];?></p>
											<p><b>Answer: </b><?=$answer["answer"];?></p>
										</div>
							<?php 
									}
								}
							?>
						</article>
		<?php 
					}
				}   
    	?>

        
    </section>

    <aside class="Maside">
        <h2 class="Mh2">Pie chart of each Polls</h2>
        <article class="Marticle">
            <h3>The pie chart of Polls 1</h3>
            <div class="Mcontainer">
                <img src="../img/piechart1.png" alt="Polls_1_pie" style="width: 100%;">
            </div>
        </article>
        <article class="Marticle">
            <h3>The pie chart of Polls 2</h3>
            <div class="Mcontainer">
                <img src="../img/piechart2.png" alt="Polls_2_pie" style="width: 100%;">
            </div>
        </article>
    </aside>
	
    <footer class="Mfooter">
        <p>© 2018 JK Yang All rights reserved.
            <a class="linkText" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fwww2.cs.uregina.ca%2F~li787%2F">Validate
                HTML5</a>
        </p>
    </footer>
</body>

</html>