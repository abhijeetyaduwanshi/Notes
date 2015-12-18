<?php

// Link to the class files
require_once 'Notes.php';
require_once 'FileNotesRepo.php';
$notesRepo = new \abhijeet\NFS\FileNotesRepo();
?>
<!-- Logic for the edit page -->
<?php if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['id'] ) ) : ?>
	<?php $notes = $notesRepo->getNotesById( $_POST['id'] ); ?>

	<!-- Edit page -->
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Edit note </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<h1> Edit note </h1>
			<form method="post" action="edit.php">
				<input type="hidden" name="notesId" value="<?php print $_POST['id']; ?>" />
				<table class="table">
					<caption> Enter changed values </caption>
					<tbody>
						<tr>
							<td><label> Subject: </label></td>
							<td><input size="170" type="text" name="subject" placeholder="Enter subject" value="<?php print $notes->getSubject(); ?>" /></td>
						</tr>
						<tr>
							<td><label> Author: </label></td>
							<td><input size="170" type="text" name="author" placeholder="Enter author's name" value="<?php print $notes->getAuthor(); ?>" /></td>
						</tr>
						<tr>
							<td><label> Body: </label></td>
							<td><input size="170" type="text" name="body" placeholder="Enter body" value="<?php print $notes->getBody(); ?>" /></td>
						</tr>
						<tr>
							<td><label> Priority: </label></td>
							<td>
								<?php print 'is set as ' . '<strong>"' ?> <?php print $notes->getPriority(); print ' "</strong> change to ' ?><select name="priority">

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

							</select>
						</td>
					</tr>
				</tbody>
			</table>
			<input class="btn btn-primary" type="submit" value="Save Note" />
			<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
		</form>
	</div>
</body>
</html>

<!-- Logic for the edit page -->
<?php elseif ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['notesId'] ) ) : ?>
	<?php
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
	if ( empty( $notesSubject ) ) {
		$formIsValid = false;
		$subjectErr = '<span style="color: #f00;"> Subject is required </span>';
	}

	if ( empty( $notesAuthor ) ) {
		$formIsValid = false;
		$authorErr = '<span style="color: #f00;"> Author is required </span>';
	}

	if ( empty( $notesBody ) ) {
		$formIsValid = false;
		$bodyErr = '<span style="color: #f00;"> Body is required </span>';
	}

	if ( empty( $notesPriority ) ) {
		$formIsValid = false;
		$priorityErr = '<span style="color: #f00;"> Priority is required </span>';
	}
	?>

	<!-- Logic for the edit page -->
	<?php if( $formIsValid ) : ?>
		<?php
		$aNotes = $notesRepo->getNotesById( $_POST['notesId'] );
		$aNotes->setSubject( $notesSubject );
		$aNotes->setAuthor( $notesAuthor );
		$aNotes->setBody( $notesBody );
		$aNotes->setPriority( $notesPriority );
		$notesRepo->saveNotes( $aNotes );
		?>

		<!-- Edit page -->
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title> Edit note </title>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<!-- Latest compiled JavaScript -->
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</head>
		<body>
			<div class="container-fluid">
				<!-- Review edit page -->
				<h1> Note edited </h1>
				<table class="table">
					<caption> Review edited note </caption>
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
		</body>
		</html>

	<?php else : ?>

		<!-- Edit page with error message -->
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title> Edit note </title>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<!-- Latest compiled JavaScript -->
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</head>
		<body>
			<div class="container-fluid">
				<h1> Edit note </h1>
				<form method="post" action="edit.php">
					<input type="hidden" name="notesId" value="<?php print $_POST['notesId']; ?>" />
					<table class="table">
						<caption> Enter changed values <br /><span style="color: #f00;"> All fields required </span></caption>
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
									<?php print 'is set as ' . '<strong>"' ?> <?php print $notesPriority; print ' "</strong> change to ' ?><select name="priority">

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
				<input class="btn btn-primary" type="submit" value="Save Note" />
				<a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a>
			</form>
		</div>
	</body>
	</html>

<?php endif; ?>
<?php else : ?>

	<!-- Edit error page -->
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
			<h1> No note selected for editing!!! </h1>
			<p><a href="index.php"><input class="btn btn-primary" type="button" value="Go home" /></a></p>
		</div>
	</body>
	</html>

<?php endif;?>