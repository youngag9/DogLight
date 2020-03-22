<?php
/* 사료의 단백질, 지방, 섬유질 비율을 수정하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	/* String으로 얻어온 인자는 테이블에 맞게 형변환한다. */
	$userID = $_POST["userID"];	
	$foodName = $_POST["foodName"];
	$foodProteinStr = $_POST["foodProtein"];
	$foodProtein = (double)$foodProteinStr;
	$foodFatStr = $_POST["foodFat"];
	$foodFat = (double)$foodFatStr;
	$foodFiberStr = $_POST["foodFiber"];
	$foodFiber = (double)$foodFiberStr;

	/* statement를 생성하고, 실행한다. */
	$statement = mysqli_prepare($con, "UPDATE FOOD SET protein = '".$foodProtein."', fat = '".$foodFat."', fiber = '".$foodFiber."' WHERE userID = '".$userID."' AND foodName = '".$foodName."'");
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