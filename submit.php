<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function clean($value) {
        return htmlspecialchars(trim($value));
    }

    $name    = clean($_POST['name'] ?? '');
    $email   = clean($_POST['email'] ?? '');
    $password = clean($_POST['password'] ?? '');
    $gender  = clean($_POST['gender'] ?? '');
    $dob     = clean($_POST['dob'] ?? '');
    $phone   = clean($_POST['phone'] ?? '');
    $course  = clean($_POST['course'] ?? '');
    $address = clean($_POST['address'] ?? '');

    // Simple server-side validation
    if ($name && $email && $password && $gender && $dob && $phone && $course) {

        $stmt = $conn->prepare("INSERT INTO students (name, email, password, gender, dob, phone, course, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $password, $gender, $dob, $phone, $course, $address);
        $stmt->execute();
        $stmt->close();

    } else {
        die("Required fields are missing. Please go back and fill the form correctly.");
    }

} else {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Registration Successful</h1>
    <p>Below is the information you submitted (also stored in the database):</p>
    <br>
    <table border="0" cellspacing="5" cellpadding="5">
        <tr><td><strong>Name:</strong></td><td><?php echo $name; ?></td></tr>
        <tr><td><strong>Email:</strong></td><td><?php echo $email; ?></td></tr>
        <tr><td><strong>Gender:</strong></td><td><?php echo $gender; ?></td></tr>
        <tr><td><strong>Date of Birth:</strong></td><td><?php echo $dob; ?></td></tr>
        <tr><td><strong>Phone:</strong></td><td><?php echo $phone; ?></td></tr>
        <tr><td><strong>Course:</strong></td><td><?php echo $course; ?></td></tr>
        <tr><td><strong>Address:</strong></td><td><?php echo nl2br($address); ?></td></tr>
    </table>

    <br>
    <a href="index.html">
        <button type="button">Back to Form</button>
    </a>
</div>
</body>
</html>
