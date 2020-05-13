<?php
include '../mainsystem/mainsystem.php';

$usercpf = $_POST['usercpf'];
$userpswd = $_POST['userpswd'];

if((isset($usercpf) && !empty($usercpf)) && (isset($userpswd) && !empty($userpswd)))
{
	$loginuser = new User(NULL, NULL, NULL, $userpswd, NULL, $usercpf, NULL, NULL, NULL, NULL);

	$MainSystem->loginuser($loginuser);
}else
{
	echo "
		<script>
			alert('Por favor preencha todos os campos de dados');
			location.href='../../login.php?status=warning';
		</script>
	     ";
}
?>