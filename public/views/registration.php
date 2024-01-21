<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>

<link rel = "icon"
 href="public/img/logo.png" 
type = "image/x-icon"> 

<link rel="stylesheet" type = "text/css"
href="public/css/registration.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>

</head>

<body>

 <div class="login-container">
    <div class="logo-image-container">
            <img src = "public/img/logo.png" alt = "logo" class="center">
    </div>
     <form action="registration" method="POST">
         <?php
         if(isset($messages)){
             foreach($messages as $message) {
                 echo $message;
             }
         }
         ?>
     <div class="name-surname-group">
        <div class="form-group name-field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group surname-field">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" required>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class="form-group">
        <input type="checkbox" id="remember">
        <label for="remember">I confirm that I have read and understood the Privacy Policy</label>
    </div>
    <button type="submit">Sign up</button>
     </form>
</div>

</body>
</html>
