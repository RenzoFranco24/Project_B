<?php
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    if ($type == 'tv') {
        $query = "DELETE FROM TV_Shows_Superheroes WHERE TV_Show_ID = ?";
        $redirectUrl = 'tvmovies.php';
    } elseif ($type == 'movie') {
        $query = "DELETE FROM Movie_Superheroes WHERE Movie_ID = ?";
        $redirectUrl = 'tvmovies.php';
    } else {
        echo "Invalid type specified.";
        exit;
    }

    $stmt = $connection->prepare($query);
    if (!$stmt) {
        echo "Error preparing statement: " . $connection->error;
        exit;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record or no record found.";
    }

    header('Location: ' . $redirectUrl);
    exit();
}

