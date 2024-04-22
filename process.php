<?php
include 'credentials.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$table = $_POST['table'] ?? null;
$action = $_POST['action'] ?? null;

if ($table == 'superheroes' && $action == 'insert') {
    $stmt = $pdo->prepare("INSERT INTO Superheroes (Name, Alias, Origin, Main_Villain, Powers, First_Appearance_Date, First_Appearance_Comic) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['Name'] ?? '', $_POST['Alias'] ?? '', $_POST['Origin'] ?? '', $_POST['Main_Villain'] ?? '', $_POST['Powers'] ?? '', $_POST['First_Appearance_Date'] ?? '', $_POST['First_Appearance_Comic'] ?? '']);
    header("Location: superheroes.php");
    exit();
} elseif ($table == 'superheroes' && $action == 'edit') {
    $stmt = $pdo->prepare("UPDATE Superheroes SET Name=?, Alias=?, Origin=?, Main_Villain=?, Powers=?, First_Appearance_Date=?, First_Appearance_Comic=? WHERE ID=?");
    $stmt->execute([$_POST['Name'] ?? '', $_POST['Alias'] ?? '', $_POST['Origin'] ?? '', $_POST['Main_Villain'] ?? '', $_POST['Powers'] ?? '', $_POST['First_Appearance_Date'] ?? '', $_POST['First_Appearance_Comic'] ?? '', $_POST['ID'] ?? '']);
    header("Location: superheroes.php");
    exit();
}
?>

