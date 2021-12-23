<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

session_start();

    include('functions.php');
    include('connection.php');

    $user_data = check_login($con);

    // Validar POST do form para cadastrar o filme
    if (isset($_POST['register-movie'])){
        $movie_name = $_POST['name-movie'];
        $description = $_POST['description'];
        $msg = register_movie($con, $_FILES, $movie_name, $description);
        echo $msg;
    }
    



?>
    <form action="register-movie.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name-movie">
        <input type="text" name="description">
        <input type="file" required name="arquivo">
        <input type="submit" name='register-movie' value="salvar">
    </form>



</body>
</html>