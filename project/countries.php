<?php include('includes/server.php'); ?>

<?php require_once('includes/public_functions.php') ?>

<?php $countries = getAllCountries(); ?>

<!-- Tento soubor vypisuje vsechny staty z pole 'countries' -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>All countries</title>
		<link rel="stylesheet" href="css/style.css"> 
		<link href="https://fonts.googleapis.com/css?family=Monda%7CSquada+One" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
        <!--header-->
		<?php include('includes/header.php')?>

		<div class="allCountryList">
			<ul>
				<?php foreach($countries as $country): ?>
                    <!-- nazev statu malymi pismenami -->
					<?php $countryFlag = mb_strtolower($country);?>
					<li> 
						<!-- odkaz na stranku s publikaci vybraneho statu -->
						<a href="entriesByCountry.php?byCountry=<?php echo $country; ?>">
							<?php if($country === "OTHER"): ?>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoKw19F-4ZcdcCm3BDPJp5fGNOqprAAgWOrvnMQAGBQrzxv8EdPA" width="22" height="13">
							<?php else: ?>
								<img src="https://gitlab.fel.cvut.cz/ismukmak/flags/raw/master/flags-medium/<?php echo $countryFlag;?>.png" width="38" height="20">
							<?php endif; ?>
							<?php echo $country; ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
        
        <!--footer -->
		<?php include('includes/footer.php'); ?>
	   <script src="js/script.js"></script>
	</body>
</html>
