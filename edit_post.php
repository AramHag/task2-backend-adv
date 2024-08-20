<?php


include('./posts.php');

$edit_post = new Post();

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $edit = $edit_post->updatePost($_POST, $id);
}
?>


<!-- Form to add new post -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #dddddd;">

    <div class="container shadow bg-white p-5 mt-5 border rounded">
        <div class="p-3 mb-3 border-bottom border-primary d-flex justify-content-between">
            <h3>Add New Post</h3>
            <a href="./list_posts.php" class="btn btn-info">Show All Posts</a>
        </div>

        <?php
        $getPost = $edit_post->getPostById($id);
        if ($getPost) {
            while ($row = mysqli_fetch_assoc($getPost)) {
        ?>
                <form method="POST">
            <div class="form-group">
                <label for="title" class="form-label">Post title</label>
                <input type="text" class="form-control" name="title" value="<?=$row['title']?>">
            </div>
            <div class="form-group mt-2">
                <label for="content" class="form-label">Post content</label>
                <textarea name="content" id="content" class="form-control"> <?php echo $row['content'];?></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="author" class="form-label">Author</label>
                <input name="author" id="author" class="form-control" value="<?=$row['author']?>">
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-md">Save</button>
            </div>

        </form>
        <?php

            }
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>