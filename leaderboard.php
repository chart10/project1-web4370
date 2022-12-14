<!-- Project 1: Christian Hart, Jamie Kouttu, Alex Diaz-->

<!-- This page should display a leaderboard of top scores of users-->

<?php

function leaderboard()
{
    $database = mysqli_connect('localhost', 'root', '', 'users');
    //if there is an error connecting to the database, stop the script and display the error
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $query = "SELECT username, topscore FROM users order by topscore desc";
    $result = mysqli_query($database, $query);

    if (mysqli_num_rows($result) > 0) {
        $rank = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            printf("
                <tr>
                    <td>%d</td>
                    <td>$%d</td>
                    <td>%s</td>
                </tr>",
                $rank,
                $row["topscore"],
                $row["username"]
            );
            $rank = $rank + 1;
        }
    }
}
?>
<!doctype html>
<html lang="en/us">
    <head>
        <link rel="stylesheet" href="style.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Leaderboard</title>
    </head>

    <body>
        <h1>Leaderboard</h1>
        <table class="leaderboard">
            <tr>
                <th><h1>Rank</h1></th>
                <th><h1>Score</h1></th>
                <th><h1>Username</h1></th>
            </tr>
            <?php
                leaderboard();
            ?>
        </table>
        <div class="footer">
            <ul>
                <li><a href="frontpage.php">Home</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="gameboard.php">Game Board</a></li>
                <li><a href="leaderboard.php">Leaderboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="credits.php">Credits</a></li>
            </ul>
        </div>
    </body>
</html>
