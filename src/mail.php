<?php
	require_once 'phpmailer/class.phpmailer.php';
	require_once 'config.php';
	function Send ($from, $fromName ,$subject, $destination, $content, $replyTo, $replayToName) {
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPAuth = true;
		$mailer->Host = SMTP_HOST;
		$mailer->Port = SMTP_PORT;
		$mailer->Username = SMTP_USER;
		$mailer->Password = SMTP_TOKEN;
		$mailer->From = $from;
		$mailer->FromName = $fromName;
		$mailer->AddAddress($destination);
		$mailer->AddReplyTo($replyTo, $replayToName);
		$mailer->IsHTML(true);
		$mailer->Subject = $subject;
		$mailer->Body = $content;
		return $mailer->Send();
	}
?>