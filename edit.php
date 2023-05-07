<?php
# Initialize the session
session_start();
# Include connection
require_once "./config.php";

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM notes WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$title = $resultData['title'];
$content = $resultData['content'];
?>

<?php
	# Include connection
	require_once "./config.php";

	if (isset($_POST['update'])) {
		// Escape special characters in a string for use in an SQL statement
		$id = mysqli_real_escape_string($link, $_POST['id']);
		$title = mysqli_real_escape_string($link, $_POST['title']);
		$content = mysqli_real_escape_string($link, $_POST['content']);
		
		// Check for empty fields
		if (empty($title)) {
			if (empty($title)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}
			
		} else {
			// Update the database table
			$result = mysqli_query($link, "UPDATE notes SET `title` = '$title', `content` = '$content' WHERE `id` = $id");
			
			$_SESSION['success_message'] = "Data successfully updated.";
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
    <a href="" class="selected"><i class="bi bi-plus-lg"></i> Editing note</a>
		<a href="index.php"><i class="bi bi-arrow-left"></i> Go back</a>
    <a href="./logout.php">Log Out</a>
  </div>
	<div class="main">

		<form action="edit.php" method="post" name="edit">
			<div class="d-flex justify-content-between">

			<div>
			<input type="text" value="<?php echo $title; ?>" name="title" class="form-control title" placeholder="Title">
				<?php if (isset($_SESSION['error_message'])) : ?>
					<div>
						<p class="error_message"><?php echo $_SESSION['error_message']; ?></p>
					</div>
					<?php unset($_SESSION['error_message']); ?>
				<?php endif; ?>
			</div>

			</div>
			<hr>
			<textarea name="content" class="form-control mt-3 text-area-custom" placeholder="Content"><?php echo $content; ?></textarea>
			<input type="hidden" name="id" value=<?php echo $id; ?>>
			<button type="submit" name="update" value="Update" class="btn btn-float"><i class="bi bi-plus-lg"></i> Update</button>
		</form>

	</div>
</body>
</html>
