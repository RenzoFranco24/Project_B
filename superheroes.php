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
<p>
This page is all about the big superheroes from Marvel - including from the movies, TV shows, and comics!
</p>
<p>Here are some stats about various Marvel superheroes!</p>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM Superheroes";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'>";

        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'>";
 echo "<tr><th>ID</th><th>Name</th><th>Alias</th><th>Origin</th><th>Main Villain</th><th>Powers</th><th>First Appearance Date</th><th>First Appearance Comic</th><th>Delete</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Superhero_ID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Alias']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Place_of_origin']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Main_villain']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Powers']) . "</td>";
    echo "<td>" . htmlspecialchars($row['First_appearance_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['First_appearance_comic']) . "</td>";
    echo "<td><a href='delete_superhero.php?id=" . $row['Superhero_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
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

<h3>Renzo and Emma's tier list of best Marvel superheroes! (althought you know this already)</h3>
<p><strong>Renzo</strong></p>
<ol>
    <li>Iron Man</li>
    <li>Spider-Man</li>
    <li>Deadpool</li>
</ol>

<p><strong>Emma</strong></p>
<ol>
    <li>Daredevil</li>
    <li>Star-Lord</li>
    <li>Captain America (Steve Rogers)</li>
</ol>

<div class="superhero_pic">
    <img class="superhero_eachPic" src="https://static.wikia.nocookie.net/marvelcinematicuniverse/images/3/35/IronMan-EndgameProfile.jpg" height="300px">
    <img class="superhero_eachPic" src="https://wallpapers.com/images/hd/tobey-maguire-in-ripped-spider-man-suit-rmygo40cg51mli8m.jpg" height="300px">
    <img class="superhero_eachPic" src="https://static.wikia.nocookie.net/disney/images/1/11/Deadpool_-_Profile.jpg" height="300px">
    <img class="superhero_eachPic" src="https://static.wikia.nocookie.net/marveldatabase/images/a/aa/Daredevil_Vol_6_21_Textless.jpg" height="300px">
    <img class="superhero_eachPic" src="https://i.pinimg.com/736x/89/3a/c1/893ac1b31a89071e67cd29d552581e72.jpg" height="300px">
    <img class="superhero_eachPic" src="https://www.denofgeek.com/wp-content/uploads/2021/01/webstory-captain-america-cover03.jpg" height="300px">
</div>


 <?php
  echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>



</body>
 </html>
