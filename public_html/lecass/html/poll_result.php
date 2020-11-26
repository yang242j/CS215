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
            <li><a id="recent" href="#recent">Recent Polls</a></li>
            <li>||</li>
            <li><a id="piechart" href="#piechart">Pie Chart</a></li>
            <li>||</li>
            <li><a href="votepage.php">Vote Page</a></li>
            <li>||</li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>

    <section class="Msection">
        <h1>Recent Polls Result</h1>
        <article class="Marticle">

            <table>
                <tr>
                    <td>
                        <img class="smallimg" src="../img/JohnDoe.jpg" alt="user img">
                    </td>
                    <td>
                        <h4>JohnDoe's Polls</h4>
                    </td>
                </tr>
            </table>

            <p>I don't know what to say, but this area is for recent polls from users.</p>

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

            <table>
                <tr>
                    <td>
                        <img class="smallimg" src="../img/JohnDoe.jpg" alt="user img">
                    </td>
                    <td>
                        <h4>JohnDoe's Polls</h4>
                    </td>
                </tr>
            </table>

            <p>I don't know what to say, but this area is for recent polls from users. </p>

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