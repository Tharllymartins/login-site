<?php

// Valida se o usuário está logado

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: account/login.php");
	die;

}

// Funções para adição, edição, exclusão e visualização dos filmes no banco de dados;

function register_movie($con, $FILES, $name, $description){
	$msg = false;

		// Get file name
        $extensao = substr($FILES['arquivo']['name'], -4);
        $name_file = md5(time()) . $extensao;
        $diretorio = "media/movies/";
		//Get name and description

        move_uploaded_file($FILES['arquivo']['tmp_name'], $diretorio.$name_file);
        $sql_code = "INSERT INTO movies(image, name, description) VALUES('$name_file', '$name', '$description')";
        if(mysqli_query($con, $sql_code)){
           return $msg = "cadastrado";
        } else {
            return $msg = "Erro!";
        }
}


function get_all_movies($con){
	$query = "SELECT * FROM movies;";
	$query_result = mysqli_query($con, $query);
	return $query_result;
}

function get_movies($con, $movie_name){
	$query = "SELECT * FROM movies WHERE name LIKE '%$movie_name%' ";
	$query_result = mysqli_query($con, $query);
	if (mysqli_num_rows($query_result) > 0){
		return $query_result;
	} else {
		return false;
	}
}


function del_movie($con, $id){
	$query = "DELETE FROM movies where ID=$id;";

	if(mysqli_query($con, $query)){
		return true;
	} else {
		return false;
	}
}