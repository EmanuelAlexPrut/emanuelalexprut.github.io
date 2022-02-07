<?php

// Sección del header
?>
<?php

session_start();
include_once "../DBController.php";

if(isset($_POST["email"])){
	$email= $_POST["email"];
}else{
	$email="";
}
if(isset($_POST["name"])){
	$name= $_POST["name"];
}else{
	$name="";
}
if(isset($_POST["lastname"])){
	$lastname= $_POST["lastname"];
}else{
	$lastname="";
}
if(isset($_POST["birthdate"])){
	$birthdate= $_POST["birthdate"];
}else{
	$birthdate="";
}
if(isset($_POST["password"])){
	$password= $_POST["password"];
}else{
	$password="";
}
if(isset($_POST["passconfirm"])){
	$passconfirm= $_POST["passconfirm"];
}else{
	$passconfirm="";
}

$errors = array(); 
if($email!=null && $name!=null && $lastname!=null && $birthdate!=null && $password!=null ){
	// recibe los inputs del formulario
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$birthdate = mysqli_real_escape_string($con, $_POST['lastname']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

  
	// validación de datos
	if (empty($email)) { array_push($errors, "<p>Email is required</p>"); }
	if (empty($name)) { array_push($errors, "<p>Name is required</p>"); }
	if (empty($lastname)) { array_push($errors, "<p>Lastname is required</p>"); }
	if (empty($birthdate)) { array_push($errors, "<p>Birthdate is required</p>"); }
	if (empty($password)) { array_push($errors, "<p>Password is required</p>"); }
	if ($password != $passconfirm) {
	  array_push($errors, "<p>The passwords do not match: <p>");
	}
  
	// comprueba en la base de datos que el usuario no este creado
	$user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if ($user) { // en caso de que el usuario existe
	  if ($user['email'] === $email) {
		array_push($errors, "This user already exists");
	  }
  
	  if ($user['email'] === $email) {
		array_push($errors, "email already exists");
	  }
	}
  
	if (count($errors) == 0) {
		$password_encrypt = sha1($password);//encripta en hash
  
		$query = "INSERT INTO `users` (`id`, `email`, `name`, `lastname`, `birthdate`, `password`) 
				  VALUES(NULL, '".$email."', '".$name."','".$lastname."','".$birthdate."','".$password_encrypt."')";
		mysqli_query($con, $query);

		if(!$query){
			echo "<script>alert('No se ha podido realizar el registro!');</script>";
			header('Refresh:0');
		}else{
			echo "<script>alert('Registrado Correctamente');</script>";
			header('Refresh:0 ; url= formulario-Login.php');
		}
			
	}
}
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
<form action="./formulario-Register.php" method = "post">
	<div class="registerBox">
		<div class="form1">
		<div class="title flex">
		<h1>Register:</h1>
		</div>
		<label for="email">Email:</label>
		<div class="e">
		<input type="text" name="email" /><br>
		</div>
		
		
		<label for="name">Name:</label>
		<div class="n">
		<input type="text" name="name" /><br>
		</div>
	
		
		<label for="lastname">Last Name:</label>
		<div class="l">
		<input type="text" name="lastname" /><br>
		</div>
		
		
		<label for="birthdate">Birth Date:</label>
		<div class="d">
        <input type="date" name="birthdate" /><br>
		</div>
		

		<label for="password">Password:</label>
		<div class="p">
		<input type="password" name="password" /><br>
		</div>
		
		
		<label for="passconfirm">Password Confirm:</label>
		<div class="pc">
        <input type="password" name="passconfirm" /><br>
		</div>
		<div class="b">
 		<input type="submit" class="ok flex"  value="Register"/>
		</div>
		</div>
	 </form>
	</div>	
</body>
</html>