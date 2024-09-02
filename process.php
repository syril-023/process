<?php
// Initialize variables to store form data
$name = "";
$email = "";
$complaint = "";

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $complaint = htmlspecialchars(trim($_POST['complaint']));

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($complaint) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Display confirmation message
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Submission Confirmation</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
        <div class='container mt-5'>
            <div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>Thank You!</h4>
                <p>Your complaint has been successfully submitted. We will get back to you shortly.</p>
                <hr>
                <p class='mb-0'><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Complaint:</strong> $complaint</p>
            </div>
        </div>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
        </body>
        </html>";
    } else {
        // Display error message
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Submission Error</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
        <div class='container mt-5'>
            <div class='alert alert-danger' role='alert'>
                <h4 class='alert-heading'>Submission Error!</h4>
                <p>Please make sure all fields are filled out correctly and try again.</p>
            </div>
        </div>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
        </body>
        </html>";
    }
} else {
    // Redirect to form page if accessed directly
    header("Location: index.html");
    exit();
}
?>
