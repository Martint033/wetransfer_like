<?php
class MailSend{

	protected $_db;
		
	// protected $_table;

	// public function __construct(){
	// 	$this->_db = new Bddmanager();
	// 	$this->_db = $this->_db->getBdd();
	// 	// $this->_table = 'me_link_meme_image';
	// }

	public function sendMail($sender, $recipient, $file){
		$passage_ligne = "\n";
		$boundary = "-----=".md5(rand());
		
        $recipient = "martint033@gmail.com"; //recipient 
		$mail_body = '<html><body>';
		$mail_body .= '<table background-color="#ffffff" style="width:100%;max-width:660px; border-radius:4px; box-shadow:2px 3px 8px #bbb" height="50px" align="center" border="0" cellspacing="0" cellpadding="0">';
		$mail_body .= '<tr align="center" style="font-family:Arial; font-size:36px; font-weight:700; color:#ffffff; letter-spacing:-1px; background-color:#26A69A;"> <td style="padding:30px 0px;"><img style="width : 40px; height:auto;" src="assets/medias/logo.png">
		</td></tr>';
		$mail_body .= '</td></tr>';
		$mail_body .= '<tr style="font-family:Arial;"> <td style="padding:50px 60px; line-height: 1.8em">Bonjour</br>Un ami vous a envoyé un fichier à télécharger !</br><a href="https://tomm.promo-17.codeur.online/wetransfer_like/download/"'.$file.'" style="background-color:#26A69A;color:#ffffff;display:block;font-family:Arial,sans-serif;font-size:20px;font-style:normal;text-align:center;text-decoration:none;word-spacing:0;border-radius:25px;padding:15px 20px; margin-top:35px;">Télécharge moi ! </a>
			 </td></tr>';
		$mail_body .= '</table>';
		$mail_body .= "</body></html>";
        $subject = "Coucou"; //subject 
		$header = "From:  <" . $sender . ">\r\n"; //optional headerfields 
		$header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
		$header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

        mail($recipient, $subject, $mail_body, $header); //mail command :) 
    }
}