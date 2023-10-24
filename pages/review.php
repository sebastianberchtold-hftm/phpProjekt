<!DOCTYPE html>
<html>
<head>
    <title>Album Review - <?php echo $albumName; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Album Review - <?php echo $albumName; ?></h1>
        <img src="<?php echo $albumCover; ?>" alt="<?php echo $albumName; ?>" class="img-fluid">
        <p>Artist: <?php echo $albumArtist; ?></p>
        <p>Review content goes here...</p>
    </div>
</body>
</html>
