<html>
<head>
    <title><?php echo $post['title']; ?></title>
</head>
<body>
    <h1><?php echo $post['title']; ?></h1>
    <p><?php echo $post['content']; ?></p>

    <h2>Comments</h2>
    <ul>
        <?php while ($comment = $comments->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <strong><?php echo $comment['user_name']; ?>:</strong>
                <p><?php echo $comment['content']; ?></p>
                <a href="delete_comment.php?id=<?php echo $comment['id']; ?>&post_id=<?php echo $post['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>

    <h3>Add a Comment</h3>
    <form action="add_comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
        <input type="text" name="user_name" placeholder="Your Name" required>
        <textarea name="content" placeholder="Your Comment" required></textarea>
        <button type="submit">Submit</button>
    </form>
	
	
	<!---
	CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);
-->

</body>
</html>
