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

$sql = "SELECT * FROM Superheroes";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<form action='update_superhero.php' method='post'>";
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'>";
        echo "<tr><th>Superhero_ID</th><th>Name</th><th>Alias</th><th>Place_of_origin</th><th>Main_villain</th><th>First_appearance_date</th><th>First_appearance_comic</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Superhero_ID']) . "</td>";
            echo "<td><input type='text' name='Name[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['Name']) . "'></td>";
            echo "<td><input type='text' name='Alias[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['Alias']) . "'></td>";
            echo "<td><input type='text' name='Place_of_origin[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['Place_of_origin']) . "'></td>";
            echo "<td><input type='text' name='Main_villain[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['Main_villain']) . "'></td>";
            echo "<td><input type='text' name='First_appearance_date[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['First_appearance_date']) . "'></td>";
            echo "<td><input type='text' name='First_appearance_comic[" . $row['Superhero_ID'] . "]' value='" . htmlspecialchars($row['First_appearance_comic']) . "'></td>";
            echo "<td><button type='submit' name='update' value='" . $row['Superhero_ID'] . "'>Update</button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
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
