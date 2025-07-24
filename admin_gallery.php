<?php 
// Define file paths
$eventsFile = 'customevents.json';
$uploadDir = 'gallery_uploads/';

// Ensure the upload directory exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Load existing events from JSON file
$events = file_exists($eventsFile) ? json_decode(file_get_contents($eventsFile), true) : [];
$events = $events ?: []; // Ensure $events is an array

// Message handling
$message = '';
$messageType = '';

// ✅ ADD OR EDIT EVENT
if (isset($_POST['add_event']) || isset($_POST['edit_event'])) {
    $eventName = trim($_POST['event_name']);
    $eventIndex = $_POST['event_index'] ?? null;
    
    if (!empty($eventName)) {
        if (isset($_POST['edit_event']) && isset($events[$eventIndex])) {
            // Update event name
            $events[$eventIndex]['event'] = $eventName;
            $message = "Event updated successfully!";
            $messageType = 'success';
        } else {
            // Check for duplicate event names (case-insensitive)
            $exists = array_filter($events, function($e) use ($eventName) {
                return strtolower($e['event']) === strtolower($eventName);
            });
            if (!$exists) {
                $events[] = ['event' => $eventName, 'images' => []];
                $message = "Event '$eventName' added successfully!";
                $messageType = 'success';
            } else {
                $message = "Event '$eventName' already exists!";
                $messageType = 'error';
            }
        }
        file_put_contents($eventsFile, json_encode($events, JSON_PRETTY_PRINT));
    } else {
        $message = "Event name cannot be empty!";
        $messageType = 'error';
    }
}

// ✅ DELETE EVENT
if (isset($_POST['delete_event']) && isset($_POST['event_index'])) {
    $eventIndex = $_POST['event_index'];
    if (isset($events[$eventIndex])) {
        // Delete associated images
        foreach ($events[$eventIndex]['images'] as $image) {
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $deletedEvent = $events[$eventIndex]['event'];
        unset($events[$eventIndex]);
        $events = array_values($events); // Reindex array after deletion
        file_put_contents($eventsFile, json_encode($events, JSON_PRETTY_PRINT));
        $message = "Event '$deletedEvent' deleted successfully!";
        $messageType = 'success';
    }
}

// ✅ ADD IMAGES TO AN EVENT
if (isset($_POST['add_images']) && isset($_POST['event_index'])) {
    $eventIndex = $_POST['event_index'];
    if (isset($events[$eventIndex])) {
        $uploadedFiles = $_FILES['images'];
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $uploadedCount = 0;
        
        foreach ($uploadedFiles['tmp_name'] as $key => $tmp_name) {
            if ($uploadedFiles['error'][$key] === UPLOAD_ERR_OK) {
                $fileExt = strtolower(pathinfo($uploadedFiles['name'][$key], PATHINFO_EXTENSION));
                if (in_array($fileExt, $validExtensions)) {
                    $newFileName = uniqid() . '.' . $fileExt;
                    $targetPath = $uploadDir . $newFileName;
                    if (move_uploaded_file($uploadedFiles['tmp_name'][$key], $targetPath)) {
                        $events[$eventIndex]['images'][] = $targetPath;
                        $uploadedCount++;
                    }
                }
            }
        }
        file_put_contents($eventsFile, json_encode($events, JSON_PRETTY_PRINT));
        $message = "$uploadedCount images uploaded successfully!";
        $messageType = 'success';
    }
}

// ✅ DELETE IMAGE FROM AN EVENT
if (isset($_POST['delete_image']) && isset($_POST['event_index']) && isset($_POST['image_index'])) {
    $eventIndex = $_POST['event_index'];
    $imageIndex = $_POST['image_index'];
    if (isset($events[$eventIndex]) && isset($events[$eventIndex]['images'][$imageIndex])) {
        $imagePath = $events[$eventIndex]['images'][$imageIndex];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        unset($events[$eventIndex]['images'][$imageIndex]);
        $events[$eventIndex]['images'] = array_values($events[$eventIndex]['images']); // Reindex images array
        file_put_contents($eventsFile, json_encode($events, JSON_PRETTY_PRINT));
        $message = "Image deleted successfully!";
        $messageType = 'success';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Management | Gentle Kids Paly School</title>
    <link rel="shortcut icon" href="./assests/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .preview-image {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <img src="./assets/logo.png" alt="Kanthi High School Logo" class="h-10 w-auto">
                    <h1 class="ml-3 text-xl font-semibold text-gray-800">Gallery Management</h1>
                </div>
                <div class="flex items-center">
                    <a href="gallery.php" class="text-gray-600 hover:text-blue-600 mr-4">
                        <i class="fas fa-eye mr-1"></i> View Gallery
                    </a>
                    <a href="index.html" class="text-gray-600 hover:text-blue-600">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Status Message -->
        <?php if (!empty($message)): ?>
            <div class="mb-6 p-4 rounded-md <?php echo $messageType === 'success' ? 'bg-green-50 text-green-700 border border-green-300' : 'bg-red-50 text-red-700 border border-red-300'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Add/Edit Event Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Manage Events</h2>
            <form method="POST" action="">
                <input type="hidden" id="event_index" name="event_index">
                <div class="flex flex-col md:flex-row gap-4">
                    <input type="text" id="event_name" name="event_name" placeholder="Event Name" required class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" id="event_submit_btn" name="add_event" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-2"></i> Add Event
                    </button>
                </div>
            </form>
        </div>

        <!-- Manage Events List -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <?php if (empty($events)): ?>
                <p class="text-gray-500 text-center py-4">No events found. Add an event to get started.</p>
            <?php else: ?>
                <div class="space-y-8">
                    <?php foreach ($events as $index => $event): ?>
                        <div class="border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 pb-4 border-b border-gray-200">
                                <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($event['event']); ?></h3>
                                <div class="flex mt-2 md:mt-0 space-x-2">
                                    <!-- Edit Event Button -->
                                    <button type="button" onclick="editEvent('<?php echo $index; ?>', '<?php echo htmlspecialchars($event['event']); ?>')" class="text-yellow-600 hover:text-yellow-800">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Delete Event Button -->
                                    <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this event and all its images?');" class="inline">
                                        <input type="hidden" name="event_index" value="<?php echo $index; ?>">
                                        <button type="submit" name="delete_event" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-gray-500">Images: <?php echo count($event['images']); ?></p>
                            
                            <!-- Toggle Images Button -->
                            <button type="button" class="toggle-images-btn text-blue-600 mt-2" data-target="images-container-<?php echo $index; ?>">
                                <i class="fas fa-eye"></i> Toggle Images
                            </button>

                            <!-- Images Container -->
                            <div id="images-container-<?php echo $index; ?>" class="hidden mt-4">
                                <?php if (!empty($event['images'])): ?>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-6">
                                        <?php foreach ($event['images'] as $imgIndex => $image): ?>
                                            <div class="relative group">
                                                <img src="<?php echo $image; ?>" alt="<?php echo htmlspecialchars($event['event']); ?>" class="preview-image rounded-md border border-gray-200">
                                                <form method="POST" action="" class="absolute top-0 right-0 hidden group-hover:block" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                                    <input type="hidden" name="event_index" value="<?php echo $index; ?>">
                                                    <input type="hidden" name="image_index" value="<?php echo $imgIndex; ?>">
                                                    <button type="submit" name="delete_image" class="bg-red-600 text-white p-1 rounded-full hover:bg-red-700 transition-colors">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <p class="text-gray-500 mb-4">No images found for this event.</p>
                                <?php endif; ?>

                                <!-- Upload Images Form -->
                                <h4 class="text-lg font-medium text-gray-700 mb-3">Upload New Images</h4>
                                <form method="POST" action="" enctype="multipart/form-data" class="mb-4">
                                    <input type="hidden" name="event_index" value="<?php echo $index; ?>">
                                    <div class="flex flex-col space-y-4">
                                        <input type="file" name="images[]" multiple accept="image/*" class="border border-gray-300 rounded-md p-2">
                                        <button type="submit" name="add_images" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">
                                            <i class="fas fa-upload mr-2"></i> Upload Images
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function editEvent(index, name) {
            document.getElementById('event_index').value = index;
            document.getElementById('event_name').value = name;
            document.getElementById('event_submit_btn').innerText = 'Update Event';
            document.getElementById('event_submit_btn').name = 'edit_event';
        }

        document.querySelectorAll('.toggle-images-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById(this.dataset.target).classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
