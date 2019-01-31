<?php  include('includes/server.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['byCountry'])) {
		$posts = getPostsByCountry($_GET['byCountry']);
	}
?>

<!-- Tento soubor vypisuje publikace, ktera vratila funkce 'getPostsByCountry' --> 
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $_GET['byCountry']?></title>
		<link rel="stylesheet" href="css/style.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>
			
		<div class="entEnscr"><h1>All entries from <?php echo $_GET['byCountry'] ?></h1><hr></div>
        
        <!-- prispevky podle statu -->
		<div class="content">
			<?php if(count($posts) == 0): ?>
				<h2 style="text-align:center;">You can be first who write about study in <?php echo $_GET['byCountry'] ?></h2>
				<div class="newEntry">
					<?php if (isset($_SESSION['username'])) : ?>
					<a href="newEntry.php">POST NEW ENTRY</a>
					<?php else: ?>
					<a href="#" id="notLoginNewPost">POST NEW ENTRY</a>
					<?php endif ?>
				</div>
				<div id="myModal" class="modal">
					<div class="modal-content">
						<p>You must be login user!</p>
						<a href="login.php" id="login">Login</a>
						<a href="signup.php" id="signup"> Sign Up</a>
						<span class="close">&times;</span>
					</div>
				</div>
			<?php else: ?>
				<ul>
				<?php foreach($posts as $post): ?>
					<li>
                        <!-- kratky popis prispevku -->
                        <?php include('includes/shortPost.php') ?>
					</li>	
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
        </div>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	   
        <script src="js/script.js"></script>
	</body>
</html>

