<?php

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/STMP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 25;
	$mail->Username = "mercedesdeve@gmail.com";
	$mail->Password = "mercedesdeve";
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
    echo "coucou";
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}

$result = smtpmailer('mercedesDeve@mail.com', 'votreEmail@mail.com', 'votreNom', 'Votre Message', 'Le sujet de votre message');
if (true !== $result)
{
	// erreur -- traiter l'erreur
	echo $result;
}