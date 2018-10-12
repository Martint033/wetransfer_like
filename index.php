<?php

require('models/compress.class.php');
require('models/mail.class.php');
require('models/Bddmanager.php');

if (isset($_GET['action'])){

    switch ($_GET['action']) {

        case 'home':
            require_once('controllers/ctrl_home.php');
            // require_once('controllers/control_generator.php');
            break;

        case 'result':
            require_once('models/newFile.class.php');
            require_once('models/getMail.class.php');
            require_once('controllers/ctrl_loading.php');
            break;

        case 'download':
            require_once('controllers/ctrl_download.php');
            break;

        default:
            require_once('controllers/ctrl_home.php');
            break;

    }
} else {
    require_once('controllers/ctrl_home.php');

}

// $mail = new MailSend();
// $mail-> sendMail();

