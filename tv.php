<!doctype html>
<?php
  $color = isset($_GET['color']) ? $_GET['color'] : 'red';

  $bg_color = isset($_GET['bg']) && $_GET['bg'] ? htmlspecialchars($_GET['bg']) : 'red';
 
$text = isset($_GET['text']) && $_GET['text'] ? htmlspecialchars($_GET['text']) : 'white';
$sort_order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'desc' : 'asc';
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'id';


?>
<?php
    include "nav.php";
?>
  <html>
   <head>
       <title>Renzo and Emma's Marvel Blog</title>
       <link rel="stylesheet" href="Marvel_Pookies.css">
   </head>
   <body>
    <h1>
        Welcome to the information section on Marvel superheroes!
    </h1>
<?php
echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>

<p>
Great, you scrolled down! You must (somewhat) care about my opinion! <br></br>
This is my tier list of Daredevil characters... might be a hot take. </p>
<?php
$items = ["Matt Murdock", "Frank Castle", "Benjamin Poindexter", "Foggy Nelson", "Ray Nadeem", "Karen Page"];

echo '<ol style="color: white;">';
foreach ($items as $item) {
    echo "<li>" . $item . "</li>"; 
}
echo "</ol>";
?>

<p> Here are my expectations... (and/or wants) </p>

<?php

function printList($items) {
    echo '<ul style="color: white; list-style-type: square;">';
    foreach ($items as $item) {
        echo "<li>" . $item . "</li>";
    }
echo "</ul>";
}
$plotPoints = [
    "Kingpin becomes the mayor - see what happens and how that impacts Karen, Foggy, and Matt.",
    "Matt Dripdock (iykyk).",
    "Have it tie into Spider-Man, since Kingpin is a villain of his.",
    "Have White Tiger in it as Daredevil's new foe.",
    "Have it be up to 13 episodes rather than the 18 they were planning for."
];
printList($plotPoints);
?>
<p>Here are some stats about various Marvel characters!</p>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT *  FROM TV_Shows";
$result = $connection->query($sql);


if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>TV_Show_ID</th>";
        echo "<th>Title</th>";
        echo "<th>Release Date</th>";
        echo "<th>Seasons</th>";
        echo "<th>Episodes</th>";
        echo "<th>Main Character</th>";
        echo "<th>Creator</th>";
        echo "<th>Comic based?</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['TV_Show_ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Released_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Seasons']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Episodes']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Main_character']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Creator']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Comic_based']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
} else {
    echo "Error executing query: " . $connection->error;
}
?>

</iframe>
</body>
 </html>

