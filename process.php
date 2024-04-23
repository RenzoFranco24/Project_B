<?php
include 'credentials.php';
echo "<pre>POST Data:";
print_r($_POST);
echo "</pre>";
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
            echo "Origin: <input type='text' name='Origin'><br>";
            echo "Main Villain: <input type='text' name='Main_Villain'><br>";
            echo "Powers: <input type='text' name='Powers'><br>";
            echo "First Appearance Date: <input type='date' name='First_Appearance_Date'><br>";
            echo "First Appearance Comic: <input type='text' name='First_Appearance_Comic'><br>";
            break;
        case 'villains':
            echo "Name: <input type='text' name='Name'><br>";
            echo "Alias: <input type='text' name='Alias'><br>";
            echo "Species: <input type='text' name='Species'><br>";
            break;
        case 'movies':
            echo "Title: <input type='text' name='Ritle'><br>";
            echo "Release Date: <input type='date' name='Released_date'><br>";
            echo "Duration (in minutes): <input type='number' name='Duration'><br>";
            echo "Box Office Revenue: <input type='text' name='Box_office'><br>";
            echo "Director: <input type='text' name='Director'><br>";
            break;
        case 'tv_shows':
            echo "Title: <input type='text' name='Title'><br>";
            echo "Release Date: <input type='date' name='Release_date'><br>";
            echo "Seasons: <input type='number' name='Seasons'><br>";
            echo "Episodes: <input type='number' name='Episodes'><br>";
            echo "Main Character: <input type='text' name='Main_character'><br>";
            echo "Creator: <input type='text' name='Creator'><br>";
            echo "Comic based? (Y/N): <input type='text' name=Comic_based'><br>";
            break;
    }
    echo "<input type='submit' value='Submit'>";
}
?>

