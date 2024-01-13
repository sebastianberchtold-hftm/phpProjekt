<!DOCTYPE html>
<html>

<head>
    <title>Album Reviews</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Album Reviews</h1>
        <div class="row">
            <?php
            // Include the database configuration file
            include 'includes/dbconfig.php';

            // Establish a database connection
            $dbConnection = connectToDatabase();

            // SQL query to retrieve all albums
            $sql = "SELECT * FROM albums";
            $result = $dbConnection->query($sql);

            // Check if there are albums to display
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display album information using Bootstrap cards
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<a href="/phpProjekt/pages/review_detail.php?id=' . $row['id'] . '">';
                    echo '<img src="' . $row['cover_image_url'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<p class="card-text">Artist: ' . $row['artist'] . '</p>';
                    echo '<p class="card-text">Release Year: ' . $row['release_year'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12">';
                echo '<p>No albums found.</p>';
                echo '</div>';
            }

            // Close the database connection
            $dbConnection->close();
            ?>
        </div>
    </div>
</body>

</html>