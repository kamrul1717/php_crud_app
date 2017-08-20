<?php include "inc/header.php"; 
	include "config.php";
	include "database.php";
?>

<?php 
	$id = $_GET['id'];
	$db = new database();
	$query = "SELECT * FROM tbl_user WHERE id='$id'";
	$getdata = $db->select($query)->fetch_assoc();
	
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if($name=='' || $email=='' || $skill==''){
			$error = "field must not be empty";
		}else{
			$query = "UPDATE tbl_user
			SET
			name = '$name',
			email = '$email',
			skill = '$skill'
			WHERE id = $id";
			$updatedata = $db->update($query);
		}
	}
?>

<?php 
	if(isset($_POST['delete'])){
			$query = "DELETE FROM tbl_user WHERE id=$id";
			$delete = $db->delete($query);
	}
?>
<?php 
		if(isset($error)){
			echo $error;
		}
?>

<form action="update.php?id=<?php echo $id; ?>" method="post">
	<table class="tblone">
		
		<tr>
			<td>name</td>
			<td><input type="text" name="name" value="<?php echo $getdata['name'] ?>"/></td>
		</tr>
		
		<tr>
			<td>email</td>
			<td><input type="text" name="email" value="<?php echo $getdata['email'] ?>"/></td>
		</tr>
		
		<tr>
			<td>skill</td>
			<td><input type="text" name="skill" value="<?php echo $getdata['skill'] ?>"/></td>	
		</tr>
		
		<tr>
			<td></td>
			<td>
			<input type="submit" name="submit" value="update"/>
			<input type="reset" value="cancel"/>
			<input type="submit" name="delete" value="delete"/>
			</td>	
		</tr>
		
	</table>
</form>
<a href="index.php">go back</a>
