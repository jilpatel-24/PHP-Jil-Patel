// app/views/user_form.php
<!DOCTYPE html>
<html>
<head>
    <title><?= isset($user) ? 'Edit User' : 'Add User' ?></title>
</head>
<body>
    <h1><?= isset($user) ? 'Edit User' : 'Add User' ?></h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= isset($user) ? $user['id'] : '' ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= isset($user) ? $user['name'] : '' ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?>" required><br>
        <input type="submit" value="<?= isset($user) ? 'Update' : 'Create' ?>">
    </form>
</body>
</html>
