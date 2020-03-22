<?php
/* 회원 가입하는 php */

	/* 오픈소스인 Sednmail.php를 include한다. */
	include "Sendmail.php";
	/* Sendmail 객체를 만든다. */
	$sendmail = new Sendmail();

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$userPassword = $_POST["userPassword"];
	$userEmail = $_POST["userEmail"];

	/* 비밀번호를 암호화하기 위해. 새로운 변수를 지정한다. */
	$checkPassword = password_hash($userPassword, PASSWORD_DEFAULT);

	/* statement를 생성하고, 실행한다. */	
	$statement = mysqli_prepare($con, "INSERT INTO USER(userID, userPassword, userEmail) VALUES (?,?,?)");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "sss", $userID, $checkPassword, $userEmail);
	mysqli_stmt_execute($statement);

	/* 배열을 만들어,  success값을 true로 바꾼다. */
	$response = array();
	$response["success"] = true;

	echo json_encode($response);

	/* 사용자의 계정으로 메일을 보낸다. */
	$to = $userEmail;
	$from = "Master";
	$subject = "인증메일입니다";
	$body = "http://dms7147.cafe24.com/Verify.php?userID=$userID";
	$cc_mail = "";
	$bcc_mail = "";

	$sendmail->send_mail($to, $from, $subject, $body, $cc_mail, $bcc_mail);
?>