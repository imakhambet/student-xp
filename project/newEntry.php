<?php include('includes/server.php'); ?>
<?php include('includes/uploadImage.php'); ?>
<?php require_once('includes/public_functions.php') ?>
<?php $countries = getAllCountries(); ?>

<!-- Tento soubor dava prihlasenemu uzivatelu pridat svut prispevek -->
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>New entry</title>
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="css/styleNew.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>

		<div class="wrapper">
			<h2>New entry</h2>
            
            <!-- PHP kontrola -->
			<?php include('includes/errors.php'); ?>
            
			<form action="newEntry.php" method="post" enctype="multipart/form-data" onsubmit="return newEntVal()" name="newEnt">
				<div class="detali">
					<!-- Vyberove pole pro vyber statu, pokud stat neni v seznamu, uzivatel vybere 'jiny' stat  -->
                    <label for="countryForm">Country<span>*</span></label>
					<select id="countryForm" placeholder="Country..." name="country" value="<?php echo $country; ?>" required tabindex="1">
						<?php if(!empty($_POST['country'])): ?> 
							<option><?php echo $country ?></option> 
						<?php else: ?> 
							<option>Select country</option>
						<?php endif; ?>
						
						<?php foreach($countries as $_country): ?>
							<option><?php echo $_country; ?></option>
						<?php endforeach ?>
					</select>
					<!-- textove pole pro nazve univerzity -->
                    <label for="uniForm">University<span>*</span></label>
					<input type="text" id="uniForm" placeholder="University..." name="university" value="<?php echo $univ; ?>" required tabindex="2">
					<!-- textove pole pro nadpisu prispevku -->
                    <label for="titleForm">Title<span>*</span></label>
					<input type="text" id="titleForm" placeholder="Title..." name="title" value="<?php echo $title; ?>" required tabindex="3">
					<!-- textove pole pro prispevek -->
                    <label for="newText">Text<span>*</span></label>
					<textarea name="newEntry" id="newText" rows="13" cols="90" placeholder="Write something to your new entry..." tabindex="4"><?php echo $body; ?></textarea>
					<!-- nahrat soubor -->
					<form method="post" enctype="multipart/form-data">  
						<label for="image" id="imageLabel">Your image: </label><input type="file" name="image" id="image" tabindex="4"/> 
					</form>
					<p>Would be better, if you will use image with aspect ratio 16:9!</p>
					
					<!-- chyby, ktere jsou vytvoreny v script.js -->
					<p id="country_err"></p>
					<p id="university_err"></p>
					<p id="title_err"></p>
					<p id="text_err"></p>
            		<p class="required"><span>*</span> - required field</p>
					<button class="btnPost" type="submit" name="post" tabindex="5">POST</button>
				</div>
			</form>
		</div>
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	</body>
	
	<script src="js/script.js"></script>
</html>
