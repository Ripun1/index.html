<?php
// Specify the JSON file to store blog posts
$file = 'posts.json';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'] ?? 'Anonymous'; // Default to 'Anonymous' if no name is provided
    $category = $_POST['category'] ?? 'Uncategorized';
    $content = $_POST['content'] ?? '';

    // Validate that the content isn't empty
    if (trim($content) === '') {
        echo "Content cannot be empty!";
        exit;
    }

    // Create a new post array
    $newPost = [
        'name' => $name,
        'category' => $category,
        'content' => $content,
        'timestamp' => date('Y-m-d H:i:s') // Add a timestamp
    ];

    // Check if the file exists
    if (file_exists($file)) {
        // Read existing posts
        $posts = json_decode(file_get_contents($file), true);
        if (!$posts) {
            $posts = []; // Initialize as empty array if decoding fails
        }
    } else {
        $posts = []; // Initialize as empty array if file doesn't exist
    }

    // Appen
