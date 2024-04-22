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
        Welcome to the information section on Marvel villains!
    </h1>
<p>
This page is all about the big bads from Marvel - including from the movies, TV shows, and comics! <br></br>
PSA: Marvel needs to stop killing off their villains - let them live for longer than a movie or two!
</p>
<p>Here are some stats about various Marvel villains!</p>
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

$sql = "SELECT * FROM Supervillains";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'>";
         echo "<tr><th>ID</th><th>Name</th><th>Alias</th><th>Species</th><th>Delete</th></tr>";


while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Supervillain_ID']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Alias']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Species']) . "</td>";
    echo "<td><a href='delete_villain.php?id=" . $row['Supervillain_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
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

<h3>Renzo and Emma's tier list of best Marvel villains</h3>
<p><strong>Renzo</strong></p>
<ol>
    <li>Ultron</li>
    <li>Thanos</li>
    <li>Green Goblin</li>
</ol>

<p><strong>Emma</strong></p>
<ol>
    <li>Kingpin</li>
    <li>Magneto</li>
    <li>Erik Killmonger</li>
</ol>

<div class="villain_pic">
    <img class="villain_eachPic" src="https://static.wikia.nocookie.net/ironman/images/d/d9/Ultron_EW_Poster.png" height="300px">
    <img class="villain_eachPic" src="https://static.wikia.nocookie.net/marvelcinematicuniverse/images/5/52/Empire_March_Cover_IW_6_Textless.png" height="300px">
    <img class="villain_eachPic" src="https://i.pinimg.com/originals/d9/ae/0e/d9ae0ee94871b6dea269e6f91b0b15b0.jpg" height="300px">
    <img class="villain_eachPic" src="https://static.wikia.nocookie.net/heroes-and-villain/images/1/14/Wilson_Fisk.png" height="300px">
    <img class="villain_eachPic" src="https://upload.wikimedia.org/wikipedia/en/4/49/Ultimate_X-Men_62.jpg" height="300px">
    <img class="villain_eachPic" src="https://comicvine.gamespot.com/a/uploads/scale_medium/0/77/8859673-6100273820-Wakan.jpg" height="300px">
</div>


 <?php
  echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>



</body>
 </html>
