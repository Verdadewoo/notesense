<?php
# Initialize the session
session_start();
# Include connection
require_once "./config.php";

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($link, "DELETE FROM notes WHERE id = $id");

$_SESSION['success_message'] = "Data successfully deleted.";
// Redirect to the main display page (index.php in our case)
header("Location:index.php");
exit();
