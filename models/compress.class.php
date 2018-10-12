<?php
class CompressClass{

	protected $_db;
	protected $zip; 
		


	public function compress($path, $filename, $name){
		
		$this->zip = new ZipArchive;

		if($this->zip->open('assets/files/'.$name, ZipArchive::CREATE) === true)
		{
	  
	  		// Ajout d’un fichier.
	  		$this->zip->addFile($path, $filename);
  
			// Et on referme l'archive.
			$this->zip->close();
		}
		else
		{
		  echo 'nope';
	  		// Traitement des erreurs avec un switch(), par exemple.
		}
	}
}