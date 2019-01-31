<?php
	session_start();

	$username = "";
	$email = "";
	$errors = array();

	$db = mysqli_connect('localhost', 'ismukmak', 'webove aplikace', 'ismukmak');

	if (!$db) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

    //registrace
	if(isset($_POST['signup'])) {
        //bere udaje z inputu, ktere byly predany pres metodu POST
		$username = htmlspecialchars(strtolower(mysqli_real_escape_string($db, $_POST['username'])), ENT_QUOTES);
		$email = htmlspecialchars(strtolower(mysqli_real_escape_string($db,$_POST['email'])), ENT_QUOTES);
		$password = htmlspecialchars(mysqli_real_escape_string($db,$_POST['password']), ENT_QUOTES);
		$password2 = htmlspecialchars(mysqli_real_escape_string($db,$_POST['password2']), ENT_QUOTES);
		
        //dotaz do DB pro zjisteni existovani username v db
		$sql_username = "SELECT * FROM users WHERE username='$username'";
		$res_username = mysqli_query($db, $sql_username);			
		if(mysqli_num_rows($res_username)>0) {	array_push($errors, "Username already taken!");	}
        
        //dotaz do DB pro zjisteni existovani email v db
		$sql_email = "SELECT * FROM users WHERE email='$email'";
		$res_email = mysqli_query($db, $sql_email);			
		if(mysqli_num_rows($res_email)>0 && $email !== '') {	array_push($errors, "Email already taken!");}

        //kontrola na zadani mozne prazdne zadani
		if (empty($username)) {   array_push($errors, "Username is required"); }
        if (empty($email)) {    array_push($errors, "Email is required"); }
		if (empty($password)) {   array_push($errors, "Password is required"); }
        
        //kontrola na spravnost zadani udaju
		if (!preg_match ('/[a-zA-Z0-9 ]/', $username) || strlen($username) < 3){	
            array_push($errors, "Username is not valid");		
        }
		if ($password != $password2) {    array_push($errors, "The two passwords do not match");  }
		if(strlen($password) < 6 && !empty($password) && !empty($password2)){
			array_push($errors, "Password must be at least 6 characters");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo("$email is not a valid email address");
		}
	 
        //registruje uzivatele pokud pole chyb prazdne
		if(count($errors) == 0) {
            //sul
            $salt = rand(100000, 999999);
            // solim heslo
            $password_hash = md5($password . $salt);
            $sql = "INSERT INTO users (username, email, password, salt) VALUES ('$username', '$email', '$password_hash', '$salt')";
			mysqli_query($db,$sql);
            //nastavi username pro session
			$_SESSION['username'] = $username;
			header('location: index.php');
		}
	}

	if(isset($_POST['login'])) {
        //bere udaje z inputu, ktere byly predany pres metodu POST
        $username = htmlspecialchars(mysqli_real_escape_string($db, $_POST['username']), ENT_QUOTES);
		$password = htmlspecialchars(mysqli_real_escape_string($db,$_POST['password']), ENT_QUOTES);
		//kontrola na zadani udaju
	  	if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password)) { array_push($errors, "Pasword is required"); }
		
		if(count($errors) == 0) {
            //dotaz do DB pro zjisteni o existovani zadaneho username v db
			$query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($db, $query);
            //konrolujeme existovani zadaneho username v DB
            if(mysqli_num_rows($result) >= 1){
                $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $dbPassword = $user[0]['password'];
                $salt = $user[0]['salt'];
                //solim zadane heslo
                $salted = md5($password . $salt);
                //srovnavame s osolenym heslem z DB a kontrolujeme na spravnost zadaneho heslo k jmenu
                if($salted === $dbPassword) {
                    //nastavujeme jmeno uzivatele pro SESSION
                    $_SESSION['username'] = $username;
                    header('location: index.php');
                }else{
                    array_push($errors, "Wrong username/password combination");
                }
			}	
			else {
                array_push($errors, "Not registered username");

			}
		}
	}
	
    //odhlasi prihlaseneho uzivatele a presmeruje uz neprihlasenneho uzivatele do hlavni stranky
	if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
	}
	
    //zakazuje vstup do urcenych stranek bez prihlaseni a presmeruje do stranky s prihlasenim
	if(!isset($_SESSION['username'])) {
        if(basename($_SERVER["SCRIPT_FILENAME"], '.php') === 'userPage' || basename($_SERVER["SCRIPT_FILENAME"], '.php') === 'allEntries' || basename($_SERVER["SCRIPT_FILENAME"], '.php') === 'entriesByCountry' || basename($_SERVER["SCRIPT_FILENAME"], '.php') === 'single_post'|| basename($_SERVER["SCRIPT_FILENAME"], '.php') === 'newEntry') {
            header('location: login.php');
	   }
    }
    
    //vytvori prispevek
	if(isset($_POST['post'])) {
		$author = $_SESSION['username'];
		$title = htmlspecialchars(mysqli_real_escape_string($db,$_POST['title']), ENT_QUOTES);
		$country = htmlspecialchars(mysqli_real_escape_string($db,$_POST['country']), ENT_QUOTES);
		$univ = htmlspecialchars(mysqli_real_escape_string($db,$_POST['university']), ENT_QUOTES);
		$slug = str_replace(array(' ', '&amp', '&lt', '&quot', '&#039', '&gt'), '_', $title) .'-'. $author;
		$body = htmlspecialchars(mysqli_real_escape_string($db,$_POST['newEntry']), ENT_QUOTES);
		
        //kontroluje jestlize uzivatel, ktery uz ma prispevek s zadanym nadpisem 
		$sql_slug = "SELECT * FROM posts WHERE slug='$slug'";
		$res_slug = mysqli_query($db, $sql_slug);			
		if(mysqli_num_rows($res_slug)>0) {	array_push($errors, "Title already taken!");	}
		
        //kontrola na prazdne zadani udaju
		if (empty($title)) {  array_push($errors, "Title is required");   }
		if (empty($body)) {   array_push($errors, "Text is required");    }
		if (empty($univ)) {   array_push($errors, "University is required"); }
		if($country === 'Select country') {   array_push($errors, "Country is required"); }
        
        //pokud vsechno zadano spravne, zanese tento prispevek do tabulky 'posts' do DB a presmeruje uzivatele do 
		if(count($errors) == 0) {		
			$sql = "INSERT INTO `posts` (`author`, `title`, `country`, `university`, `slug`, `body`, `created_at`) VALUES ('$author', '$title', '$country', '$univ', '$slug', '$body', CURRENT_TIMESTAMP);";
			mysqli_query($db,$sql);
			header("location: index.php");
		}

	}

    //da moznost spravci nebo autoru smazat prispevek  
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$title = $_GET['title'];
		$query = "DELETE FROM `posts` WHERE `id` = '$id'"; 
		mysqli_query($db, $query);
		$query1 = "DELETE FROM `tbl_images` WHERE `title` = '$title'";
		mysqli_query($db, $query1);
		header('location: http://wa.toad.cz/~ismukmak/ZWA/index.php');
	}

    //da moznost uzivatele smazat svuj ucet, a vsechny prispevky tohoto uzivetele budou mit autora 'Deletd user'
	if (isset($_GET['delAcc'])) {
		$user_id = $_GET['delAcc'];
		$username = $_SESSION['username'];
		$query1 = "UPDATE `posts` SET `author`= 'Deleted user' WHERE author = '$username'";
		mysqli_query($db, $query1);

		$query = "DELETE FROM `users` WHERE `id` = '$user_id'"; 
		mysqli_query($db, $query);
		session_destroy();
		unset($_SESSION['username']);
		header('location: http://wa.toad.cz/~ismukmak/ZWA/index.php');
	}
?>