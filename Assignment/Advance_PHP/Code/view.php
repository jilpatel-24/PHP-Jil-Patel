<?php
// --- View (user_view.php) ---
class UserView {
    public function renderUsers($users) 
	{
        echo "<h2>Users</h2>";
        echo "<ul>";
        foreach ($users as $id => $user) 
		{
            echo "<li>" . htmlspecialchars($user['name']) . " (" . htmlspecialchars($user['email']) . ")</li>";
        }
        echo "</ul>";
    }

    public function renderUserDetail($user) 
	{
        if ($user) 
		{
            echo "<h2>User Detail</h2>";
            echo "<p>Name: " . htmlspecialchars($user['name']) . "</p>";
            echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
        } 
		else 
		{
            echo "<p>User not found.</p>";
        }
    }
}
?>
