<?php
class GetMail{

	protected $_db;

		
	public function __construct(){

		$this->db = new Bddmanager();
		$this->db = $this->db->getBdd();

	}
	

	public function get_mail_send($mail){

        $req = $this->db->prepare('INSERT INTO sender (mail) VALUES (:mail)');
        $req->bindParam(':mail', $mail);

        $req->execute();
        // return $req->fetch(PDO::FETCH_ASSOC);    
		
	}

	public function get_mail_recep($mail){

        $req = $this->db->prepare('INSERT INTO recipient (mail) VALUES (:mail)');
        $req->bindParam(':mail', $mail);

        $req->execute();
        // return $req->fetch(PDO::FETCH_ASSOC);    	

	}
}