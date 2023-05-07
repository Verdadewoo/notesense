<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./notesense.php';" . "</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NoteSense</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
</head>

<body>
  <div class="sidenav">
    <h2>NOTESENSE</h2>
    <p>Welcome,</p>
    <h5><?= htmlspecialchars($_SESSION["username"]); ?></h5>
    <hr>
    <a href="add.php"><i class="bi bi-plus-lg"></i> New note</a>
    <a href="#services">Services</a>
    <a href="#clients">Clients</a>
    <a href="#contact">Contact</a>
    <a href="./logout.php">Log Out</a>
  </div>

  <div class="main">

    <?php if (isset($_SESSION['success_message'])) : ?>
      <div class="alert alert-absolute alert-success custom-alert" id="myDiv" role="alert">
        <?php echo $_SESSION['success_message']; ?>
      </div>
      <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

		<?php
    # Include connection
    require_once "./config.php";
    $result = mysqli_query($link, "SELECT * FROM notes WHERE user = '" . $_SESSION["username"] . "' ORDER BY editedat DESC");
		// Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result)) {
    ?>
      <div class="card">
        <div class="card-body" onclick="window.location.href='edit.php?id=<?php echo $res['id']; ?>'">
          <div class="d-flex justify-content-between">
            <div>
              <p class="p-custom"><?php echo $res['title']; ?></p>
              <h6><?php echo $res['editedat']; ?></h6>
            </div>
            <div>
              <div class="dropdown dropstart">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="event.stopPropagation()">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="edit.php?id=<?php echo $res['id']; ?>"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" onclick="event.stopPropagation()" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $res['id']; ?>"><i class="bi bi-trash"></i> Delete</a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <h6 class="card-text"><?php echo (strlen($res['content']) > 50) ? substr($res['content'], 0, 100) . '...' : $res['content']; ?></h6>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade text-dark" id="exampleModal<?php echo $res['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
              <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="modal-body">
              <h6>Are you sure you want to delete this item?</h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
              <a href="delete.php?id=<?php echo $res['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>

      <?php
      }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>