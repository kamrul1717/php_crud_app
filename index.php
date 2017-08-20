<?php include "inc/header.php"; 
	include "config.php";
	include "database.php";
?>

<?php 
	$db = new database();
	$query = "SELECT * FROM tbl_user";
	$read = $db->select($query); 
?>
	<?php 
		if(isset($_GET['msg'])){
			echo "<span style='color:green'>".$_GET['msg']."</span>";
		}
	?>
	<table class="tblone">
		<tr>
			<th width="10%">serial</th>
			<th width="25%">name</th>
			<th width="25%">email</th>
			<th width="25%">skill</th>
			<th width="15%">action</th>
		</tr>
		
		<?php  if($read){ ?>
		<?php 
		$i=1;
		while($row = $read->fetch_assoc()){ ?>	
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">edit</a></td>
		</tr>
		
		<?php } ?>
		<?php }else{ ?>
			<p>data is not available</p>
		<?php } ?>
	</table>
	<a href="create.php">create</a>

	
<?php include "inc/footer.php"; 
?>