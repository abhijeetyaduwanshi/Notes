<?php

// Link to the class files
require_once 'FileNotesRepo.php';
require_once 'Notes.php';
$notesRepo = new \abhijeet\NFS\FileNotesRepo();
$notesId = isset( $_GET['id'] ) ? $_GET['id'] : '';
$notes = $notesRepo->getNotesById( $notesId );
?>
<?php if( $notes ) : ?>

	<!-- Show page -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Show note <?php print $notes->getSubject(); ?></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- Inbody stylesheet -->
		<style type="text/css">
			.button-container form,
			.button-container form div {
				display: inline;
			}

			.button-container input {
				display: inline;
				vertical-align: middle;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<h1> Review note </h1>
			<table class="table">
				<caption> Id: <?php print $notes->getId(); ?></caption>
				<tbody>
					<tr>
						<td width="100px;"><label> Subject: </label></td>
						<td><?php print $notes->getSubject(); ?></td>
					</tr>
					<tr>
						<td width="100px;"><label> Author: </label></td>
						<td><?php print $notes->getAuthor(); ?></td>
					</tr>
					<tr>
						<td width="100px;"><label> Body: </label></td>
						<td><?php print $notes->getBody(); ?></td>
					</tr>
					<tr>
						<td width="100px;"><label> Priority: </label></td>
						<td><?php print $notes->getPriority(); ?></td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="button-container">
								<form action="edit.php" method="POST">
									<input type="hidden" name="id" value="<?php print $notes->getId(); ?>" />
									<input class="btn btn-primary" type="submit" value="Edit note" />
								</form>
								<form action="deleteConfirm.php" method="POST">
									<input type="hidden" name="id" value="<?php print $notes->getId(); ?>" />
									<input class="btn btn-primary" type="submit" value="Delete note" />
								</form>
								<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
	</html>

<?php else : ?>

	<!-- Show error page -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Show note </title>
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
			<h1> No notes found!!! </h1>
			<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
		</div>
	</body>
	</html>

<?php endif; ?>