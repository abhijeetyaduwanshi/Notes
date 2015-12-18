<?php 

//File namespace to make it unique
namespace abhijeet\NFS;

//Getter and setter class
class Notes{

	private $id;
	private $subject = '';
	private $author = '';
	private $body = '';
	private $priority = '';

	public function __construct(){
		$this->id = uniqid();
	}

	public function getId(){
		return $this->id;
	}

	public function getSubject(){
		return $this->subject;
	}

	public function setSubject( $subject ){
		$this->subject = $subject;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getBody(){
		return $this->body;
	}

	public function setBody( $body ){
		$this->body = $body;
	}

	public function getPriority(){
		return $this->priority;
	}

	public function setPriority( $priority ){
		$this->priority = $priority;
	}

}

?>