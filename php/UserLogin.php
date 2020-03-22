<?php
/* 로그인 시, 입력한 정보가 맞는지 확인하고 해당 사용자가 이메일을 확인하였는지 체크하는 php */

	/* DB에 접속한다 */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request로 보낸 인자들을 POST형식으로 받아와 변수로 저장한다. */
	$userID = $_POST["userID"];
	$userPassword = $_POST["userPassword"];

	/* success는 로그인 화면에 입력한 사용자의 아이디와 비밀번호가 정확한가의 결과를 저장한다. */
	/* emailsuccess는 가입 시 받은 이메일의 링크를 클릭하면 변경되는 verify 변수가 Y인지 확인한다. */
	$response = array();
	$response["success"] = false;
	$response["emailsuccess"] = false;

	/* statement를 생성하고, 실행한다. */
	$statement = mysqli_prepare($con, "SELECT userID, userPassword FROM USER WHERE userID = ?");
	/* statement에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement, "s", $userID);
	mysqli_stmt_execute($statement);
	/* 비밀번호를 확인하기 위해, 아이디와 비밀번호를 결과에 저장한다. */
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $checkPassword);

	/* select 결과가 존재할 때까지 while문을 반복한다. */
	while (mysqli_stmt_fetch($statement)) {
		/* 비밀번호가 맞는지 확인한다. */
		if(password_verify($userPassword, $checkPassword)) {
			$response["success"] = true;
			$response["userID"] = $userID;	
		}
	}

	/* statement2를 생성하고, 실행한다. */
	$statement2 = mysqli_prepare($con, "SELECT * FROM USER WHERE userID = ? AND verify = 'Y'");
	/* statement2에 들어갈 인자들을 bind한다. */
	mysqli_stmt_bind_param($statement2, "s", $userID);
	mysqli_stmt_execute($statement2);

	/* select 결과가 존재할 때까지 while문을 반복한다. */
	while (mysqli_stmt_fetch($statement2)) {
		$response["emailsuccess"] = true;
	}

	echo json_encode($response);
?>