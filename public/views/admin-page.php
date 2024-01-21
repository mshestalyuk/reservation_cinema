<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Users</title>
    <link rel="stylesheet" type="text/css" href="public/css/admin-page.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['user']['role'])) {
    // Assuming that you set a 'role' in $_SESSION['user'] when logging in
    // And assuming 'admin' is the role you're checking for
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'admin') {
        // Set a session message that can be displayed on the login page
        $_SESSION['message'] = "You do not have enough rights to access the admin panel.";

        // Redirect to the login page
        header('Location: /home');
        exit();
    } else {
        // If no user is logged in at all, just redirect to login without setting a message
        header('Location: /login');
        exit();
    }
}
?>
<header>
    <div class ="container_menubar">

        <nav>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="profile_details">Profile</a></li>
                <?php if (isset($_SESSION['user']) || isset($_SESSION['admin'])): ?>
                    <li><a href="/logout" id="logoutButton">Log out</a></li>
                <?php else: ?>
                    <li><a href="/login">Log in</a></li>
                <?php endif; ?>
                <li><a href="#">EN</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="admin-container">
    <h1>Manage Users</h1>
    <table class="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- User rows will be inserted here -->
        <tr>
            <?php foreach ($users as $user): ?>

                <td>1</td>
            <td>johndoe@example.com</td>
            <td>John</td>
            <td>Doe</td>
            <td>694078001</td>
            <td>user</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
            <?php endforeach; ?>

        </tr>
        <!-- Repeat for each user -->
        </tbody>
    </table>
</main>

<footer>
    <!-- Your existing footer goes here -->
</footer>
</body>
</html>
