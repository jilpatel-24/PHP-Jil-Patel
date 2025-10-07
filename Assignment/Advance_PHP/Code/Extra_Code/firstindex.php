<html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="create.php">Create New Post</a>
    <ul>
        <?php while ($row = $posts->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['content']; ?></p>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
