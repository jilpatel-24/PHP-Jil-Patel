<?php
require_once '../config/database.php';
require_once '../models/Post.php';
require_once '../models/Comment.php';

class PostController {
    private $post;
    private $comment;

    public function __construct($db) {
        $this->post = new Post($db);
        $this->comment = new Comment($db);
    }

    public function show($id) {
        $post = $this->post->readSingle($id); // Assuming you have a method to read a single post
        $comments = $this->comment->read($id);
        include '../views/posts/show.php';
    }

    public function addComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->comment->create($_POST['post_id'], $_POST['user_name'], $_POST['content']);
            header("Location: /index.php?action=show&id=" . $_POST['post_id']);
        }
    }

    public function deleteComment($id) {
        $this->comment->delete($id);
        header("Location: /index.php?action=show&id=" . $_GET['post_id']);
    }
}
?>
