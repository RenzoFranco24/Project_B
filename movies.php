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
        Welcome to the information section on Marvel movies!
    </h1>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT *  FROM Movies";
$result = $connection->query($sql);


if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>Movie ID</th>";
        echo "<th>Title</th>";
        echo "<th>Release Date</th>";
        echo "<th>Duration (in minutes)</th>";
        echo "<th>Box Office Revenue</th>";
        echo "<th>Director</th>";
        echo "<th>Delete</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Movie_ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Released_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Duration_minutes']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Box_office']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Director']) . "</td>";
            echo "<td><a href='delete_movies.php?id=" . $row['Movie_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>    Delete</a></td>";
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
 <?php
     echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
  ?>

</iframe>
</body>
 </html>

