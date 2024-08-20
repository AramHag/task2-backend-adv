<?php


include('./db_connection.php');

class Post
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Add new post
     * @param $data : the data of the new post.
     */
    public function add_post($data)
    {
        $post_title = $data['title'];
        $post_content = $data['content'];
        $post_author = $data['author'];
        $created_at = date('Y/m/d  H:i:s');
        $updated_at = null;

        if ($post_title == null || $post_content == null) {
            $message = "The title of the post and the content are required , should not be empty";
            return $message;
        } else {
            $query = "INSERT INTO `posts`(`title`, `content`, `author`, `created_at`, `updated_at`) 
                VALUES('$post_title', '$post_content', '$post_author', '$created_at', '$updated_at')";
        }

        $result = $this->db->insert($query);

        if ($result) {
            $message = "New post is added";
            return $message;
        } else {
            $message = "An error has occurd";
            return $message;
        }
    }


    // return a list of all posts
    public function all_posts()
    {
        $query = "SELECT * FROM posts ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getPostById($id)
    {
        $query = "SELECT * FROM posts WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Update data of a post in database
     * 
     * @param $data : get the new data
     * @param $id : refer to the post to be updated 
     */
    public function updatePost($data, $id)
    {

        $post_title = $data['title'];
        $post_content = $data['content'];
        $post_author = $data['author'];
        $created_at = null;
        $updated_at = date('Y/m/d  H:i:s');

        if ($post_title == null || $post_content == null) {
            $message = "The title of the post and the content are required , should not be empty";
            return $message;
        } else {
            $query = "UPDATE posts SET title='$post_title', content='$post_content', author='$post_author', created_at='$created_at', updated_at='$updated_at' WHERE id = '$id'";
        }

        $result = $this->db->insert($query);

        if ($result) {
            $message = "The post is updated succeessfully";
            return $message;
            
        } else {
            $message = "An error has occurd";
            return $message;
        }
    }

    /**
     * Delete a post from database
     * 
     * @param $id
     */
    public function deletePost($id) {
        $delete_query = "DELETE FROM posts WHERE id = '$id'"; 
        $del = $this->db->delete($delete_query);
        if ($del) {
            $message = "The post is deleted succeessfully";
            return $message;
            
        } else {
            $message = "An error has occurd";
            return $message;
        }
    }
}
