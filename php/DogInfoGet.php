<?php
/* 사용자가 등록한 강아지 중 선택한 강아지의 정보룰 가져오는 php */
	header("Content-Type: text/html; charset=UTF-8");
	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* url에 같이 온 인자들을 GET형식으로 받아와 변수로 저장한다. */
	$userID = $_GET["userID"];
	$dogName = $_GET["dogName"];

	/* statement를 생성하고, 실행한다. */
	$result = mysqli_query($con, "SELECT dogName, dogAges, dogWeight FROM DOG WHERE userID = '$userID' AND dogName = '$dogName'");

	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	/* select 결과가 존재할 때까지 while문을 반복한다. */
	while ($row = mysqli_fetch_array($result)) {
		array_push($response, array("myDogName" =>$row[0], "myDogAges" =>$row[1], "myDogWeight" =>$row[2]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>