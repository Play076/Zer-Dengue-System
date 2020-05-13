<?php
include '../mainsystem/mainsystem.php';

$address = $_POST['address'];
$description = $_POST['description'];
$userid = $_POST['userid'];

if((isset($address) && !empty($address)) && (isset($description) && !empty($description)))
{
	if(isset($_FILES['imgreport']))
	{
		$newplace = "../../reports/";
		$image = $_FILES['imgreport']['tmp_name'];
		$getname = substr($_FILES['imgreport']['name'], -4);
		$newname = sha1($getname);

		move_uploaded_file($image, $newplace.$newname.".png");
	}else
	{
		echo "
			<script>
				alert('Por favor selecione uma image do local');
				location.href='../../newreport.php?stauts=imgwarning';
			</script>
			 ";
	}

	$photo = $newname;

	$newreports = new Report(NULL, $userid, $address, $photo, $description);
	$MainSystem->crearenewreport($newreports);
}else
{
	echo "
		<script>
			alert('Por favor preencha todos os campos de dados');
			location.href='../../newreport.php?stauts=warning';
		</script>
		 ";
}

?>