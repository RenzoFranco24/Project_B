<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Database</title>
</head>
<body>
    <form action="form_handler.php" method="post">
        <select name="table">
            <option value="superheroes">Superheroes</option>
            <option value="villains">Villains</option>
            <option value="movies">Movies</option>
            <option value="tv">TV Shows</option>
        </select>
        <select name="action">
            <option value="insert">Insert</option>
            <option value="edit">Edit</option>
        </select>
        <input type="submit" value="Select">
    </form>
</body>
</html>

