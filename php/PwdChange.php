<?php
/* 사용자의 비밀번호를 변경하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$newPassword = $_POST["newPassword"];
	/* 비밀번호를 암호화하기 위해. 새로운 변수를 지정한다. */
	$checkPassword = password_hash($newPassword, PASSWORD_DEFAULT);
	
	/* statement를 생성하고, 실행한다. */	
	$statement = mysqli_prepare($con, "UPDATE USER SET userPassword = '$checkPassword' WHERE userID = '$userID'");
	$result = mysqli_stmt_execute($statement);

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
