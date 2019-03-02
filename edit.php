<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style/table_style.css" type="text/css" />
	<style>
		html{
			margin: 0;
			padding: 0;
			background-image: linear-gradient(to bottom right, #1d22ad, #5c3cad);
			min-width: 100%;
			min-height: 100%;
			overflow: hidden;
			background-size: cover;
			background-repeat: no-repeat;
		}

		a{
			text-decoration: none;
			color: #000;
		}

		a:hover{
			border-bottom: 2px solid black;
		}

	</style>
</head>
<body>

<?php
	require ("config.php");

		$sql = "SELECT * from user";
		$result = mysqli_query($connect, $sql);
		$table = mysqli_fetch_array($result);

?>

<a href="php_mysql.php">&#10096; Go back to page</a>
<h3 style="color: red;">*After updating row please reload page</h3>

<form method="post">
	<input type="submit" name="newUser" value="Add new user">
</form>

<div id="table2">
<table>
	<tr>
		<form method="post">
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>First phone</th>
			<th>Second phone</th>
			<th>Comment</th>
		</form>
	</tr>
<?php
	// add new user

	if(isset($_POST['newUser'])){

		?>
	<tr id="closeAdd">
		<form method = "post">
			<td><input type=text name=insertFirstname></td> 
			<td><input type=text name=insertLastname></td>
			<td><input type=text name=insertEmail></td>
			<td><input type=text name=insertPhone1></td>
			<td><input type=text name=insertPhone2></td>
			<td><input type=text name=insertComment></td>
		    <td><input type=submit name=add value = "Add"></td>
		    <td><input type=submit class="close"  value = "Close"></td>
	    </form>
	</tr>

	<?php
}
	 // show each row

	while($table = mysqli_fetch_array($result)){
		?>
	<tr>
		<form method = "post">
			<td><input type=text name=upfirstname value="<?php echo $table[1]?>"></td> 
			<td><input type=text name=uplastname value="<?php echo $table[2]?>"></td>
			<td><input type=text name=upemail value="<?php echo $table[3]?>"></td>
			<td><input type=text name=upphone1 value="<?php echo $table[4]?>"></td>
			<td><input type=text name=upphone2 value="<?php echo $table[5]?>"></td>
			<td><input type=text name=upcomment value="<?php echo $table[6]?>"></td>
		    <td><input type=submit name=update value=Update></td>
		    <td><input type=submit name=del value=Delete></td>
	    </form>
	</tr>

<?php
}
?>

</table>
</div>
<?php
// Update user

if(isset($_POST['update'])){

	$sql = "UPDATE user SET firstname = '$_POST[upfirstname]', lastname = '$_POST[uplastname]', email = '$_POST[upemail]', phone1 = '$_POST[upphone1]', phone2 = '$_POST[upphone2]', comment = '$_POST[upcomment]' WHERE email = '$_POST[upemail]'";

	// execute the query
	if(mysqli_query($connect, $sql)){
		echo "Data was changed ";
	} else {
		echo "ERROR with changes";
	}
}

// Delete user

if(isset($_POST['del'])){

	$sql = "DELETE FROM user WHERE id = '$_POST[upid]'";

	// execute the query
	
	if(mysqli_query($connect, $sql)){
		echo "Data was deleted ";
	} else {
		echo "ERROR with deleting";
	}
}

// add new user

if(isset($_POST['add'])){
	
		$name = $_POST['insertFirstname'];
		$lastname = $_POST['insertLastname'];//need to change like $name
		$email = $_POST['insertEmail'];
		$phone1 = $_POST['insertPhone1'];
		$phone2 = $_POST['insertPhone2'];
		$comment = $_POST['insertComment'];

		 $queryMail = "SELECT email from user WHERE email = '$email'";
		 $duplicateMail = mysqli_query($connect, $queryMail);

		 $queryPhone1 = "SELECT phone1 from user WHERE phone1 = '$phone1'";
		 $duplicatePhone1 = mysqli_query($connect, $queryPhone1);

		 $queryPhone2 = "SELECT phone2 from user WHERE phone2 = '$phone2'";
		 $duplicatePhone2 = mysqli_query($connect, $queryPhone2);

						// Validation
		   if(!empty($name) && !empty($lastname) && !empty($email) && !empty($phone1) && !empty($phone2) && !empty($comment)){

					   			//checks if email exists in db
					if(mysqli_num_rows($duplicateMail)){
					echo "Email already taken";
					} else {
						
					      if(!preg_match("#[@]+#", $email)){
					      echo "Your email must contain '@'! <br>";
					   	  } else {

							     if(preg_match("^[0-9]^", $lastname)){
							     echo "Lastname cannot contain numbers <br>";
							     } else {

							     		   if(preg_match("/[^a-z0-9 _]+/i", $lastname)){
							     		   echo "Lastname cannot contain special characters <br>";
							     		   } else {

								      			  if(preg_match("^[0-9]^",$name)){
								        		  echo "Firstname cannot contain numbers <br>";
								        	   	  } else { 

								        				if(preg_match("/[^a-z0-9 _]+/i", $name)){
						     							echo "Your firstname cannot contain special characters ! <br>";
						  								} else{

						  										if(strlen($phone1) > '13'){
			     												echo "Your first phonenumber must contain at least 9 characters! <br>";
			  												 	} else {
			  												 
				  												  	if(!strlen($phone2) > '13'){
				     											   	 echo "Your second phonenumber must contain at least 9 characters! <br>";
				  												  	 } else {

											        					if(!preg_match("^[0-9]^", $phone1)){
											        					echo "Your phonenumber must contain only numbers! <br>";
											   							} else {

											   								if(!preg_match("^[0-9]^", $phone2)){
											        						echo "Your phonenumber must contain only numbers! <br>";
											   								} else {

											   									if(mysqli_num_rows($duplicatePhone1)){
																			 	echo "First phonenumber already taken <br>";
																				} else {

																				  	if(mysqli_num_rows($duplicatePhone2)){
																			 		echo "Second phonenumber already taken <br";
																				    } else {

										   											  $inserting = "INSERT INTO user VALUES ('', '$name', '$lastname', '$email', '$phone1', '$phone2', '$comment')";
										     										 	// execute the query
																						if(mysqli_query($connect, $inserting)){
																							echo "Data was inserted Successfuly ";
																						} else {
																							echo "ERROR with inserting ";
																						}
													
																						// Close connection
																						mysqli_close($connect);		  
											   							}
																	}
																}
															}
												    	}
												    }
												 }
											}
							    		}
									}
								}
							}
						} else { echo "Cannot leave any field empty";}
}
?>
 <script src="js/close-table.js"></script>
</body>
</html>