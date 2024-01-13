<?php
include '../includes/header.php';
include '../includes/dbconfig.php';

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $dbConnection = connectToDatabase();
    $sql = "SELECT * FROM albums WHERE id = ?";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $album = $result->fetch_assoc();

        $stmt->close();
        $dbConnection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $album['title']; ?> - Album Review</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <h2><?php echo $album['title']; ?></h2>
                <p>Artist: <?php echo $album['artist']; ?></p>
                <p>Release Year: <?php echo $album['release_year']; ?></p>
                <img src="<?php echo $album['cover_image_url']; ?>" alt="<?php echo $album['title']; ?>"
                    class="img-fluid">
                <!-- Add more details on the left column as needed -->
            </div>

            <!-- Right Column for Review -->
            <div class="col-md-6">
                <h3>Review</h3>
                <p><?php echo $album['review']; ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
    } else {
        echo '<div class="container mt-4">';
        echo '<p>No album found with the specified ID.</p>';
        echo '</div>';
    }
} else {
    // Redirect to a default page if 'id' parameter is not provided
    header("Location: index.php");
    exit();
}

include '../includes/footer.php';
?>
