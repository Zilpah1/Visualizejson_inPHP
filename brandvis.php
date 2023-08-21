<?php
// Read the JSON file content
$jsonString = file_get_contents('branddata.json');

// Decode the JSON data into a PHP associative array
$data = json_decode($jsonString, true);

if ($data !== null) {
    // Access the data in the JSON structure
    $category = $data['category'];
    $title = $data['title'];
    $description = $data['description'];
    $keywords = $data['keywords'];
    $activeCategory = $data['active_category'];
    $posts = $data['posts'];

    // Output some of the data
    echo "Category ID: " . $category['id'] . "<br>";
    echo "Category Name: " . $category['name'] . "<br>";
    echo "Title: " . $title . "<br>";
    echo "Description: " . $description . "<br>";
    echo "Keywords: " . $keywords . "<br>";
    echo "Active Category: " . $activeCategory . "<br>";

    // Output the list of posts
    echo "<h2>Posts</h2>";
    foreach ($posts as $post) {
        echo "Post ID: " . $post['id'] . "<br>";
        echo "Post Title: " . $post['title'] . "<br>";
        echo "Post Slug: " . $post['slug'] . "<br>";
        echo "Keywords: " . $post['keywords'] . "<br>";
         // Display the default image if it exists
        if (!empty($post['image_default'])) {
            echo "Image Default" . "<br>";
            echo "<img src='https://www.thebrand.ai/i/" . $post['image_default'] . "' width='200px' alt='Image for " . $post['title'] . "'>";
            
        }
        else {
            echo "Image Default: " . $post['image_default'] . "<br>";
        }
        ?> <br><br> <?php
         // Display the small image if it exists
        if (!empty($post['image_small'])) {
            echo "Image Small" . "<br>";
            echo "<img src='https://www.thebrand.ai/i/" . $post['image_small'] . "' width='200px' alt='Image for " . $post['title'] . "'>";
        }
        else {
            echo "Image Small: " . $post['image_small'] . "<br>";
        }
        ?> <br> <?php
   
        echo "Created At: " . $post['created_at'] . "<br>";
        echo "Category ID: " . $post['category_id'] . "<br>";
        echo "Category Name: " . $post['category_name'] . "<br>";
        echo "Category Slug: " . $post['category_slug'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Failed to decode JSON.";
}
?>