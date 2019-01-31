<?php include('includes/server.php'); ?>

<!--Tento soubor dava moznost zaregistovat si -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Sign up</title>
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="css/styleLog.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>
        
		<h2>Registration</h2>
		<!-- PHP kontrola pokud neni zapnuty JS script nebo kontrola na existovani uz zaregistrirovannych username nebo email -->
		<?php include('includes/errors.php'); ?>
		<form class="form-signup" method="post" action="signup.php" onsubmit="return regVal()" name="signup">
			<!-- textove pole pro username -->
			<label for="username">Username <span>*</span></label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username..." value="<?php echo $username; ?>" required tabindex="1">
			<p id="username_err"></p>
            
			<!-- textove pole pro email -->
			<label for="email">Email <span>*</span></label>
			<input type="text" name="email" id="email" class="form-control" placeholder="Email..." value="<?php echo $email;?>" required tabindex="2">	
			<p id="email_err"></p>		
			
            <!-- textove pole pro heslo -->
            <label for="password">Password <span>*</span></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password..." required tabindex="3">
			<p id="password_err"></p>
			
            <!-- textove pole pro potvrzeni hesla -->
            <label for="password2">Confirm password <span>*</span></label>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm password..." required tabindex="4">
			<p id="password2_err"></p>
			
            <button class="done" type="submit" name="signup" tabindex="5">Done</button>
			<p class="required"><span>*</span> - required field</p>
			<p id="forMember">Already a member?<a href="login.php" >Log in</a></p>
		</form>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
        <script src="js/script.js"></script>
	</body>
</html>
