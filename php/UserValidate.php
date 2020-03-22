<?php
/* 회원 가입 시, 아이디가 테이블에 이미 존재하는지 확인하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];

	/* statement를 생성하고, 실행한다. */
	$statement = mysqli_prepare($con, "SELECT * FROM USER WHERE userID = ?");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "s", $userID);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID);

	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	$response["success"] = true;

	while(mysqli_stmt_fetch($statement)) {
		$response["success"] = false;
		$response["userID"] = $userID;
	} 

	echo json_encode($response);
?>