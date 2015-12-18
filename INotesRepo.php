<?php

//File namespace to make it unique
namespace abhijeet\NFS;

interface INotesRepo {

	public function saveNotes( $notes );
	public function getAllNotes();
	public function getNotesById( $id );
	public function deleteNotes( $notesId );
}
?>
