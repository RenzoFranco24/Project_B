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
        Welcome to the information section on Marvel tv shows!
    </h1>
 <p>Note: please make sure to login if you want to delete, insert, or edit anything from the table!</p>
<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM TV_Shows";
$result = $connection->query($sql);


if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>TV Show ID</th>";
        echo "<th>Title</th>";
        echo "<th>Release Date</th>";
        echo "<th>Seasons</th>";
        echo "<th>Episodes</th>";
        echo "<th>Main Character(s)</th>";
        echo "<th>Creator</th>";
        echo "<th>Comic based?</th>";
        if (isset($_SESSION['user_id'])) {
                  echo "<th>Delete</th>";
              }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr   >";
            echo "<td>" . htmlspecialchars($row['TV_Show_ID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Released_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Seasons']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Episodes']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Main_character']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Creator']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Comic_based']) . "</td>";
            if (isset($_SESSION['user_id'])) {
                      echo "<td><a href='delete_tv.php?id=" . $row['TV_Show_ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?    \");'>Delete</a></td>";
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

<p>Renzo and Emma's tier list of best Marvel tv shows and us copying each other (womp womp)!</p>
  <img src="https://media.tenor.com/_etLMOP-kFYAAAAj/blue-emoji.gif">
    <p>My reaction to Renzo copying me (Emma)</p>
<h3>Part 2</h3>
<img src="https://media1.tenor.com/m/ufKzD-y73e8AAAAC/emoji-shocked-face.gif" width="300" height="200">
<h3>Renzo and Emma's tier list of best Marvel tv shows!</h3>
  <p><strong>Renzo</strong></p>
  <ol>
      <li>Moon Knight</li>
      <li>What If...?</li>
      <li>Daredevil</li>
  </ol>
 
  <p><strong>Emma</strong></p>
  <ol>
      <li>Daredevil</li>
      <li>The Punisher</li>
      <li>Moon Knight</li>
  </ol>
 
  <div class="tv_pic">
      <img class="tv_eachPic" src="https://m.media-amazon.com/images/I/81JAUSV7cZL.jpg" height="300px">
      <img class="tv_eachPic" src="https://m.media-amazon.com/images/I/81TR9+czWiS.jpg" height=    "300px">
      <img class="tv_eachPic" src="https://cdn.marvel.com/content/1x/daredevil_s3_vertical-main_rgb.jpg" height="300px">
      <img class="tv_eachPic" src="https://i.ebayimg.com/images/g/PkMAAOSwiV9jR6qL/s-l1600.jpg" height="300px">
      <img class="tv_eachPic" src="https://i.ebayimg.com/images/g/Y3cAAOSwWtFcTPMT/s-l1600.jpg" height="300px">
      <img class="tv_eachPic" src="https://m.media-amazon.com/images/I/91rNwL7hyeL.jpg" height="300px">
  </div>

<h3>Marvel tv has some banger intros: </h3>
<p>Exhibit A: The Daredevil intro: </p>
 <audio controls>
   <source src="https://www.televisiontunes.com/uploads/audio/Daredevil%20-%202015.mp3" type="audio/mp3">
  Your browser does not support the audio element. 
</audio>
   <?php
    echo "<p style='color: white;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
  ?>

</iframe>
</body>
 </html>

