<?php

//funcke ktera vrati 6 poslednich prispevku
function getLastPosts() {
	
	// use global $conn object in function
	global $db;
	$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 6";
	$result = mysqli_query($db, $sql);
	
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $posts;	
}

//funcke ktera vrati vsechna prispevky
function getAllPosts() {
	
	// use global $conn object in function
	global $db;
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = mysqli_query($db, $sql);
	
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $posts;	
}

//funkce ktera vrati prispevky uzivatele
function getMyPosts() {
	$username = $_SESSION['username'];
	// use global $conn object in function
	global $db;
	$sql = "SELECT * FROM posts WHERE author = '$username'";
	$result = mysqli_query($db, $sql);
	
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $posts;	
}

//funcke ktera vrati informace o uzivatele
function getUserInformation() {
	
	// use global $conn object in function
	global $db;
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($db, $sql);
	
	// fetch all posts as an associative array called $posts
	$user_info = mysqli_fetch_assoc($result);
	
	return $user_info;	
}

//funkce ktera vrati seznam statu
function getAllCountries() {
	$countries = array("Argentina", "Australia", "Austria", "Belarus", "Belgium", "Brazil", "Canada", "China", "Croatia", "Czech Republic", "Denmark", "Estonia", "Finland", "France", "Germany", "Greece", "Hungary", "Iceland", "India", "Ireland", "Israel", "Italy", "Japan", "Kazakhstan", "Latvia", "Lithuania", "Malaysia", "Netherlands", "New Zealand", "Norway", "Poland", "Portugal", "Russia", "Singapore", "Slovakia", "Slovenia", "South Korea", "Spain", "Sweden", "Switzerland", "Turkey", "Ukraine", "United Arab Emirates", "United Kingdom", "USA", "OTHER");
	return $countries;
}

///funkce ktera vrati prispevek podle promenne 'slug'
function getPost($slug){
	global $db;
	// Get single post slug
	$sql = "SELECT * FROM posts WHERE slug='$slug'";
	$result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) == 0) {
        header('location: index.php');
    }
	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);

	return $post;
}

//funcke ktera vrati prispevky podle statu vybranneho uzivatelem
function getPostsByCountry($country) {
	global $db;
	$sql = "SELECT * FROM posts WHERE country='$country'";
	$result = mysqli_query($db, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	return $posts;
} 

//funcke ktera vrati dnesni prispevky spravci
function getTodaysEntries() {
	global $db;
	$today = date("F j, Y").' '; 
	$query = "SELECT * FROM posts";  
	$result = mysqli_query($db, $query);  
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$todaysPosts = [];
	foreach ($row as $post):
		$date = date("F j, Y ", strtotime($post['created_at']));
		if($date === $today):
			array_push($todaysPosts, $post);
		endif;
	endforeach;

	return $todaysPosts;

}

//funcke ktera vrati dnes zaregistrovannych uzivatelu spravci 
function getTodaysUsers() {
	global $db;
	$today = date("F j, Y").' '; 
	$query = "SELECT * FROM users";  
	$result = mysqli_query($db, $query);  
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$todaysUsers = [];
	foreach ($row as $user):
		$date = date("F j, Y ", strtotime($user['created_at']));
		if($date === $today):
			array_push($todaysUsers, $user);
		endif;
	endforeach;
	return $todaysUsers;

}

//funcke ktera vrati male obrazek pro predpokaz prispevku
function getSmallImage($title) {
	global $db;
	$query = "SELECT * FROM tbl_images WHERE `title` = '$title'";  
	$result = mysqli_query($db, $query);  
	$row = mysqli_fetch_array($result);  
	if($row['name'] === '' || $row == 0):
		return '<img src="https://www.ceros.com/originals/wp-content/uploads/2017/05/Is-the-Gradient-Making-a-Comeback.jpg" width="800" height="450" alt="post image"  />';
	else:
		return '<img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" width="800" height="450" alt="post image">';  
	endif;
}
?>