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

    <header>
    <div class ="container_menubar">

        <nav>
            <ul>    
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="/">Log out</a></li>
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
            <input type="text" name="filmName" placeholder="Film Name">
            <input type="text" name="releaseDate" placeholder="Release Date">
            <input type="text" name="filmGenre" placeholder="Film Genre">
            <input type="text" name="cast" placeholder="Cast">
            <input type="text" name="director" placeholder="Director">
            <input type="text" name="certificate" placeholder="Age Restrictions">
            <input type="file" name="file" placeholder="Film Poster">
            <button type="submit" class="btn-submit">Add Film</button>
        </form>
    </div>
    </body>
</html>
