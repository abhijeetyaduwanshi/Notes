<?php

//File namespace to make it unique
namespace abhijeet\NFS;
//Link to the class files
require_once 'INotesRepo.php';
require_once 'Notes.php';

class FileNotesRepo implements INotesRepo {

	//Assigning variable 
	private $fileName = 'data/data.txt';

	//Logic for saving note
	public function saveNotes( $notes ){
		$dataArray = $this->getAllNotes();
		$dataArray[$notes->getId()] = $notes;
		$serialData = serialize( $dataArray );
		file_put_contents( $this->fileName, $serialData );
	}

	//Logic for getting all notes
	public function getAllNotes(){
		$data = file_get_contents( $this->fileName );
		if ( $data ) {
			$dataArray = unserialize( $data );
			return $dataArray;
		} else {
			return array();
		}
	}

	//Logic for getting a particular note by id
	public function getNotesById( $id ){
		$notesList = $this->getAllNotes();
		if( array_key_exists( $id, $notesList ) ) {
			return $notesList[$id];
		}
	}

	//Logic for deleting a particular note by id
	public function deleteNotes( $notesId ){
		$notesList = $this->getAllNotes();
		if ( array_key_exists( $notesId, $notesList ) ) {
			unset( $notesList[$notesId] );
			$serialData = serialize( $notesList );
			file_put_contents( $this->fileName, $serialData );
		}
	}
}

?>