<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./notesense.php';" . "</script>";
  exit;
}
?>
<?php
	# Include connection
	require_once "./config.php";

	if (isset($_POST['submit'])) {
		// Escape special characters in string for use in SQL statement	
		$title = mysqli_real_escape_string($link, $_POST['title']);
		$content = mysqli_real_escape_string($link, $_POST['content']);
		$user = mysqli_real_escape_string($link, $_SESSION["username"]);
			
		// Check for empty fields
		if (empty($title)) {
			if (empty($title)) {
				$_SESSION['error_message'] = "Title should not be empty.";
			}

		} else { 
			// If all the fields are filled (not empty) 

			// Insert data into database
			$result = mysqli_query($link, "INSERT INTO notes (`user`, `title`, `content`) VALUES ('$user', '$title', '$content')");
			
			$_SESSION['success_message'] = "Data successfully inserted.";
			header("Location: index.php");
			exit();
		}
	}
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoteSense - Add</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/add.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
</head>

<body>
	<div class="sidenav">
    <h2>NOTESENSE</h2>
    <p>Welcome,</p>
    <h5><?= htmlspecialchars($_SESSION["username"]); ?></h5>
    <hr>
    <a href="" class="selected"><i class="bi bi-plus-lg"></i> Adding note</a>
		<a href="index.php"><i class="bi bi-arrow-left"></i> Go back</a>
		<a href="./logout.php">Log Out</a>
  </div>
	<div class="main">

		<form action="add.php" method="post" name="add">
			<div class="d-flex justify-content-between">

			<div>
				<input type="text" name="title" class="form-control title" placeholder="Title" required>
				<?php if (isset($_SESSION['error_message'])) : ?>
					<div>
						<p class="error_message"><?php echo $_SESSION['error_message']; ?></p>
					</div>
					<?php unset($_SESSION['error_message']); ?>
				<?php endif; ?>
			</div>

			</div>
			<hr>
			<textarea name="content" class="form-control mt-3 text-area-custom" placeholder="Content"></textarea>
			<button type="submit" name="submit" value="Add" class="btn btn-float"><i class="bi bi-plus-lg"></i> Add</button>
		</form>

	</div>
</body>
</html>

