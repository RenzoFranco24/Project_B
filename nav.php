<nav>
    <ul>
        <li><img src="https://www.pngall.com/wp-content/uploads/4/Marvel-Avengers-PNG-Free-Image.png" width="120px" style="vertical-align:middle"></li>
        <li><a href="Marvel_Pookies.php">Home</a></li>
        <li><a href="superheroes.php">Superheroes</a></li>
        <li><a href="villains.php">Villains</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="tv.php">TV Shows</a></li>
        <li><a href="tvmovies.php">TV + Movie Appearances</a></li>
        <li><a href="index.php">Edit / Insert Data</a></li>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
