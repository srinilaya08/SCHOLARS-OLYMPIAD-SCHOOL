<?php
// admin_careers.php

// Define file paths
$jobs_file = 'jobs.json';
$applications_file = 'applications.json';

// Helper function to load JSON data from a file
function load_json($filename, $default = []) {
    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        $data = json_decode($json, true);
        return is_array($data) ? $data : $default;
    }
    return $default;
}

// Helper function to save JSON data to a file
function save_json($filename, $data) {
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
}

// Load existing data
$jobs = load_json($jobs_file);
$applications = load_json($applications_file);

// --- Handle Job Actions ---
// Adding a new job opening
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_action']) && $_POST['job_action'] === 'add') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    // Generate a unique ID for the job
    $id = uniqid();
    $new_job = [
        "id" => $id,
        "title" => $title,
        "description" => $description,
        "location" => $location
    ];
    $jobs[] = $new_job;
    save_json($jobs_file, $jobs);
    header("Location: admin_careers.php");
    exit();
}

// Deleting a job opening
if (isset($_GET['delete_job'])) {
    $delete_id = $_GET['delete_job'];
    $jobs = array_filter($jobs, function($job) use ($delete_id) {
        return $job['id'] !== $delete_id;
    });
    $jobs = array_values($jobs); // reindex array
    save_json($jobs_file, $jobs);
    header("Location: admin_careers.php");
    exit();
}

// --- Handle Application Deletion ---
// Delete an application by index
if (isset($_GET['delete_app'])) {
    $delete_index = intval($_GET['delete_app']);

    if (isset($applications[$delete_index])) {
        $resume_path = $applications[$delete_index]['resume']; // Assuming 'resume' stores the file path

        // Delete the resume file from the server
        if (!empty($resume_path) && file_exists($resume_path)) {
            unlink($resume_path); // Remove the file
        }

        // Remove the application from the array
        unset($applications[$delete_index]);
        $applications = array_values($applications);
        save_json($applications_file, $applications);
    }

    header("Location: admin_careers.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel | Careers Management - Scholars Olympiad School</title>
      <link rel="shortcut icon" href="./assests/logo.png" type="image/x-icon">

  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Admin Panel – Careers Management</h1>
    
    <!-- Section: Manage Job Openings -->
    <section class="mb-10">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Manage Job Openings</h2>
      
      <!-- Add Job Form -->
      <form action="admin_careers.php" method="POST" class="mb-6 space-y-4">
        <input type="hidden" name="job_action" value="add">
        <div>
          <label class="block text-gray-700">Job Title</label>
          <input type="text" name="title" required class="w-full border border-gray-300 p-2 rounded-md">
        </div>
        <div>
          <label class="block text-gray-700">Job Description</label>
          <textarea name="description" required rows="3" class="w-full border border-gray-300 p-2 rounded-md"></textarea>
        </div>
        <div>
          <label class="block text-gray-700">Location</label>
          <input type="text" name="location" required class="w-full border border-gray-300 p-2 rounded-md">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition">Add Job</button>
      </form>
      
      <!-- List of Existing Jobs -->
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Existing Job Openings</h3>
      <?php if (!empty($jobs)) : ?>
        <ul class="space-y-4">
          <?php foreach ($jobs as $job): ?>
            <li class="p-4 border border-gray-200 rounded">
              <h4 class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars($job['title']); ?></h4>
              <p class="text-gray-700"><?php echo htmlspecialchars($job['description']); ?></p>
              <p class="text-gray-500 text-sm">Location: <?php echo htmlspecialchars($job['location']); ?></p>
              <a href="admin_careers.php?delete_job=<?php echo $job['id']; ?>" onclick="return confirm('Delete this job?');" class="text-red-600 hover:underline mt-2 inline-block">Delete</a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-gray-500">No job openings available.</p>
      <?php endif; ?>
    </section>
    
    <!-- Section: Manage Job Applications -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Manage Job Applications</h2>
      <?php if (!empty($applications)) : ?>
        <div class="space-y-6">
          <?php foreach ($applications as $index => $app) : ?>
            <div class="p-4 border border-gray-300 rounded-md">
              <h3 class="text-xl font-bold text-gray-800"><?php echo htmlspecialchars($app['full_name']); ?></h3>
              <p class="text-gray-700"><strong>Email:</strong> <?php echo htmlspecialchars($app['email']); ?></p>
              <p class="text-gray-700"><strong>Phone:</strong> <?php echo htmlspecialchars($app['phone']); ?></p>
              <p class="text-gray-700"><strong>Job Applied For (ID):</strong> <?php echo htmlspecialchars($app['job_id']); ?></p>
              <p class="text-gray-700 mt-2"><strong>Cover Letter:</strong><br><?php echo nl2br(htmlspecialchars($app['cover_letter'])); ?></p>
              <p class="text-gray-700 mt-2"><strong>Resume:</strong> <a href="<?php echo htmlspecialchars($app['resume']); ?>" target="_blank" class="text-blue-600 hover:underline">View Resume</a></p>
              <p class="text-gray-500 text-sm mt-2"><strong>Applied On:</strong> <?php echo htmlspecialchars($app['applied_on']); ?></p>
              <a href="admin_careers.php?delete_app=<?php echo $index; ?>" onclick="return confirm('Are you sure you want to delete this application?');" class="text-red-600 hover:underline mt-2 inline-block">Delete Application</a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-gray-500 text-center">No applications received yet.</p>
      <?php endif; ?>
    </section>
  </div>
  
  <!-- Optional: GSAP animations (can be enabled if needed) -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      gsap.registerPlugin(ScrollTrigger);
      // Example: fade in the admin panel on load
      gsap.from("div.max-w-7xl", { opacity: 0, y: 30, duration: 1, ease: "power2.out" });
    });
  </script>
</body>
</html>
