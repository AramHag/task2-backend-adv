<?php


include('./posts.php');

// invoke and object from Class Post
$add_post = new Post();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $add = $add_post->add_post($_POST);
}
?>


<!-- Form to add new post -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #dddddd;">

    <div class="container shadow bg-white p-5 mt-5 border rounded">
        <div class="p-3 mb-3 border-bottom border-primary d-flex justify-content-between">
            <h3>Add New Post</h3>
            <a href="./list_posts.php" class="btn btn-info">Show All Posts</a>
        </div>
    <form method="POST">
        <div class="form-group">
            <label for="title" class="form-label">Post title</label>
            <input type="text" class="form-control" name="title" placeholder="Write the title of the post">
        </div>
        <div class="form-group mt-2">
            <label for="content" class="form-label">Post content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Write the content of the post"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="author" class="form-label">Author</label>
            <input name="author" id="author" class="form-control" placeholder="Write the name of the author">
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary btn-md">Save</button>
        </div>
    
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>