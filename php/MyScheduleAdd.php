<?php
/* ��å��� �߰��ϴ� php */
	
	/* DB�� �����Ѵ� */
	$con = mysqli_connect("localhost", "dms7147", "doglight94", "dms7147");

	/* Request�� ���� ���ڵ��� POST�������� �޾ƿ� ������ �����Ѵ�. */
	$userID = $_POST["userID"];

	$walkContent = $_POST["walkContent"];
	$walkName= $_POST["walkName"];
	$walkDate= $_POST["walkDate"];

	/* statement�� �����ϰ�, �����Ѵ�. */	
	/* StringŸ�� walkDate�� ���̺� ���� �� DateŸ������ ��ȯ�Ѵ�. */
	$statement = mysqli_prepare($con, "INSERT INTO WALK(userID, walkContent, walkName, walkDate) VALUES (?,?,?,str_to_date(?,'%Y-%m-%d'))");
	/* statement�� �� ���ڵ��� bind�Ѵ�. */
	mysqli_stmt_bind_param($statement, "ssss", $userID, $walkContent, $walkName, $walkDate);
	mysqli_stmt_execute($statement);
	
	/* �迭�� �����, success���� true�� �ٲ۴�. */
	$response = array();
	$response["success"] = true;
	
	echo json_encode($response);
?>