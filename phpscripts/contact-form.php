<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recipient email
    $to = "vishnumarripalli123@gmail.com";

    // Sanitize and collect form inputs
    $firstName     = htmlspecialchars($_POST["first_name"] ?? '');
    $lastName      = htmlspecialchars($_POST["last_name"] ?? '');
    $gender        = htmlspecialchars($_POST["gender"] ?? '');
    $dob           = htmlspecialchars($_POST["dob"] ?? '');
    $academicYear  = htmlspecialchars($_POST["academic_year"] ?? '');
    $campus        = htmlspecialchars($_POST["campus"] ?? '');
    $grade         = htmlspecialchars($_POST["grade"] ?? '');
    $parentName    = htmlspecialchars($_POST["parent_name"] ?? '');
    $mobile        = htmlspecialchars($_POST["mobile"] ?? '');
    $email         = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
    $message       = htmlspecialchars($_POST["message"] ?? '');

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); window.history.back();</script>";
        exit;
    }

    // Email Subject
    $subject = "New Admission Inquiry - $firstName $lastName";

    // Email Body
    $body = "
        <h2>New Admission Inquiry from Website</h2>
        <p><strong>Student Name:</strong> $firstName $lastName</p>
        <p><strong>Gender:</strong> $gender</p>
        <p><strong>Date of Birth:</strong> $dob</p>
        <p><strong>Academic Year:</strong> $academicYear</p>
        <p><strong>Preferred Campus:</strong> $campus</p>
        <p><strong>Grade Applying For:</strong> $grade</p>
        <p><strong>Parent's Name:</strong> $parentName</p>
        <p><strong>Mobile Number:</strong> $mobile</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong> $message</p>
    ";

    // Headers
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send Email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your inquiry has been sent.'); window.location.href='../thankyou.html';</script>";
    } else {
        echo "<script>alert('Failed to send. Please try again.'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Unauthorized access.'); window.history.back();</script>";
}
?>
