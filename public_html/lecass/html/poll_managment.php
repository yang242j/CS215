<?php
	session_start();
	if (!isset($_SESSION["user_id"])) {
		header("Location: ../mainpage.php");
		exit();
	} else {
		$user_id = $_SESSION["user_id"];
		$screen_name = $_SESSION["screen_name"];
		
		// load the database and get the orders for this user
		$db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
	  	if ($db->connect_error) {
	  		die ("Connection failed: " . $db->connect_error);
		}
	
		$q1 = "SELECT poll_id, question FROM Polls WHERE user_id = $user_id;";
		$r1 = $db->query($q1);	
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
                    <img class="img" src="../img/JohnDoe.jpg" alt="user img">
                </td>
                <td>
                    <h1 class="Title">Welcome to <?=$screen_name?>'s micro-polling site Management page</h1>
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
        <h1>Polls you have posted</h1>
        <article class="Marticle">
            <h2>Polls 1: 2018-10-01</h2>

            <p>I don't know what to say, but this area is for posted polls from the user.</p>

            <div class="Mcontainer">
                <p>The most liks</p>
                <p>Anonymous 1:</p>
                <p>2018-10-02</p>
                <p>John Doe saved us from a web disaster.</p>
            </div>

            <div class="Mcontainer">
                <p>Anonymous 2:</p>
                <p>2018-10-01</p>
                <p>No one is better than John Doe.</p>
            </div>

        </article>

        <br>
        <br>

        <article class="Marticle">
            <h2>Polls 2: 2018-09-01</h2>
            <p>I don't know what to say, but this area is for posted polls from the user.</p>

            <div class="Mcontainer">
                <p>The most likes</p>
                <p>Anonymous 1:</p>
                <p>2018-10-01</p>
                <p>John Doe saved us from a web disaster.</p>
            </div>

            <div class="Mcontainer">
                <p>Anonymous 2:</p>
                <p>2018-09-10</p>
                <p>No one is better than John Doe.</p>
            </div>

        </article>
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

</body>

</html>