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
        Welcome to Renzo and Emma's Marvel Information Blog!
    </h1>
<h2>
    We have plenty of information for anything Marvel!!!
</h2>
    <h2>Website Information</h2>
    <p>Here you will find a lot of information about Marvel!!</p>
    <h3>Creators of this website</h3>
    <p><strong>Emma</strong></p>
    <ul>
        <li>Major: Computer Science</li>
        <li>Fav Marvel Character: Daredevil</li>
        <li>Fav Marvel Movie: Captain America: The Winter Soldier</li>
        <li>Fav Marvel TV Show: The Punisher and Daredevil</li>
    </ul>
    <p><strong>Renzo</strong></p>
    <ul>
        <li>Major: Computer Science</li>
        <li>Fav Marvel Character: Iron Man</li>
        <li>Fav Marvel Movie: Deadpool</li>
        <li>Fav Marvel TV Show: Moon Knight and What If...?</li>   

 
    <h2>Some of our favorite characters</h2>
    <img class="fav_characters" src="https://static.wikia.nocookie.net/marveldatabase/images/a/aa/Daredevil_Vol_6_21_Textless.jpg" height="300px">
    <img class="fav_characters" src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2008/04/30/21/26206.jpg" height="300px">
    <img class="fav_characters" src="https://upload.wikimedia.org/wikipedia/en/2/21/Web_of_Spider-Man_Vol_1_129-1.png" height="300px">
    <img class="fav_characters" src="https://static.tvtropes.org/pmwiki/pub/images/1c7e3abf13f0f384430cd427b837e558.jpg" height="300px">

<?php
echo "<p style='color: black;'>Today is: " . date('m-d-Y') . ". The time is: " . date('h:i') . ".</p>";
?>


<?php
include "credentials.php";
$connection = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed." . mysqli_connect_error();
    exit();
}
?>
</body>
 </html>
