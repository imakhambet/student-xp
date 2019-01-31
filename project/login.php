<?php include('includes/server.php'); ?>

<!-- Tento soubor dava moznost uzivatelum prihlasit si -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Log in</title>
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="css/styleLog.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>
    
		<h2>Log In</h2>
        
        <!-- PHP kontrola -->
		<?php include('includes/errors.php'); ?>
		
        <form class="form-signup" method="post" action="login.php" onsubmit="return logVal()" name="login">
    		<!-- textove pole pro username -->
            <label for="usernameL">Username<span>*</span></label>
            <input type="text" name="username" id="usernameL" class="form-control" placeholder="Username..." value="<?php echo $username; ?>" required tabindex="1">
			<p id="username_err"></p>
            
			<!-- textove pole pro heslo -->
            <label for="passwordL">Password<span>*</span></label>
			<input type="password" name="password" id="passwordL" class="form-control" placeholder="Password..." required tabindex="2">
			<p id="password_err"></p>
			
            <button class="done" type="submit" name="login" tabindex="3">Done</button>
            <p class="required"><span>*</span> - required field</p>
            <div id="forMember">
				Not yet a member? <a href="signup.php">Sign Up</a>
			</div>
		</form>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	<script src="js/script.js"></script>
	</body>
</html>
