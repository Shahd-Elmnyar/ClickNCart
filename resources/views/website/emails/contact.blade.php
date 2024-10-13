<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <!-- resources/views/emails/contact.blade.php -->
    <p><strong>First Name:</strong> {{ $first_name }}</p>
    <p><strong>Last Name:</strong> {{ $Last_name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong> {{ $c_message }}</p>
</body>
</html>
