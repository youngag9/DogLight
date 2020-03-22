<?php
/* 강아지의 나잇대, 몸무게를 수정하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	/* String으로 얻어온 인자는 테이블에 맞게 형변환한다. */
	$userID = $_POST["userID"];
	$dogName = $_POST["dogName"];
	$dogAges = $_POST["dogAges"];
	$dogWeightStr = $_POST["dogWeight"];
	$dogWeight = (double)$dogWeightStr;

	/* statement를 생성하고, 실행한다. */
	$statement = mysqli_prepare($con, "UPDATE DOG SET dogAges = '".$dogAges."', dogWeight = '".$dogWeight."' WHERE userID = '".$userID."' AND dogName = '".$dogName."'");
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