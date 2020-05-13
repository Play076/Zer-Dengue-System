<?php
include __DIR__ . '/../mainsystem/mainsystem.php';

$username = $_POST['username'];
$useremail = $_POST['useremail'];
$userpswd = $_POST['userpswd'];
$userrg = $_POST['userrg'];
$usercpf = $_POST['usercpf'];
$useraddress = $_POST['useraddress'];
$userphone = $_POST['userphone'];
$userstate = $_POST['userstate'];
$userstreet = $_POST['userstreet'];

if((isset($username) && !empty($username)) && (isset($useremail) && !empty($useremail)) && (isset($userpswd) && !empty($userpswd)) && (isset($userrg) && !empty($userrg)) && (isset($usercpf) && !empty($usercpf)) && (isset($useraddress) && !empty($useraddress)) && (isset($userphone) && !empty($userphone)) && (isset($userstate) && !empty($userstate)) && (isset($userstreet) && !empty($userstreet)))
{
	$newdata = new User(NULL, $username, $useremail, $userpswd, $userrg, $usercpf, $useraddress, $userphone, $userstreet, $userstate);

	$MainSystem->registeruser($newdata);
}else
{
	echo "
		<script>
			alert('Por favor preencha todos os campos de dados');
			location.href='../../register.php?status=warning';
		</script>
		 ";
}

?>