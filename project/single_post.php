<?php  include('includes/server.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php	if(isset($_GET['post-slug'])) {	$post = getPost($_GET['post-slug']); } 	?>

<!-- stranka prispevka s plnou informaci -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> <?php echo $post['title'] ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="css/style.css"> 		
        <link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!--header-->
        <?php include('includes/header.php'); ?>
            <?php if(isset($_GET['post-slug'])): ?>
                <div class="full-post">
                    <!-- velke foto -->
                    <div class="image">
                        <?php 
                            $connect = mysqli_connect("localhost", "ismukmak", "webove aplikace", "ismukmak");  
                            $title = $post['title'];
                            $query = "SELECT * FROM tbl_images WHERE `title` = '$title'";  
                            $result = mysqli_query($connect, $query);  
                            $row = mysqli_fetch_array($result);  
                            if($row['name'] === '' || $row == 0 ):
                                echo '<hr>';
                            else:
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" width="400" height="220" alt="postImage">'; 
                            endif;
                        ?>
                    </div>

                    <h2><?php echo $post['title']; ?></h2>

                    <h3>Pubblished by <span id="author"><?php echo $post['author']; ?></span> at <?php echo date("F j, Y ", strtotime($post["created_at"])) ?></h3>

                    <h4>Country: <span id="countryName"><?php echo $post['country']; ?></span></h4>

                    <h4>University: <span id="uniName"><?php echo $post['university']; ?></span></h4>

                    <div class="post-body">
                        <p><?php echo nl2br($post['body']); ?></p>
                    </div>

                    <?php 
                            $author = $post['author'];
                            $query = "SELECT * FROM users WHERE username='$author'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_array($result);  
                            $authorEmail = $row['email']; 
                    ?>

                    <!--tlacitko delete -->
                    <?php if(isset($_SESSION['username']) && ($_SESSION['username'] === $post['author'] || $post['author'] === 'Deleted user')) : ?>
                        <a href="includes/server.php?del=<?php echo $post['id'] ?>&title=<?php echo $post['title']; ?>" id="delPost">Delete</a>

                    <!--tlacitko delete a email -->
                    <?php elseif(isset($_SESSION['username']) && $_SESSION['username'] === 'admin'): ?>
                        <p id="contactAuthor"> You can contact posts author by <a href="mailto:<?php echo $authorEmail; ?>" class="fa fa-envelope-o" target="_blank"></a></p>
                        <a href="includes/server.php?del=<?php echo $post['id'] ?>&title=<?php echo $post['title']; ?>" id="delPost">Delete</a>

                    <!-- email -->
                    <?php else: ?>
                        <p id="conctactAuthor"> You can contact posts author by <a href="mailto:<?php echo $authorEmail; ?>" class="fa fa-envelope-o" target="_blank"></a></p>

                    <?php endif; ?> 
                </div>
            <?php else: echo ''; endif;?>
        <!--footer -->
        <?php include('includes/footer.php'); ?>
    </body>
</html>