<?php
class AddFile{

	protected $db;
		
	// protected $_table;

	public function __construct(){

	$this->db = new Bddmanager();
	$this->db = $this->db->getBdd();
	//  $this->_table = 'me_link_meme_image';
	}

	public function add(){ 
        $random = md5(uniqid(rand(), true)); 
		$name = 'wetransfer-like-'.$random;
		$req = $this->db->prepare('INSERT INTO file(url, date) VALUES (:name,CURRENT_DATE)');
        $req->bindParam(':name', $name);
        $req->execute();
        return $name;
    }
    
    public function getId($name){

        $req = $this->db->prepare('SELECT file.id  FROM file WHERE file.url = :name');
        $req->bindParam(':name', $name);

        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);       
    }

    public function addName($name, $id){
       
        $name = $name.''.$id['id'].'.zip';
		$req = $this->db->prepare('UPDATE file SET url=:name WHERE file.id=:id');
        $req->bindParam(':name', $name);
        $req->bindParam(':id', $id['id']);
        $req->execute();
        return $name;
    }

    public function addFile(){
        $name = $this->add();
        $id = $this->getId($name);
        $name = $this->addName($name, $id);
        return $name;
    }
}