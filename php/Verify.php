<?php
/* 가입 시, 계정으로 온 이메일의 링크를 클릭하면 사용자의 verify값을 Y로 바꿔주는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* 사용자의 id를 REQUEST로 받아온다 */
	$userID = $_REQUEST["userID"];

	/* statement를 생성하고, 실행한다. */	
	$statement = mysqli_prepare($con, "UPDATE USER SET VERIFY = 'Y' WHERE userID = ?");
	mysqli_stmt_bind_param($statement, "s", $userID);
	$result = mysqli_stmt_execute($statement);
	if($result)
		echo "인증되었습니다";
?>