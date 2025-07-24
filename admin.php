<?php
// admin.php
session_start();

// Simple authentication (in production, use proper authentication)
$admin_password = 'admin123'; // Change this password
$is_authenticated = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;

// Handle login
if (isset($_POST['login'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['authenticated'] = true;
        $is_authenticated = true;
    } else {
        $login_error = 'Invalid password';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// If not authenticated, show login form
if (!$is_authenticated) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Gentle kids play School</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/output.css">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
</head>
<body class="bg-gray-50 font-sans min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
                <p class="text-gray-600 mt-2">Gentle kids playSchool</p>
            </div>
            
            <?php if (isset($login_error)): ?>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <p class="text-red-700 text-sm"><?php echo htmlspecialchars($login_error); ?></p>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Admin Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter admin password"
                    >
                </div>
                
                <button 
                    type="submit" 
                    name="login" 
                    class="w-full bg-blue-800 text-white py-2 px-4 rounded-lg hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                >
                    Login
                </button>
            </form>
        </div>
        
        <footer class="text-center py-6 text-sm text-gray-500">
            &copy; 2025 Nalanda High School Armoor. All rights reserved.
        </footer>
    </div>
</body>
</html>
<?php
    exit; // Stop execution if not authenticated
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Gentle kids play School</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/output.css">
    <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
</head>
<body class="bg-gray-50 font-sans">
    <header class="bg-blue-800 text-white py-6 shadow">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Admin Dashboard</h1>
                <p class="text-sm text-blue-200">Manage content across the Gentle kids play School website</p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-blue-200">Welcome, Admin</span>
                <a 
                    href="?logout=1" 
                    class="bg-blue-900 hover:bg-red-600 px-4 py-2 rounded-lg text-sm transition-colors"
                    onclick="return confirm('Are you sure you want to logout?')"
                >
                    Logout
                </a>
            </div>
        </div>
    </header>
    
    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-8">
            <p class="text-green-700 text-sm">
                <strong>✓ Authentication successful!</strong> You are now logged in as administrator.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Careers Card -->
            <a href="admin_careers.php" class="bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition-transform hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Manage Careers</h2>
                </div>
                <p class="text-gray-600">Post new job roles, update existing career openings, and manage applicants.</p>
            </a>
            
           
            
            <!-- Gallery Card -->
            <a href="admin_gallery.php" class="bg-white shadow hover:shadow-lg rounded-lg p-6 border border-gray-200 transition-transform hover:scale-105">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Manage Gallery</h2>
                </div>
                <p class="text-gray-600">Upload images, create albums, and showcase school memories.</p>
            </a>
            
            
        </div>
        
       
    </main>
    
    <footer class="text-center py-6 text-sm text-gray-500">
        &copy; 2025 Nalanda High School Armoor. All rights reserved.
    </footer>
</body>
</html>