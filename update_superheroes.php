<?php
session_start();
require_once "credentials.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $superhero_id = $_POST['update'];
    $name = $_POST['Name'][$superhero_id];
    $alias = $_POST['Alias'][$superhero_id];
    $place_of_origin = $_POST['Place_of_origin'][$superhero_id];
    $main_villain = $_POST['Main_villain'][$superhero_id];
    $first_appearance_date = $_POST['First_appearance_date'][$superhero_id];
    $first_appearance_comic = $_POST['First_appearance_comic'][$superhero_id];

    $sql = "UPDATE Superheroes SET Name=?, Alias=?, Place_of_origin=?, Main_villain=?, First_appearance_date=?, First_appearance_comic=? WHERE Superhero_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $alias, $place_of_origin, $main_villain, $first_appearance_date, $first_appearance_comic, $superhero_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Record updated successfully";
    } else {
        echo "No changes were made or update failed";
    }
    $stmt->close();
    $conn->close();
    header("Location: dashboard.php"); 
}
?>

