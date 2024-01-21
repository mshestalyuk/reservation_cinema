<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FilmName</title>

<link rel = "icon"
 href="public/img/logo.png" 
type = "image/x-icon"> 

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" type = "text/css"
href="public/css/film.css">

</head>
<body>
<?php
session_start();
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
    <div class="container_films">
    <div class="movie-content">
        <h1 class="movie-title">It's A Wonderful Knife</h1>
        <div class="movie-details">
            <p><strong>Release Date:</strong> 06 December 2023</p>
            <p><strong>Running Time:</strong> 90 min</p>
            <p><strong>Original title:</strong> It's A Wonderful Knife</p>
            <p><strong>Film genre:</strong> Comedy, Horror</p>
            <p><strong>Cast:</strong> Jane Widdop, Joel McHale, Justin Long</p>
            <p><strong>Director:</strong> Tyler MacIntyre</p>
            <p><strong>Age restrictions:</strong> N/A</p>



            <p class="movie-synopsis">After saving her town from a psychotic killer, Winnie Carruthers' life is less than wonderful. When she wishes she'd never been born, she finds herself in a nightmare parallel universe where without her, things could be much, much worse.</p>
            <!-- Add additional details here -->
        </div>
        <button type="button" class="btn-book">Book Now</button>
    </div>
    <div class="movie-poster">
        <img src="public/img/freedom.jpg" alt="Movie Poster">
    </div>
</div>

    <footer class="footer">
  	 <div class="container-footer">
       <img src = "public/img/logo.png" alt = "logo" class="logo">

       <div class="reservation-panel">
      <form action="#" method="post">
          <div class="select-box">
              <select name="cinema" required>
                  <option value="" disabled selected>Select Cinema</option>
                  <!--options here -->

              </select>
          </div>
          <div class="select-box">
              <select name="movie" required>
                  <option value="" disabled selected>Select Movie</option>
                  <!-- options here -->

              </select>
          </div>
          <button type="submit" class="btn-reserve">Book</button>
      </form>
    </div>	
     <div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
               <div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
               <div class="footer-col">
  	 			<h4>Explore our site</h4>
  	 			<ul>
  	 				<li><a href="#">What's on</a></li>
  	 				<li><a href="#">Coming soon</a></li>
  	 			</ul>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

</body>
</html>
