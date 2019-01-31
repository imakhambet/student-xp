<?php include('includes/server.php'); ?>
<?php require_once('includes/public_functions.php') ?>
<?php $allPosts = getAllPosts(); ?>

<!-- Tento soubor vypisuje vsechny publikace  podle zmenseni 'id' -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>All entries</title>
		<link rel="stylesheet" href="css/style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
    </head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>
			
		<div class="entEnscr"><h1>All entries</h1><hr></div>
        
        <!-- vsechny prispevky -->
		<div class="content">
			<ul>
			<?php foreach($allPosts as $post): ?>
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
