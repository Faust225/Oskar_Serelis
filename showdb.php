<?php

if(isset($_POST['showdb'])) {

$query = "SELECT * FROM user ORDER by firstname";
$result = $connect->query($query);

?>

	<table id = activeTable>
					<tr>
					 	<th> Firstname </th>
					 	<th> Lastname </th>
					 	<th> email </th>
					 	<th> First phonenumber </th>
					 	<th> Second phonenumber </th>
					 	<th  colspan = "3" style = "text-align: left;"> Comment </th>
					</tr>
<?php
// go through each row that was returned in $result

	while($table = mysqli_fetch_array($result)){ 

	
?>
			 <tr>
				 <td> <?php echo $table[1]?> </td>
				 <td> <?php echo $table[2]?> </td>
				 <td> <?php echo $table[3]?> </td> 
				 <td> <?php echo $table[4]?> </td>
				 <td> <?php echo $table[5]?> </td>
				 <td> <?php echo $table[6]?> </td>
            </tr>
<?php            
	}
?>
	</table>
	<button class="close-table">Close Data</button>

<?php
	$connect->close();

}
?>

 <script src="js/close-table.js"></script>