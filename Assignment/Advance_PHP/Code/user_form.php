<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($user) ? 'Edit User' : 'Create User'; ?></title>
</head>
<body>
    <h2><?php echo isset($user) ? 'Edit User' : 'Create User'; ?></h2>
    <form action="index.php?action=<?php echo isset($user) ? 'update' : 'create'; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($user) ? $user['id'] : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($user) ? $user['name'] : ''; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($user) ? $user['email'] : ''; ?>" required><br><br>
        <button type="submit"><?php echo isset($user) ? 'Update' : 'Create'; ?></button>
    </form>
    <a href="index.php">Back to User List</a>
</body>
</html>
