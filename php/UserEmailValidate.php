<?php
/* 임시 비밀번호를 발급받기 전에, 사용자가 입력한 이메일 계정이 가입 시 입력한 이메일인지 확인하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$userEmail = $_POST["userEmail"];

	/* statement를 생성하고, 실행한다. */
	$statement = mysqli_prepare($con, "SELECT * FROM USER WHERE userID = ? AND userEmail = ?");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "ss", $userID, $userEmail);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID);

	$result = mysqli_stmt_fetch($statement);
	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	if($result == false) {
		$response["success"] = false;
	}
	else {
		$response["success"] =true;
	}


	echo json_encode($response);
?>