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
        Welcome to the information section on Marvel movies and superheroes! (junction table :D)
    </h1>
<p>Note: please make sure to login if you want to delete, insert, or edit anything from the table!</p>
<h3>Here's the Movie/Character junction table: </h3>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM Movie_Superheroes";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>Movie ID</th>";
        echo "<th>Character ID</th>";
        echo "<th>Role</th>";
        echo "<th>Sequel?</th>";
        if (isset($_SESSION['user_id'])) {
                  echo "<th>Delete</th>";
              }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr   >";
            echo "<td>" . htmlspecialchars($row['Movie_ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['role_description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Sequel_or_not']) . "</td>";
            if (isset($_SESSION['user_id'])) {
                    echo "<td><a href='delete_movjunc.php?id=" . $row['Movie_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this reco    rd?    \");'>Delete</a></td>";
                      
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
   <?php
    echo "<p style='color: white;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
  ?>
</iframe>
</body>
 </html>

