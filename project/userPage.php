<?php include('includes/server.php'); ?>
<?php require_once('includes/public_functions.php') ?>
<?php $user_info = getUserInformation(); ?>
<?php $myPosts = getMyPosts(); ?>
<?php $todayPosts = getTodaysEntries(); ?>
<?php $todayUsers = getTodaysUsers(); ?>

<!-- stranka ktera vypisuje informace o uzivatele nebo informace pro spravce -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $_SESSION['username'] ?> [student | XP]</title>
		<link rel="stylesheet" href="css/style.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>
			<div class="userInfo">
				<?php if($_SESSION['username'] === $user_info['username'] && $_SESSION['username'] !== 'admin' ) : ?>
					<h1 id="aboutMeEns">About me</h1>
					<h2>Username</h2>
					<p><?php echo $user_info['username'] ?></p>
					<h2>Email</h2>
					<p><?php echo $user_info['email'] ?></p>
					<h2>User ID</h2> 
					<p><?php echo $user_info['id'] ?></p>
					<h2>Registration date</h2>
					<p><?php echo date("F j, Y ", strtotime($user_info["created_at"])); ?></p>
					<br>
					<a href="includes/server.php?delAcc=<?php echo $user_info['id'] ?>" id="delAcc" >Delete my account</a>

				<?php else: ?>
                
					<h1> Admin page </h1>
					<div class="adminInfo">
						<!--ukazuje kolik dneska novych uzivatelu -->
						<div class="todaysUsers">
							<p id="todayUsersEns">Today was signed up <span id="quantityU"><?php echo count($todayUsers) ?></span> <?php if(count($todayUsers) == 1): echo 'user'; else: echo 'users'; endif; ?></p>
							<ul>
								<?php foreach ($todayUsers as $user): ?>
									<li>				
										<span class="todaysUser">
											<p>Username: <span id="nameValue"><?php echo $user['username'];?></span></p>
											<p>Email: <span id="emailValue"><a href="mailto:<?php echo $user['email']?>" title="Send mail to this adress"><?php echo $user['email']?></a></span></p>
										</span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						
						<!--ukazuje kolik dneska novych prispevku -->
						<div class="todaysPosts">
							<p id="todayPostsEns">Today was published <span id="quantityP"><?php echo count($todayPosts) ?></span>  <?php if(count($todayPosts) == 1): echo 'entry'; else: echo 'entries'; endif; ?></p>
							<ul>
								<?php foreach ($todayPosts as $post): ?>
									<li>				
										<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
											<span class="todayPost">
												<h2 id="todayTitle"><?php echo $post['title'] ?></h2> 

												Country: <?php echo $post['country'];?><br>
												University: <?php echo $post['university'] ?>
											</span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?> 
            </div>	
		
		<div class="entEnscr"><h1 id="myEntriesEns">My entries</h1><hr></div>
		
        <?php if(count($myPosts) == 0): ?>
		<h2 style="text-align:center;">You haven't written not a single post, but you can write it</h2>
						<div class="newEntry">
					<?php if (isset($_SESSION['username'])) : ?>
					<a href="newEntry.php">POST NEW ENTRY</a>
					<?php else: ?>
					<a href="#" id="notLoginNewPost">POST NEW ENTRY</a>
					<?php endif ?>
				</div>
        <?php else: ?>
            <!-- prispevky uzivatele -->
            <div class="content">
				<ul>
				    <?php foreach($myPosts as $post): ?>
					   <li> 
                            <!-- kratky popis prispevku -->
                            <?php include('includes/shortPost.php') ?>
					   </li>	
				    <?php endforeach; ?>
                </ul>	
            </div>
		<?php endif;?>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	   <script src="js/script.js"></script>
	</body>
</html>
