<?php include('includes/server.php'); ?>
<?php require_once('includes/public_functions.php') ?>
<?php $posts = getLastPosts(); ?>

<!-- Tento soubor je hlavni stranka webove stranky, dava moznost otevrit stranku s vytvorenim prispevku a ukazuje 6 poslednich prispevku -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>student | XP</title>

		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel=stylesheet href="css/style.css" id=css>
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>

        <!-- tlacitko pro otevreni stranky, kde uzivatel muze vytvorit novy prispevek -->
		<div class="newEntry">
			<?php if (isset($_SESSION['username'])) : ?>
			<a href="newEntry.php">POST NEW ENTRY</a>
			<?php else: ?>
			<a href="#" id="notLoginNewPost">POST NEW ENTRY</a>
			<?php endif ?>
		</div>

		<!-- modalni okno, ktere se otevira, kdyz uzivatel stlaci tlacitko
		'post new entry', pokud nebude prihlaseny --> 
		<div id="myModal" class="modal">
			<div class="modal-content">
				<p>You must be login user!</p>
				<a href="login.php" id="login">Login</a>
				<a href="signup.php" id="signup"> Sign Up</a>
				<span class="close">&times;</span>
			</div>
		</div>

		<div class="entEnscr"><h1>Last entries</h1><hr></div>
        
        <!-- posledni 6 prispevky -->
		<div class="content">
			<ul>
				<?php foreach($posts as $post): ?>
					<li>
                        <!-- kratky popis prispevku -->
						<?php include('includes/shortPost.php') ?>
					</li>	
				<?php endforeach; ?>
            </ul>
        </div>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	
        <script src="js/script.js"></script>
	</body>
</html>
