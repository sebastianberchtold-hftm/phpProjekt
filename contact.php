<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Contact Us</h2>

    <?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Perform data validation and processing here
        // ...

        // For this example, simply display a success message
        echo '<div class="alert alert-success">Thank you for your message, ' . $name . '! We will get back to you soon.</div>';
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>
