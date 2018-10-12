<?php
require_once ('vendor/autoload.php');
$loader = new Twig_Loader_Filesystem('views');
 $twig = new Twig_Environment($loader,[
     'cache' => false,
 ]); 

 

if (isset($_POST['send']) && isset($_POST['recep']) ) {
      
  
        $mailSend = htmlEntities($_POST['send']);
        $mailRecep = htmlEntities($_POST['recep']);

        $sentMail = new GetMail();
        $sentMail -> get_mail_send($mailSend);
        $sentMail -> get_mail_recep($mailRecep);

        $target_dir = "wetranfer_like_";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $path = $_FILES["fileToUpload"]["tmp_name"];

        $fileToDB = new AddFile();
        $name = $fileToDB->addFile();
        
        $file = new CompressClass();
        $zipPath = $file -> compress($path, $target_file, $name);
        
        $urlName = explode(".zip", $name);
        // $mail = new MailSend();
        // $mail->sendMail($mailSend, $mailRecep, $urlName[0]);

        $url = ["url"=>"assets/files/".$name];
        echo $twig->render('result.html', array("url"=>$urlName[0]));  
    
}
