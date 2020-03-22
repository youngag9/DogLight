<?php
/* 사용자가 만들어놓은 강아지 목록을 가져오는 php */
	header("Content-Type: text/html; charset=UTF-8");
	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* url에 같이 온 인자들을 GET형식으로 받아와 변수로 저장한다. */
	$userID = $_GET["userID"];

	/* statement를 생성하고, 실행한다. */
	$result = mysqli_query($con, "SELECT dogName, dogAges, dogWeight FROM DOG WHERE userID = '$userID'");

	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	/* select 결과가 존재할 때까지 while문을 반복한다. */
	while ($row = mysqli_fetch_array($result)) {
		/* row의 각 열을 response의 변수에 넣는다. */
		array_push($response, array("myDogName" =>$row[0], "myDogAges" =>$row[1], "myDogWeight" =>$row[2]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>