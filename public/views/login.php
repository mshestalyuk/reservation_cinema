<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>

<link rel = "icon"
 href="public/img/logo.png" 
type = "image/x-icon"> 

<link rel="stylesheet" type = "text/css"
href="public/css/login.css">

</head>

<body>

 <div class="login-container" action="login" method = "POST">
    <div class="logo-image-container">
            <img src = "public/img/logo.png" alt = "logo" class="center">
    </div> 
    <form class="login" action="login" method = "POST">
    <div class="form-group">
        <label for="email">Email address</label>
        <input name="email" type="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" id="password" required>
    </div>
    <div class="messages">
        <?php
        if(isset($messages))
        {
            foreach($messages as $message)
            {
                echo "<span>{$message}</span>";
            }
        }
        ?>
    </div>
    <button type="submit">Log in</button>
    </form>
    <div class="login-footer">
        <a href="#">Forgot my password</a>
    </div>
</div>
</body>
</html>
