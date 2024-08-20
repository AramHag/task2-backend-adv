<?php
include('./posts.php');

$list_of_posts = new Post();


if(isset($_GET['deletePost']))
{
    $id = base64_decode($_GET['deletePost']);
    $delete_post = $list_of_posts->deletePost($id);
    
}
?>
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
        <div class="mb-3 p-3 border-bottom border-success d-flex justify-content-between">
            <h3>List Of Posts</h3>
            <a href="./add_post.php" class="btn btn-success">Add New Post</a>
        </div>
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php

                    $all_posts = $list_of_posts->all_posts();
                    if ($all_posts) {
                        while ($row = mysqli_fetch_assoc($all_posts)) {
                    ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['author'] ?></td>
                                <td><?= $row['content'] ?></td>
                                <td>
                                    <a href="edit_post.php?id=<?=base64_encode($row['id'])?>" class="btn btn-info btn-md" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="?deletePost=<?=base64_encode($row['id'])?>" onclick="return confirm('Are you sure to delete this post')" class="btn btn-danger btn-md" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>