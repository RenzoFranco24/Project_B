<?php
include 'credentials.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST['table'];
    $action = $_POST['action'];

    echo "<form action='process.php' method='post'>";
    echo "<input type='hidden' name='table' value='$table'>";
    echo "<input type='hidden' name='action' value='$action'>";

    if ($table === 'superheroes') {
        if ($action == 'edit') {
            echo "ID to edit: <input type='number' name='ID' required><br>";
      }
            echo "Name: <input type='text' name='Name'><br>";
            echo "Alias: <input type='text' name='Alias'><br>";
            echo "Origin: <input type='text' name='Origin'><br>";
            echo "Main Villain: <input type='text' name='Main_Villain'><br>";
            echo "Powers: <input type='text' name='Powers'><br>";
            echo "First Appearance Date: <input type='date' name='First_Appearance_Date'><br>";
            echo "First Appearance Comic: <input type='text' name='First_Appearance_Comic'><br>";
    }

    if ($table === 'movies') {
        if ($action == 'edit') {
            echo "ID to edit: <input type='number' name='Movie_ID' required><br>";
        }
              echo "Title: <input type='text' name='Title'><br>";
              echo "Release date: <input type='date' name='Released_date'><br>";
              echo "Duration (in mins): <input type='integer' name='Duration_minutes'><br>";
              echo "Box office: <input type='text' name='Box_office'><br>";
              echo "Director: <input type='text' name='Director'><br>";
         }
    if ($table === 'tv') {
        if ($action == 'edit') {
            echo "ID to edit: <input type='number' name='TV_Show_ID' required><br>";
        }
                echo "Title: <input type='text' name='Title'><br>";
                echo "Release date: <input type='date' name='Released_date'><br>";
                echo "Seasons: <input type='integer' name='Seasons'><br>";
                echo "Episodes: <input type='integer' name='Episodes'><br>";
                echo "Main_character: <input type='text' name='Main_character'><br>";
                echo "Based on a comic? [Y/N]: <input type='chr' name='Comic_based'><br>";
           }
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
}
?>

