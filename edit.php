<?php 

require_once 'config.php';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EDIT with PDO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
	<?php   
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	if(isset($_POST['update'])){
		//do your own validation here
		$sql = "UPDATE persontbl SET firstname=:firstname, lastname=:lastname, age=:age 
				WHERE pid=:id";
		$stmt = $pdo->prepare($sql);                                  
		$stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);  
		$stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);   
		$stmt->bindParam(':age', $_POST['age'], PDO::PARAM_STR);   
		$stmt->bindParam(':id', $id);    
		if( ! $stmt->execute()){
			echo 'Please check errors';
		}else{
			echo "<div class='alert alert-success'>Updated Successfully . <a href='index.php'>Go to List</a></div>";
		}     
	}
	$sql = "SELECT * FROM persontbl WHERE pid=:id";
	$query = $pdo->prepare($sql);
	$query->execute(array(':id' => $id));
	$row = $query->fetch(); 
	?>
	<h1>EDIT</h1><hr>
	<div class="row">
		<form action="" method="POST" class="col-md-5">
			<label for="firstname">Firstname</label>
			<input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control"> <br> 
			<label for="lastname">Lastname</label>
			<input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" class="form-control"> <br>
			<label for="age">Age</label><br>
			<input type="text" name="age"  value="<?php echo $row['age']; ?>"  size="10"> <br><br>
			<input type="submit" value="Update" class="btn btn-primary" name="update">
		</form>
	</div>
</div>
</body>
</html>