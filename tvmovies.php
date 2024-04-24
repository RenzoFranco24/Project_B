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
        Welcome to the information section on Marvel tv shows, movies, and Superheroes! (junction tables :D)
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

$sql = "SELECT 
    m.Title AS Movie_Title,
    s.Name AS Superhero_Name
FROM 
    Movie_Superheroes sm
JOIN 
    Movies m ON sm.Movie_ID = m.Movie_ID
JOIN Superheroes s ON sm.ID = s.ID
ORDER BY 
    m.Title, s.Name;
";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
        echo "<th>Movie Title</th>";
        echo "<th>Character</th>";
        if (isset($_SESSION['user_id'])) {
                  echo "<th>Delete</th>";
              }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr   >";
            echo "<td>" . htmlspecialchars($row['Movie_Title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Superhero_Name']) . "</td>";
            if (isset($_SESSION['user_id'])) {
                    echo "<td><a href='delete_tvmovies.php?id=" . $row['Movie_Title'] . "' onclick='return confirm(\"Are you sure you want to delete this reco    rd?    \");'>Delete</a></td>";
                      
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
<h3>Here's the TV Show/Character junction table: </h3>
<?php
$sql_2 = "SELECT 
    tv.Title AS TV_Show_Title,
    sh.Name AS Superhero_Name
FROM 
    TV_Shows_Superheroes tsh
JOIN 
    TV_Shows tv ON tsh.TV_Show_ID = tv.TV_Show_ID
JOIN 
    Superheroes sh ON tsh.ID = sh.ID
ORDER BY 
    tv.Title, sh.Name;
";

$result_2 = $connection->query($sql_2);

 if ($result_2) {
      if ($result_2->num_rows > 0) {
          echo "<table border='1' style='background-color:{$bg_color}; color:{$text};'><tr>";
          echo "<th>TV Show Title</th>";
          echo "<th>Character</th>";
          if (isset($_SESSION['user_id'])) {
                   echo "<th>Delete</th>";
               }
 
          echo "</tr>";
 
          while ($row = $result_2->fetch_assoc()) {
              echo "<tr   >";
              echo "<td>" . htmlspecialchars($row['TV_Show_Title']) . "</td>";
              echo "<td>" . htmlspecialchars($row['Superhero_Name']) . "</td>";
              if (isset($_SESSION['user_id'])) {
                    echo "<td><a href='delete_tvmovies.php?id=" . $row['TV_Show_Title'] . "' onclick='return confirm(\"Are you sure you want to delete this reco    rd?    \");'>Delete</a></td>";

                    }

                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No results found.";
            }
        } else {
            echo "Error";
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

