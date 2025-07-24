<?php
// Create the resumes directory if it doesn't exist
$resumes_dir = "resumes/";
if (!file_exists($resumes_dir)) {
    mkdir($resumes_dir, 0755, true);
}

// Set allowed file types and maximum file size (5MB)
$allowed_types = ["pdf", "doc", "docx"];
$max_file_size = 5 * 1024 * 1024;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name   = trim($_POST["full_name"]);
    $email       = trim($_POST["email"]);
    $phone       = trim($_POST["phone"]);
    $job_id      = trim($_POST["job_id"]);
    $cover_letter= trim($_POST["cover_letter"]);

    // Validate resume file upload
    if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0) {
        $file_name = $_FILES["resume"]["name"];
        $file_size = $_FILES["resume"]["size"];
        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_types)) {
            die("Invalid resume file type. Only PDF, DOC, DOCX are allowed.");
        }

        if ($file_size > $max_file_size) {
            die("Resume file is too large. Maximum size is 5MB.");
        }

        // Create unique filename for resume
        $new_file_name = uniqid() . '_' . time() . '.' . $file_ext;
        $target_file = $resumes_dir . $new_file_name;

        if (!move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
            die("Failed to upload resume. Please try again.");
        }
    } else {
        die("Error uploading resume.");
    }

    // Prepare application data
    $application = [
        "full_name"    => $full_name,
        "email"        => $email,
        "phone"        => $phone,
        "job_id"       => $job_id,
        "cover_letter" => $cover_letter,
        "resume"       => $target_file,
        "applied_on"   => date("Y-m-d H:i:s")
    ];

    // Load existing applications from applications.json (if exists)
    $applications_file = "applications.json";
    $applications = [];
    if (file_exists($applications_file)) {
        $json_data = file_get_contents($applications_file);
        $applications = json_decode($json_data, true);
        if (!is_array($applications)) {
            $applications = [];
        }
    }

    // Append new application
    $applications[] = $application;
    // Save updated applications back to file
    if (file_put_contents($applications_file, json_encode($applications, JSON_PRETTY_PRINT))) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='careers.php';</script>";
    } else {
        echo "<script>alert('Failed to save application. Please try again later.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
