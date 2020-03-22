<?php
/* 산책 시 유의사항을 가져오는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");
	/* statement를 생성하고, 실행한다. */
	$result = mysqli_query($con, "SELECT * FROM WALKNOTICE ORDER BY noticeDate DESC;");
	
	/* 배열을 만들어, 성공여부에 따라 success를 바꾼다. */
	$response = array();
	/* select 결과가 존재할 때까지 while문을 반복한다. */
	while ($row = mysqli_fetch_array($result)) {
		array_push($response, array("noticeContent"=>$row[0], "noticeName"=>$row[1], "noticeDate"=>$row[2]));
	}

	echo json_encode(array("response"=>$response));
	mysqli_close($con);
?>