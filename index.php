<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['username']; ?>

	<form action="index.php" method="GET">
		<input type="text" name="movie_name">
		<input type="submit" value="Buscar">
	</form>

	<?php

	if($_SERVER['REQUEST_METHOD'] != "GET"){
		$result = get_all_movies($con);
		while($row = mysqli_fetch_array($result)) {
			echo "<img width='100px'src='upload/$row[image]'>" , "<br>";
		}
	} else {
		$result = get_movies($con, $_GET['movie_name']);
		if($result){
			while($row = mysqli_fetch_array($result)) {
				echo $row['name'];
				echo "<img width='100px'src='upload/$row[image]'>" , "<br>";
			}
		} else {
			echo "Filme não encontrado!";
		}

	}

	?>
</body>
</html>