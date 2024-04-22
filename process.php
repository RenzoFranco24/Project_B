<?php
include 'credentials.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$table = $_POST['table'] ?? null;
$action = $_POST['action'] ?? null;

if ($table == 'superheroes' && $action == 'insert') {
    $stmt = $pdo->prepare("INSERT INTO Superheroes (Name, Alias, Place_of_origin, Main_villain, Powers, First_appearance_date, First_appearance_comic) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['Name'] ?? '', $_POST['Alias'] ?? '', $_POST['Place_of_origin'] ?? '', $_POST['Main_villain'] ?? '', $_POST['Powers'] ?? '', $_POST['First_appearance_date'] ?? '', $_POST['First_appearance_comic'] ?? '']);
    header("Location: superheroes.php");
    exit();
} elseif ($table == 'superheroes' && $action == 'edit') {
    $stmt = $pdo->prepare("UPDATE Superheroes SET Name=?, Alias=?, Place_of_origin=?, Main_villain=?, Powers=?, First_appearance_date=?, First_appearance_comic=? WHERE Superhero_ID=?");
    $stmt->execute([$_POST['Name'] ?? '', $_POST['Alias'] ?? '', $_POST['Place_of_origin'] ?? '', $_POST['Main_villain'] ?? '', $_POST['Powers'] ?? '', $_POST['First_appearance_date'] ?? '', $_POST['First_appearance_comic'] ?? '', $_POST['Superhero_ID'] ?? '']);
    header("Location: superheroes.php");
    exit();
}
?>

