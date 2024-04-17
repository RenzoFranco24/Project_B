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
       <title>Emma's Marvel Blog</title>
       <link rel="stylesheet" href="Marvel_Pookies.css">
   </head>
   <body>
    <h1>
        Welcome to the information section on Marvel movies!
    </h1>
<?php
echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>
<p>
Here is Renzo's favorite Marvel movie:
Deadpool (2016). Rated R (don't let your kids watch it!)</p>

<img style='border: 3px solid #660033' img src = "https://i.ebayimg.com/images/g/qYYAAOSw1odgo4~~/s-l1600.jpg" alt="Deadpool movie poster." width = "350" height = "500">
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT Movie_ID, Title, Released_date, Duration_minutes, Box_office, Director FROM Movies";
$result = $connection->query($sql);

if ($result) {
    echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>ID</th>";
        echo "<th>Movie Title</th>";
        echo "<th>Date Released</th>";
        echo "<th>Run Time</th>";
        echo "<th>Box Office Reveneue</th>";
        echo "<th>Director(s)</th>";        
        echo "</tr>";    

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Movie_ID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Released_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Duration_minutes']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Box_office']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Director']) . "</td>";
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

