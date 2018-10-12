<?php

require_once ('vendor/autoload.php');
$loader = new Twig_Loader_Filesystem('views');
 $twig = new Twig_Environment($loader,[
     'cache' => false,
 ]); 


$fileUpload = 'assets/files/'.$_GET['name'].'.zip';


$template = $twig->load('download.html');
echo $template->render(array("url" => $fileUpload)); 