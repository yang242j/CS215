<?php 
session_start();

	$poll_id = $_GET['poll_id'];
	$db = new mysqli("localhost", "yang242j", "yjk1996", "yang242j");
	if ($db->connect_error){
		die ("Connection failed: " . $db->connect_error);
	}
	else {
		$q1 = "SELECT * FROM Polls ORDER BY last_vote_dt DESC LIMIT 5";
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
                    <img class="img" src="../img/logo.jpg" alt="logo">
                </td>
                <td>
                    <h1 class="Title">Welcome to micro-polling site Poll Result page</h1>
                </td>
            </tr>
        </table>
    </header>

    <nav class="nav">
        <ul>
        	<li><a href="../mainpage.php">Main Page</a></li>
        	<li>||</li>
            <li><a id="recent" href="#recent">Recent Polls</a></li>
            <li>||</li>
            <li><a id="piechart" href="#piechart">Pie Chart</a></li>
            <li>||</li>
            <li><a href="votepage.php">Vote Page</a></li>
            <li>||</li>
            <?php if (!empty($_SESSION["user_id"])) {?> 
            <li><a href="poll_managment.php">Poll Management</a></li>
            <li>||</li>
            <li><a href="logout.php">Log Out</a></li>
            <?php }?>
        </ul>
    </nav>

    <section class="Msection">
        <h1>Recent Polls Result</h1>
        
	    <?php 
	    if ($r1->num_rows > 0) {
	    while ($poll = $r1->fetch_assoc()) {
			$q2 = "SELECT * FROM Polls JOIN Users ON Polls.user_id=Users.user_id WHERE poll_id=".$poll["poll_id"]."";
			$r2 = $db->query($q2);
			if ($r2->num_rows > 0){
				$poll = $r2->fetch_assoc();
		?>
        
        <article class="Marticle">

            <table>
                <tr>
                    <td>
                        <img class="smallimg" src="<?php echo $poll["avatar"]?>" width="130" height="80">
                    </td>
                    <td>
                        <h4><?php echo $poll["screen_name"]?>'s Voting Question</h4>
                    </td>
                </tr>
            </table>

            <p><b>Question: </b><?php echo $poll["question"];?></p>

            <?php $q3 = "SELECT * FROM Answers WHERE poll_id=" .$poll["poll_id"]." ORDER BY vote_count DESC";
				$r3 = $db->query($q3);
				if ($r3->num_rows > 0)
				{ while ($answer = $r3->fetch_assoc()) {
			?>
							
            <div class="Mcontainer">
				<p><b>Vote Count: </b><?=$answer["vote_count"];?></p>
				<p><b>Answer: </b><?=$answer["answer"];?></p>
				<p><b>Created Date: </b><?=$poll["created_dt"];?></p>
            </div>
            
            <?php }} ?>

        </article>

        <br>
        <br>
       
       <?php }}}?>

    </section>

    <aside class="Maside">
        <h2 class="Mh2">Pie chart of each Polls</h2>
        <article class="Marticle">
            <h3>The pie chart of JohnDoe's Polls</h3>
            <div class="Mcontainer">
                <img src="../img/piechart1.png" alt="Polls_1_pie" style="width: 100%">
            </div>
        </article>
        <article class="Marticle">
            <h3>The pie chart of JohnDoe's Polls</h3>
            <div class="Mcontainer">
                <img src="../img/piechart2.png" alt="Polls_2_pie" style="width: 100%">
            </div>
        </article>
    </aside>

</body>

</html>