<?php
/* 사료를 추가하는 php */

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
	$statement = mysqli_prepare($con, "INSERT INTO FOOD(userID, foodName, protein, fat, fiber) VALUES (?,?,?,?,?)");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "ssddd", $userID, $foodName, $foodProtein, $foodFat, $foodFiber);
	mysqli_stmt_execute($statement);

	/* 배열을 만들어, success값을 true로 바꾼다. */
	$response = array();
	$response["success"] = true;

	echo json_encode($response);
?>