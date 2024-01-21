<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AdminPanel - AddFilm</title>

    <link rel = "icon"
          href="public/img/logo.png"
          type = "image/x-icon">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" type = "text/css"
          href="public/css/add-film.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
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
<!--    <div class="container_films">-->
<!--        <a href="#" class="arrow left-arrow">&lt;</a>-->
<!---->
<!--        <div class="movie">-->
<!--            <img src="public/img/batman2.jpg" alt="batman2">-->
<!--            <a href="#" class="button">More</a>-->
<!--        </div>-->
<!--        <div class="movie">-->
<!--            <img src="public/img/batman.png" alt="batman">-->
<!--            <a href="#" class="button">More</a>-->
<!--        </div>-->
<!--        <div class="movie">-->
<!--            <img src="public/img/uncharted.jpg" alt="Uncharted">-->
<!--            <a href="#" class="button">More</a>-->
<!--        </div>-->
<!--        <div class="movie">-->
<!--            <img src="public/img/freedom.jpg" alt="Freedom">-->
<!--            <a href="#" class="button">More</a>-->
<!--        </div>-->
<!--        <div class="movie">-->
<!--            <img src="public/uploads/--><?php //= $film->getImage(); ?><!--" alt="Freedom">-->
<!--            <a href="#" class="button">More</a>-->
<!--        </div>-->
<!--        <a href="#" class="arrow right-arrow">&gt;</a>-->
<!--    </div>-->
    <div class="container_admin">
        <h2>Add New Film</h2>
        <form class="film-form" action="addFilm" method="POST" enctype="multipart/form-data">
            <?php
            if(isset($messages))
            {
                foreach($messages as $message)
                {
                    echo "<span>{$message}</span>";
                }
            }
            ?>
            <input type="text" name="name" placeholder="Film Name">
            <input type="text" name="release" placeholder="Release Date">
            <input type="text" name="genre" placeholder="Film Genre">
            <input type="text" name="cast" placeholder="Cast">
            <input type="text" name="director" placeholder="Director">
            <input type="text" name="certificate" placeholder="Age Restrictions">
            <input type="file" name="file" placeholder="Film Poster">
            <button type="submit" class="btn-submit">Add Film</button>
        </form>
    </div>
    </body>
</html>
