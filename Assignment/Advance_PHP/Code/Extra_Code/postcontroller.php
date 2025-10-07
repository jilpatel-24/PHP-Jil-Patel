<?php
require_once 'database.php';
require_once 'post.php';

class PostController {
    private $post;

    public function __construct($db) {
        $this->post = new Post($db);
    }

    public function index() {
        $posts = $this->post->read();
        include '../views/posts/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->post->create($_POST['title'], $_POST['content']);
            header("Location: /index.php");
        }
        include '../views/posts/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->post->update($id, $_POST['title'], $_POST['content']);
            header("Location: /index.php");
        } else {
            // Fetch the post data for editing
        }
    }

    public function delete($id) {
        $this->post->delete($id);
        header("Location: /index.php");
    }
}
?>
