<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <?php if ($userProfile): ?>
        <p><strong>User ID:</strong> <?php echo htmlspecialchars($userProfile['id']); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($userProfile['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($userProfile['email']); ?></p>
    <?php else: ?>
        <p>User profile not found.</p>
    <?php endif; ?>
</body>
</html>
