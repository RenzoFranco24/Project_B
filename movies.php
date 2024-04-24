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
 <p>Note: please make sure to login if you want to delete, insert, or edit anything from the table!</p>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM Movies";
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
        if (isset($_SESSION['user_id'])) {
                  echo "<th>Delete</th>";
              }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Movie_ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Released_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Duration_minutes']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Box_office']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Director']) . "</td>";
            if (isset($_SESSION['user_id'])) {
                      echo "<td><a href='delete_movie.php?id=" . $row['Movie_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?    \");'>Delete</a></td>";
                  }
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

<h3>Renzo and Emma's tier list of the best Marvel movies - but more variety this time!</h3>
  <p><strong>Renzo</strong></p>
  <ol>
      <li>Iron Man</li>
      <li>Thor: Ragnarok</li>
      <li>Avengers: Infinity War</li>
  </ol>
 
  <p><strong>Emma</strong></p>
  <ol>
      <li>Guardians of the Galaxy Vol 3</li>
      <li>Black Panther</li>
      <li>Captain America: The Winter Soldier</li>
  </ol>
 
  <div class="villain_pic">
      <img class="villain_eachPic" src="https://i.ebayimg.com/images/g/upMAAOSw4vJaoM-F/s-l1600.jpg" height="300px">
      <img class="villain_eachPic" src="https://m.media-amazon.com/images/I/A1HBBNzBdxL.jpg" height=    "300px">
      <img class="villain_eachPic" src="https://i.ebayimg.com/images/g/VpQAAOSwHvpa7zbY/s-l1600.jpg" height="300px">
      <img class="villain_eachPic" src="https://image.tmdb.org/t/p/original/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg" height="300px">
      <img class="villain_eachPic" src="https://i.ebayimg.com/images/g/svIAAOSwr~hfSyhB/s-l1600.jpg" height="300px">
      <img class="villain_eachPic" src="https://m.media-amazon.com/images/I/818xQZGm-JL.jpg" height="300px">
  </div>
 
 
   <?php
    echo "<p style='color: white;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
  ?>


</iframe>
</body>
 </html>

