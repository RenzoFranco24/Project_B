<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Database</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tableSelect = document.querySelector('select[name="table"]');
            const actionSelect = document.querySelector('select[name="action"]');
            
            function updateActions() {
                if (tableSelect.value === 'tv_character' || tableSelect.value === 'tv_movie') {
                    actionSelect.innerHTML = '<option value="insert">Insert</option>';
                } else {
                    actionSelect.innerHTML = `
                        <option value="insert">Insert</option>
                        <option value="edit">Edit</option>
                    `; 
                }
            }

            tableSelect.addEventListener('change', updateActions);
            updateActions(); 
        });
    </script>
</head>
<body>
    <form action="form_handler.php" method="post">
        <select name="table">
            <option value="superheroes">Superheroes</option>
            <option value="villains">Villains</option>
            <option value="movies">Movies</option>
            <option value="tv">TV Shows</option>
            <option value="tv_character">TV Shows + Characters Junction Table</option>
            <option value="tv_movie">Movies + Character Junction Table</option>
        </select>
        <select name="action">
            <option value="insert">Insert</option>
            <option value="edit">Edit</option>
        </select>
        <input type="submit" value="Select">
    </form>
</body>
</html>

