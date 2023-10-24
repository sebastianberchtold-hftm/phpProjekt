<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Album</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Add Album</h2>
        
        <form method="POST" action="insert_albums.php">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="artist">Artist:</label>
                <input type="text" class="form-control" name="artist" id="artist" required>
            </div>

            <div class="form-group">
                <label for="release_year">Release Year:</label>
                <input type="text" class="form-control" name="release_year" id="release_year" required>
            </div>

            <div class="form-group">
                <label for="cover_image_url">Cover Image URL:</label>
                <input type="text" class="form-control" name="cover_image_url" id="cover_image_url" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Album</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<?php
   include 'includes/dbconfig.php';

   $dbConnection = connectToDatabase();
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $release_year = $_POST['release_year'];
    $cover_image_url = $_POST['cover_image_url'];

    $sql = "INSERT INTO albums (title, artist, release_year, cover_image_url) VALUES (?, ?, ?, ?)";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bind_param('ssss', $title, $artist, $release_year, $cover_image_url);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Album data has been successfully added to the database.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
    }

    $stmt->close();
    $dbConnection->close();
}
?>




<?php include '../includes/footer.php'; ?>