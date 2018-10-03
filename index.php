<?php 

require_once 'config.php';
 
$query = $pdo->prepare("SELECT * FROM persontbl");
$query->execute();
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
<h1>List</h1>
<a href="addnew.php" class="btn btn-primary pull-right">Add New</a> <br><br>
<form action='delete.php' method='POST'> 
<?php   
echo "<table class='table table-striped'>";
echo "<tr>
		<th>#</th>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Age</th>
		<th></th> 
		</tr>";
while ($row = $query->fetch()) {
	$id = $row['pid'];
	echo "<tr>";
	echo "<td><input type='checkbox' name='persid[]' value='{$id}'></td>";
	echo "<td>{$id}</td>";
	echo "<td>" . $row['firstname'] . "</td>";
	echo "<td>" . $row['lastname'] . "</td>";
	echo "<td>" . $row['age'] . "</td>";
	echo "<td><a class='btn btn-warning btn-xs' href='edit.php?id={$id}'>Edit</a></td>"; 
	echo "</tr>";
}
echo "</table>"; 
?>
<input type="submit" value="Delete Seletected" class="btn btn-danger"  name="delete">
</form>
</div>
</body>
</html>