<?php
/* 인증번호를 메일로 보내는 php */

	/* 오픈소스인 Sednmail.php를 include한다. */
	include "Sendmail.php";
	/* Sendmail 객체를 만든다. */
	$sendmail = new Sendmail();

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");
	
	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userEmail = $_POST["userEmail"];
	$randomNum = $_POST["randomNum"];

	/* 사용자의 계정으로 메일을 보낸다. */
	$to = $userEmail;
	$from = "Master";
	$subject = "인증메일입니다";
	$body = $randomNum;
	$cc_mail = "";
	$bcc_mail = "";

	$sendmail->send_mail($to, $from, $subject, $body, $cc_mail, $bcc_mail);

?>