<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Details</title>

<link rel = "icon"
 href="public/img/logo.png" 
type = "image/x-icon"> 

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" type = "text/css"
href="public/css/profile_details.css">

</head>
<body>
    <!-- Header -->
    <header>
    <div class ="container_menubar">

        <nav>
            <ul>    
                <li><a href="/">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Log out</a></li>
                <li><a href="#">EN</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <!-- Profile details -->
 <!-- Add this section inside your <body> tag where you want the profile details to appear -->

<div class="profile-container">
    <div class="profile-header">
        <h1>Hello, $username</h1>
        <p>Account type: $account_type</p>
    </div>
    <div class="profile-tabs">
        <a href="/my-tickets"><span>My tickets</span></a> | <a href="/profile_details" class="active-tab"><span>Personal details</span></a> |  <a href="/account"><span>Account</span></a>
    </div>

    <div class="profile-details">
        <form class="profile-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" placeholder="$name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" placeholder="$lname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="$email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" id="phone" placeholder="$pnum">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" placeholder="$city">
                </div>
                <div class="form-group">
                    <label for="current-password">Current password</label>
                    <input type="password" id="current-password" placeholder="$curpasswd">
                </div>
            </div>
            <div class="form-group">
                <label for="new-password">New password</label>
                <input type="password" id="new-password" placeholder="$newpasswd">
            </div>
            <button type="submit" class="btn-save">Save</button>
        </form>
    </div>
</div>


    <!-- Footer -->
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
