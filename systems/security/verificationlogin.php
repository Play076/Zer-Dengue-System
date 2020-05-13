<?php
if(!isset($_SESSION['userid']) && !isset($_SESSION['username']) && !isset($_SESSION['useremail']) && !isset($_SESSION['userpswd']) && !isset($_SESSION['userrg']) && !isset($_SESSION['usercpf']) && !isset($_SESSION['useraddress']) && !isset($_SESSION['userphone']) && !isset($_SESSION['userstreet']) && !isset($_SESSION['userstate']))
{
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
		$_SESSION['userstate']
			);
	session_destroy();

	echo "
		<script>
			alert('Acesso negado.');
			location.href='login.php';
		</script>
		 ";
}
?>