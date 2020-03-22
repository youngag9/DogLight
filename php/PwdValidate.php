<?php
/* 비밀번호를 변경하기 전에 사용자가 기존 비밀번호를 알고 있는지 확인하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$currentPassword = $_POST["currentPassword"];

	/* statement를 생성하고, 실행한다. */	
	$statement = mysqli_prepare($con, "SELECT userID, userPassword FROM USER WHERE userID = ?");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "s", $userID);
	mysqli_stmt_execute($statement);
	/* 비밀번호를 확인하기 위해, 아이디와 비밀번호를 결과에 저장한다. */
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $checkPassword);

	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	$response["success"] = false;

	while(mysqli_stmt_fetch($statement)) {
		/* 비밀번호가 맞는지 확인한다. */
		if(password_verify($currentPassword, $checkPassword)) {
			$response["success"] = true;
			$response["userID"] = $userID;
		}
	} 

	echo json_encode($response);
?>