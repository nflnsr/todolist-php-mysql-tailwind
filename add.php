<?php
if (isset($_POST['Submit'])) {
  $task = $_POST['task'];
  $priority = $_POST['priority'];
  $date_created = $_POST['date_created'];

  // include database connection file
  $host = '';
  $usr = '';
  $pwd = '';
  $db = '';
  

  // parameter = hostname, username, password, database
  $conn = mysqli_connect($host, $usr, $pwd, $db);

  // Insert user data into table
  $result = mysqli_query($conn, "INSERT INTO todolist_apps(task, priority, date_created) 
                VALUES('$task', '$priority', '$date_created')");

    header("Location: index.php");

}
?>
