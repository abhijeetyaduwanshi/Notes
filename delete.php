<?php

// Link to the class files
require_once 'FileNotesRepo.php';
require_once 'Notes.php';
$notesRepo = new \abhijeet\NFS\FileNotesRepo();
?>
<!-- Logic for the delete page -->
<?php if ( $_SERVER['REQUEST_METHOD'] == "POST" && !empty( $_POST['id'] ) ) : ?>
	<?php $notesRepo->deleteNotes( $_POST['id'] ); ?>

	<!-- Delete page -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Delete note </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<h1> Delete confirmation </h1>
			<h2> Note successfully deleted </h2>
			<p><a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a></p>
		</div>
	</body>
	</html>

<?php else : ?>

	<!-- Delete error page -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Delete note </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<h1> Something went wrong!!! </h1>
			<h1> No notes found for deletion!!! </h1>
			<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
		</div>
	</body>
	</html>

<?php endif; ?>