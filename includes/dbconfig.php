<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'php_album');
define('DB_PASS', 'admin');
define('DB_NAME', 'albumreview');
?>
<?php
// Function to establish a database connection
function connectToDatabase() {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

$dbConnection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

?>
