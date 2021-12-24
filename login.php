<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>
<body>
	
<div class="box-background">
<div class="painel">

	<div id="box-form">
	
		<form method="post" class="formm">
			<h1 class="title">Welcome to AOT
			</h1>
			<h2  class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis nam adipisci ratione at. Quasi a quaerat aut reprehenderit officiis dignissimos, qui nihil eos tempore tempora mollitia cupiditate. Repudiandae, quod aspernatur?</h2>

			<div class="form__div">
                    <input type="text" class="form__input" placeholder=" " name="user_name">
                    <label for="" class="form__label">Email</label>
                </div>

                <div class="form__div">
                    <input type="password" class="form__input" placeholder=" " name="password">
                    <label for="" class="form__label">Password</label>
                </div>
				<input type="submit" class="btn-login" value="Signin">
				<h4>Have an Accontu <a href="#">Sing In</a></h4> 

				
		</form>
	</div>
	</div>	
	<div class="painel-02">
	<div id="box-form">
		<form method="post">
			<img src="avatar.png" alt="" class="imagem">
		</form>
	</div>
	</div>	

</div>
</div>

</body>
</html>