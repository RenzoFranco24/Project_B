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

if ($table == 'tv' && $action == 'insert') {
    $stmt = $pdo->prepare("INSERT INTO TV_Shows (Title, Released_date, Seasons, Episodes, Main_character, Creator, Comic_based) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['Title'] ?? '',
        $_POST['Released_date'] ?? '',
        $_POST['Seasons'] ?? '',
        $_POST['Episodes'] ?? '',
        $_POST['Main_character'] ?? '',
        $_POST['Creator'] ?? '',
        $_POST['Comic_based'] ?? ''
    ]);
    header("Location: tv.php");
    exit();
} elseif ($table == 'tv' && $action == 'edit') {
    $stmt = $pdo->prepare("UPDATE TV_Shows SET Title=?, Released_date=?, Seasons=?, Episodes=?, Main_character=?, Creator=?, Comic_based=? WHERE TV_Show_ID=?");
    $stmt->execute([
        $_POST['Title'] ?? '',
        $_POST['Released_date'] ?? '',
        $_POST['Seasons'] ?? '',
        $_POST['Episodes'] ?? '',
        $_POST['Main_character'] ?? '',
        $_POST['Creator'] ?? '',
        $_POST['Comic_based'] ?? '',
        $_POST['TV_Show_ID'] ?? ''
    ]);
    header("Location: tv.php");
    exit();
}

if ($table == 'movies' && $action == 'insert') {
    $stmt = $pdo->prepare("INSERT INTO Movies (Title, Released_date, Duration_minutes, Box_office, Director) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['Title'] ?? '',
        $_POST['Released_date'] ?? '',
        $_POST['Duration_minutes'] ?? '',
        $_POST['Box_office'] ?? '',
        $_POST['Director'] ?? ''
    ]);
    header("Location: movies.php");
    exit();
} elseif ($table == 'movies' && $action == 'edit') {
    $stmt = $pdo->prepare("UPDATE Movies SET Title=?, Released_date=?, Duration_minutes=?, Box_office=?, Director=? WHERE Movie_ID=?");
    $stmt->execute([
        $_POST['Title'] ?? '',
        $_POST['Released_date'] ?? '',
        $_POST['Duration_minutes'] ?? '',
        $_POST['Box_office'] ?? '',
        $_POST['Director'] ?? '',
        $_POST['Movie_ID'] ?? ''
    ]);
    header("Location: movies.php");
    exit();
}



?>

