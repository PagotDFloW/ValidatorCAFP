<?PHP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = Off (Producton) - 1 = Messages client - 2 = Messages client et serveur
$mail->Host = "smtp-validatorap.alwaysdata.net"; //Hote SMTP (Cloudfordream : mail.votredomaine.tld ou webmail.votredomaine.tld ou encore IP de l'hébergement)
$mail->Port = 587; //Port SMTP
$mail->SMTPSecure = 'tls'; //Encryption : tls
$mail->SMTPAuth = true; //SMTP requiere une authentification true ou false
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
); //Options de la connexion SMTP
$mail->Username = "validatorap@alwaysdata.net"; //Identifiant SMTP (Email complète sur votre hébergement Cloudfordream (exemple@votredomaine.tld))
$mail->Password = "Florian2002*"; //Mot de passe SMTP (Mot de passe de la boîte mail Cloudfordream)
$mail->setFrom('validatorap@alwaysdata.net
', 'ValidatorAP'); //Votre email (exemple@votredomaine.tld) - Votre nom
$mail->addAddress('furo.pagot@gmail.com', 'Florian PAGOT'); //Email du destinataire - Nom du destinataire
$mail->Subject = 'PHPMailer SMTP test'; //Sujet du mail
$mail->msgHTML("Avoue jsuis chaud de fou"); //Contenu de votre email, vous pouvez aussi appeler un template externe avec "file_get_contents"
$mail->AltBody = 'HTML messaging not supported';

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message envoyé !";
}

?>