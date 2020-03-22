<?php
/* 산책기록 추가하는 php */
	
	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];

	$walkContent = $_POST["walkContent"];
	$walkName= $_POST["walkName"];
	$walkDate= $_POST["walkDate"];

	/* statement를 생성하고, 실행한다. */	
	/* String타입 walkDate를 테이블에 넣을 때 Date타입으로 변환한다. */
	$statement = mysqli_prepare($con, "INSERT INTO WALK(userID, walkContent, walkName, walkDate) VALUES (?,?,?,str_to_date(?,'%Y-%m-%d'))");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "ssss", $userID, $walkContent, $walkName, $walkDate);
	mysqli_stmt_execute($statement);
	
	/* 배열을 만들어, success값을 true로 바꾼다. */
	$response = array();
	$response["success"] = true;
	
	echo json_encode($response);
?>