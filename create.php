<?php include "inc/header.php"; 
	include "config.php";
	include "database.php";
?>

<?php 
	$db = new database();
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if($name=='' || $email=='' || $skill==''){
			$error = "field must not be empty";
		}else{
			$query = "INSERT INTO tbl_user(name,email,skill) VALUES('$name', '$email', '$skill')";
			$create = $db->insert($query);
		}
	}
?>

<?php 
		if(isset($error)){
			echo $error;
		}
?>

<form action="create.php" method="post">
	<table class="tblone">
		
		<tr>
			<td>name</td>
			<td><input type="text" name="name" placeholder="please enter your name"/></td>
		</tr>
		
		<tr>
			<td>email</td>
			<td><input type="text" name="email" placeholder="please enter your email"/></td>
		</tr>
		
		<tr>
			<td>skill</td>
			<td><input type="text" name="skill" placeholder="please enter your skill"/></td>	
		</tr>
		
		<tr>
			<td></td>
			<td>
			<input type="submit" name="submit" value="submit"/>
			<input type="reset" value="cancel"/>
			</td>	
		</tr>
		
	</table>
</form>
<a href="index.php">go back</a>

<?php include "inc/footer.php"; 
?>