<?php

// Link to the class files
require_once 'FileNotesRepo.php';
require_once 'Notes.php';
$notesRepo = new \abhijeet\NFS\FileNotesRepo();
$notesList = $notesRepo->getAllNotes();
?>

<!-- Index page -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Notes </title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- Inbody stylesheet -->
	<style type="text/css">
		#myTable {
			width: 100%;
			table-layout: fixed;
		}

		.overflowText {
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<h2> Notes <a href="create.php"><input class="btn btn-primary" type="button" value="Add new note" /></a></h2>
		<table id="myTable" class="table table-bordered">
			<thead>
				<tr>
					<th width="8%"> ID </th>
					<th width="15%"> Subject </th>
					<th width="10%"> Author </th>
					<th width="30%"> Body </th>
					<th width="7%"> Priority </th>
					<th width="7%"> Action </th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach( $notesList as $notes ) {

					if ($notes->getPriority() == 'Low') {
						print '<tr style="color : #000000;">';
						print '<td width="8%">' . $notes->getId() . '</td>';
						print '<td width="15%" class="overflowText">' . $notes->getSubject() . '</td>';
						print '<td width="10%" class="overflowText">' . $notes->getAuthor() . '</td>';
						print '<td width="30%" class="overflowText">' . $notes->getBody() . '</td>';
						print '<td width="7%">' . $notes->getPriority() . '</td>';
						print '<td width="7%"><a href="show.php?id=' . $notes->getId() . '"><input class="btn btn-primary" type="button" value="View" /></a></td>';
						print '</tr>';
					} elseif ($notes->getPriority() == 'Medium') {
						print '<tr style="color : #0000FF;">';
						print '<td width="8%">' . $notes->getId() . '</td>';
						print '<td width="15%" class="overflowText">' . $notes->getSubject() . '</td>';
						print '<td width="10%" class="overflowText">' . $notes->getAuthor() . '</td>';
						print '<td width="30%" class="overflowText">' . $notes->getBody() . '</td>';
						print '<td width="7%">' . $notes->getPriority() . '</td>';
						print '<td width="7%"><a href="show.php?id=' . $notes->getId() . '"><input class="btn btn-primary" type="button" value="View" /></a></td>';
						print '</tr>';
					} else {
						print '<tr style="color : #FF0000;">';
						print '<td width="8%">' . $notes->getId() . '</td>';
						print '<td width="15%" class="overflowText">' . $notes->getSubject() . '</td>';
						print '<td width="10%" class="overflowText">' . $notes->getAuthor() . '</td>';
						print '<td width="30%" class="overflowText">' . $notes->getBody() . '</td>';
						print '<td width="7%">' . $notes->getPriority() . '</td>';
						print '<td width="7%"><a href="show.php?id=' . $notes->getId() . '"><input class="btn btn-primary" type="button" value="View" /></a></td>';
						print '</tr>';
					}
				}
				?>

			</tbody>
		</table>
	</div>
</body>
</html>