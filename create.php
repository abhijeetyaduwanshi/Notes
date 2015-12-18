<?php

// Link to the class files
require_once 'Notes.php';
require_once 'FileNotesRepo.php';

// Checking for blank spaces, html and sql injection
function values_in_fields( $values_entered ) {
	$values_entered = trim( $values_entered );
	$values_entered = stripslashes( $values_entered );
	$values_entered = htmlspecialchars( $values_entered );
	return $values_entered;
}

// Checking the required fields
$notesSubject = isset( $_POST['subject'] ) ? values_in_fields( $_POST['subject'] ) : '';
$notesAuthor = isset( $_POST['author'] ) ? values_in_fields( $_POST['author'] ) : '';
$notesBody = isset( $_POST['body'] ) ? values_in_fields( $_POST['body'] ) : '';
$notesPriority = isset( $_POST['priority'] ) ? $_POST['priority'] : '';

// Assigning, declaring variables
$formIsValid = true;
$subjectErr = '';
$authorErr = '';
$bodyErr = '';
$priorityErr = '';

// If fields empty give an error message
if ( empty( $notesSubject ) ){
	$formIsValid = false;
	$subjectErr = '<span style="color : #f00;"> Subject is required </span>';
}

if ( empty( $notesAuthor ) ){
	$formIsValid = false;
	$authorErr = '<span style="color : #f00;"> Author is required </span>';
}

if ( empty( $notesBody ) ){
	$formIsValid = false;
	$bodyErr = '<span style="color : #f00;"> Body is required </span>';
}

if ( empty( $notesPriority ) ){
	$formIsValid = false;
	$priorityErr = '<span style="color : #f00;"> Priority is required </span>';
}
?>

<!-- Create page -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Add new note </title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Logic for the create page -->
	<?php if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) : ?>
		<?php if ( $formIsValid ) : ?>
			<?php
			$notesRepo = new \abhijeet\NFS\FileNotesRepo();
			$notes = new \abhijeet\NFS\Notes();
			$notes->setSubject( $notesSubject );
			$notes->setAuthor( $notesAuthor );
			$notes->setBody( $notesBody );
			$notes->setPriority( $notesPriority );
			$notesRepo->saveNotes( $notes );
			?>
			<div class="container-fluid">
				<!-- Review create page -->
				<h1> New note created </h1>
				<table class="table">
					<caption> Review created note </caption>
					<tbody>
						<tr>
							<td width="100px;"><label> Subject: </label></td>
							<td><?php print $notesSubject; ?></td>
						</tr>
						<tr>
							<td width="100px;"><label> Author: </label></td>
							<td><?php print $notesAuthor; ?></td>
						</tr>
						<tr>
							<td width="100px;"><label> Body: </label></td>
							<td><?php print $notesBody; ?></td>
						</tr>
						<tr>
							<td width="100px;"><label> Priority: </label></td>
							<td><?php print $notesPriority; ?></td>
						</tr>
						<tr>
							<td colspan="2"><a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a></td>
						</tr>
					</tbody>
				</table>
			</div>

		<?php else : ?>

			<div class="container-fluid">
				<!-- Create page with error message -->
				<h1> Create new note </h1>
				<form method="post" action="create.php">
					<table class="table">
						<caption> Enter values <br /><span style="color: #f00;"> All fields required </span></caption>
						<tbody>
							<tr>
								<td><label> Subject: </label></td>
								<td><input size="150" type="text" name="subject" placeholder="Enter subject" value="<?php print $notesSubject; ?>" /><?php print $subjectErr; ?></td>
							</tr>
							<tr>
								<td><label> Author: </label></td>
								<td><input size="150" type="text" name="author" placeholder="Enter author's name" value="<?php print $notesAuthor; ?>" /><?php print $authorErr; ?></td>
							</tr>
							<tr>
								<td><label> Body: </label></td>
								<td><input size="150" type="text" name="body" placeholder="Enter body" value="<?php print $notesBody; ?>" /><?php print $bodyErr; ?></td>
							</tr>
							<tr>
								<td><label> Priority: </label></td>
								<td>
									<select name="priority">

										<?php $priorityArray = array( 'Low', 'Medium', 'High' ); ?>
										<?php
										if ( !empty( $notesPriority ) ) {
											foreach ( $priorityArray as $value ) {
												$selected = '';
												if ( $notesPriority == $value ) {
													$selected = 'selected';
												}
												print "<option $selected> $value </option>";
											}
										} else {
											foreach ( $priorityArray as $value ) {
												print "<option $selected> $value </option>";
											}
										}
										?>

									</select><?php print $priorityErr; ?>
								</td>
							</tr>
						</tbody>
					</table>
					<input class="btn btn-primary" type="submit" value="Save note" />
					<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
				</form>
			</div>

		<?php endif; ?>
	<?php else : ?>

		<div class="container-fluid">
			<!-- Create page -->
			<h1> Create new note </h1>
			<form method="post" action="create.php">
				<table class="table">
					<caption> Enter values </caption>
					<tbody>
						<tr>
							<td><label> Subject: </label></td>
							<td><input size="170" type="text" name="subject" placeholder="Enter subject" /></td>
						</tr>
						<tr>
							<td><label> Author: </label></td>
							<td><input size="170" type="text" name="author" placeholder="Enter author's name" /></td>
						</tr>
						<tr>
							<td><label> Body: </label></td>
							<td><input size="170" type="text" name="body" placeholder="Enter body" /></td>
						</tr>
						<tr>
							<td><label> Priority: </label></td>
							<td><select name="priority">
								<option> Low </option>
								<option> Medium </option>
								<option> High </option>
							</select></td>
						</tr>
					</tbody>
				</table>
				<input class="btn btn-primary" type="submit" value="Save note" />
				<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
			</form>
		</div>

	<?php endif; ?>

</body>
</html>