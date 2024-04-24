<?php
session_start();

echo '<nav>';
echo '<ul>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo '<li>Welcome, ' . $_SESSION['username'] . '</li>';
}

echo '<li><a href="Marvel_Pookies.php">Home</a></li>';
echo '<li><a href="superheroes.php">Superheroes</a></li>';
echo '<li><a href="villains.php">Villains</a></li>';
echo '<li><a href="movies.php">Movies</a></li>';
echo '<li><a href="tv.php">TV Shows</a></li>';
echo '<li><a href="tvmovies.php">TV Shows + Movies</a></li>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
      echo '<li><a href="index.php">Edit/Insert Information</a></li>';
      echo '<li><a href="logout.php">Logout</a></li>';
  } else {
     echo '<li><a href="login.php">Login</a></li>';
     echo '<li><a href="register.php">Register</a></li>';
}


echo '</ul>';
echo '</nav>';
?>

