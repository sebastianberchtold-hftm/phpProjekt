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
                    // Display album information here
                    echo "<div>";
                    echo "Album Name: " . $row['name'] . "<br>";
                    echo "Artist: " . $row['artist'] . "<br>";
                    echo "Release Date: " . $row['release_date'] . "<br>";
                    echo "Album Cover: <img src='" . $row['cover_path'] . "' alt='" . $row['name'] . "'><br>";
                    echo "</div>";
                }
            } else {
                echo "No albums found.";
            }

            // Close the database connection
            $dbConnection->close();
            ?>
        </div>
    </div>
</body>

</html>