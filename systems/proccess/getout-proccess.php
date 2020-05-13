<?php
	session_start();
	session_destroy();
	unset(
		$_SESSION['userid'],
		$_SESSION['username'],
		$_SESSION['useremail'],
		$_SESSION['userpswd'],
		$_SESSION['userrg'],
		$_SESSION['usercpf'],
		$_SESSION['useraddress'],
		$_SESSION['userphone'],
		$_SESSION['userstreet'],
		$_SESSION['userstate']);

	echo "
		<script>
			location.href='../../login.php';
		</script>
		 ";
?>