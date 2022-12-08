<?php
	// include database connection file
    $host = 'sql311.epizy.com';
    $usr = 'epiz_33133900';
    $pwd = 'nauwasyours';
    $db = 'epiz_33133900_todolist';
	
	
  
    // parameter = hostname, username, password, database
    $conn = mysqli_connect($host, $usr, $pwd, $db);
	 
	// Get id from URL to delete that user
	$id = $_GET['id'];
	 
	// Delete user row from table based on given id
	$delete = mysqli_query($conn, "DELETE FROM todolist_apps WHERE id=$id");
	 
	// After delete redirect to Home, so that latest user list will be displayed.
	header("Location:index.php");
?>