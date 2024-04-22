<?php
include 'credentials.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST['table'];
    $action = $_POST['action'];

    echo "<form action='process.php' method='post'>";
    echo "<input type='hidden' name='table' value='$table'>";
    echo "<input type='hidden' name='action' value='$action'>";

    switch ($table) {
        case 'superheroes':
            echo "Name: <input type='text' name='Name'><br>";
            echo "Alias: <input type='text' name='Alias'><br>";
            echo "Origin: <input type='text' name='Place_of_origin'><br>";
            echo "Main Villain: <input type='text' name='Main_villain'><br>";
            echo "Powers: <input type='text' name='Powers'><br>";
            echo "First Appearance Date: <input type='date' name='First_appearance_date'><br>";
            echo "First Appearance Comic: <input type='text' name='First_appearance_comic'><br>";
            break;
        case 'villains':
            echo "Name: <input type='text' name='name'><br>";
            echo "Alias: <input type='text' name='alias'><br>";
            echo "Species: <input type='text' name='species'><br>";
            break;
        case 'movies':
            echo "Title: <input type='text' name='title'><br>";
            echo "Release Date: <input type='date' name='release_date'><br>";
            echo "Duration (in minutes): <input type='number' name='duration'><br>";
            echo "Box Office Revenue: <input type='text' name='box_office'><br>";
            echo "Director: <input type='text' name='director'><br>";
            break;
        case 'tv_shows':
            echo "Title: <input type='text' name='title'><br>";
            echo "Release Date: <input type='date' name='release_date'><br>";
            echo "Seasons: <input type='number' name='seasons'><br>";
            echo "Episodes: <input type='number' name='episodes'><br>";
            echo "Main Character: <input type='text' name='main_character'><br>";
            echo "Creator: <input type='text' name='creator'><br>";
            echo "Comic based? (Y/N): <input type='text' name='comic_based'><br>";
            break;
    }

    echo "<input type='submit' value='Submit'>";
    echo "</form>";
}
?>

