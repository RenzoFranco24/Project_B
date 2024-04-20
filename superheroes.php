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

<a href = "https://www.reddit.com/r/marvelstudios/comments/1ac9qi4/new_hq_daredevil_born_again_set_pics/">here. </a></p>
<img style='border: 3px solid #660033' img src = "https://preview.redd.it/new-hq-daredevil-born-again-set-pics-v0-xs7u1gt67zec1.jpg?width=1080&crop=smart&auto=webp&s=aee671772af9d9758d4f351a9993c2ce3d6e71ae" alt="Charlie Cox as Matt Murdock.">
<img style='border: 3px solid #660033' img src = "https://preview.redd.it/new-hq-daredevil-born-again-set-pics-v0-hr54e3677zec1.jpg?width=1080&crop=smart&auto=webp&s=d92646666955bd1e53d814c5668c1364b1efc3f8" alt="Charlie Cox as Matt Murdock>">

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

$sql = "SELECT *  FROM Superheroes";
$result = $connection->query($sql);

if ($result) {
    //echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>Superhero_ID</th>";
        echo "<th>Name</th>";
        echo "<th>Alias</th>";
        echo "<th>Place_of_origin</th>";
        echo "<th>Main_villain</th>";
        echo "<th>First_appearance_date</th>";
        echo "<th>First_appearance_comic</th>";        
        echo "</tr>";    

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Superhero_ID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Alias']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Place_of_origin']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Main_villain']) . "</td>";
        echo "<td>" . htmlspecialchars($row['First_appearance_comic']) . "</td>";
        echo "<td>" . htmlspecialchars($row['First_appearance_date']) . "</td>";
        echo "</tr>";
    }
?>


<img src = "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/daf86b9d-0a99-4ec1-af43-2061b31977f8/dfhok4m-a84abe75-a321-4b04-98a8-65f046d9bdc7.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2RhZjg2YjlkLTBhOTktNGVjMS1hZjQzLTIwNjFiMzE5NzdmOFwvZGZob2s0bS1hODRhYmU3NS1hMzIxLTRiMDQtOThhOC02NWYwNDZkOWJkYzcuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.uP-1e863lVPQUQo9SCfJcYsn4dM8-0k9zSsdVnpneO8">
<h2>Kingpin loves the Mets</h2>
<iframe width="420" height = "315"
src="https://www.youtube.com/embed/8laEleUOoUM">
</iframe>
</body>
 </html>
