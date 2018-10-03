<?php 

require_once 'config.php';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD with PDO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
	<?php  
	if(isset($_POST['submit'])){
		//do your own validation here
		$sql = "INSERT INTO persontbl(firstname, lastname, age) VALUES(:firstname, :lastname, :age)";
		$stmt = $pdo->prepare($sql);                                  
		$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);  
		$stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);   
		$stmt->bindParam(':age', $_POST['age'], PDO::PARAM_STR);   

		if( ! $stmt->execute()){
			echo 'Please check errors';
		}else{
			echo "<div class='alert alert-success'>Sucessfully added . <a href='index.php'>Go to List</a></div>";
		}     
	}
	?>
	<h1>Create new</h1><hr>
	<div class="row">
		<form action="" method="POST" class="col-md-5">
			<label for="firstname">Firstname</label>
			<input type="text" name="firstname" class="form-control"> <br> 
			<label for="lastname">Lastname</label>
			<input type="text" name="lastname" class="form-control"> <br>
			<label for="age">Age</label><br>
			<input type="text" name="age"  size="10"> <br><br>
			<input type="submit" value="Submit" class="btn btn-primary" name="submit">
		</form>
	</div>
</div>
</body>
</html>