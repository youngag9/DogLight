<?php
/* 사용자가 선택한 강아지를 삭제하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$dogName = $_POST["dogName"];

	/* statement를 생성하고, 실행한다. */	
	$statement = mysqli_prepare($con, "DELETE FROM DOG where userID = '$userID' AND dogName = '$dogName'");
	mysqli_stmt_execute($statement);

	/* 배열을 만들어, success값을 true로 바꾼다. */
	$response = array();
	$response["success"] = true;

	echo json_encode($response);
?>