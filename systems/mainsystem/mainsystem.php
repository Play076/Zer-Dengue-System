<?php
include __DIR__ . '/../obj/connection-obj.php';
include __DIR__ . '/../obj/user-obj.php';
include __DIR__ . '/../obj/report-obj.php';
include __DIR__ . '/../interface/interfacemain.php';

class MainSystem implements Templatemain
{
	private $connection;
	function __construct()
	{
		$this->connection = new ConnectionDB("localhost", "root", "", "zerdanguedb");
	}
	//UserTemplate
	public function registeruser($newuser)
	{
		$name = $newuser->getUsername();
		$email = $newuser->getUseremail();
		$pswd = $newuser->getUserpassword();
		$rg = $newuser->getUserrg();
		$cpf = $newuser->getUsercpf();
		$address = $newuser->getUseraddress();
		$phone = $newuser->getUserphone();
		$street = $newuser->getUserstreet();
		$state = $newuser->getUserstate();
		$newpswd = sha1($pswd);
		try
		{
			//Here getcha data input of user for checkout
			$checkoutregister = $this->connection->callconnect()->prepare("SELECT * FROM user WHERE email=:email OR pswd=:newpswd OR phone=:phone OR rg=:rg OR cpf=:cpf");
			$checkoutregister->bindValue(":email", $email, PDO::PARAM_STR);
			$checkoutregister->bindValue(":newpswd", $newpswd, PDO::PARAM_STR);
			$checkoutregister->bindValue(":phone", $phone, PDO::PARAM_STR);
			$checkoutregister->bindValue(":rg", $rg, PDO::PARAM_STR);
			$checkoutregister->bindValue(":cpf", $cpf, PDO::PARAM_STR);
			$checkoutregister->execute();
			//Here will checkout for verification if already exists a people registed
			if($checkoutregister->rowCount()>0)
			{
				//If already exists a user with same data don't will register new user
				echo "
					<script>
						alert('Essa pessoa já está cadastrada, tente outra');
						localhost.href='../../register.php?status=error';
					</script>
					 ";
			}else
			{
				//If don't exists a user with the data, will register a new user
				$registernewuser = $this->connection->callconnect()->prepare("INSERT INTO user (name, email, pswd, rg, cpf, address, phone, street, state) VALUES (:name, :email, :newpswd, :rg, :cpf, :address, :phone, :street, :state)");
				$registernewuser->bindValue(":name", $name, PDO::PARAM_STR);
				$registernewuser->bindValue(":email", $email, PDO::PARAM_STR);
				$registernewuser->bindValue(":newpswd", $newpswd, PDO::PARAM_STR);
				$registernewuser->bindValue(":rg", $rg, PDO::PARAM_STR);
				$registernewuser->bindValue(":cpf", $cpf, PDO::PARAM_STR);
				$registernewuser->bindValue(":address", $address, PDO::PARAM_STR);
				$registernewuser->bindValue(":phone", $phone, PDO::PARAM_STR);
				$registernewuser->bindValue(":street", $street, PDO::PARAM_STR);
				$registernewuser->bindValue(":state", $state, PDO::PARAM_STR);
				$registernewuser->execute();

				echo "
					<script>
						alert('Cadastro realizado com sucesso!');
						location.href='../../login.php';
					</script>
					 ";
			}
			
		}catch(PDOException $ex)
		{
			echo "Error: " . $ex->getMessage();
		};
	}
	public function loginuser($loginuser)
	{
		$cpf = $loginuser->getUsercpf();
		$pswd = $loginuser->getUserpassword();
		$checkpswd = sha1($pswd);
		try
		{
			$loginusercheckout = $this->connection->callconnect()->prepare("SELECT * FROM user WHERE cpf=:cpf AND pswd=:checkpswd");
			$loginusercheckout->bindValue(":cpf",  $cpf, PDO::PARAM_STR);
			$loginusercheckout->bindValue(":checkpswd", $checkpswd, PDO::PARAM_STR);
			$loginusercheckout->execute();

			if($loginusercheckout->rowCount()>0)
			{
				$loguser = $loginusercheckout->fetch(PDO::FETCH_ASSOC);
				session_start();
				$_SESSION['userid'] = $loguser['id'];
				$_SESSION['username'] = $loguser['name'];
				$_SESSION['useremail'] = $loguser['email'];
				$_SESSION['userpswd'] = $loguser['pswd'];
				$_SESSION['userrg'] = $loguser['rg'];
				$_SESSION['usercpf'] = $loguser['cpf'];
				$_SESSION['useraddress'] = $loguser['address'];
				$_SESSION['userphone'] = $loguser['phone'];
				$_SESSION['userstreet'] = $loguser['street'];
				$_SESSION['userstate'] = $loguser['state'];

				echo "
					<script>
						alert('Bem-vindo " . $_SESSION['username'] . ".');
						location.href='../../dashboard.php';
					</script>
					 ";
 			}else
			{
				echo "
					<script>
						alert('Houve algum erro, esses cadastro não existe');
						location.href='../../login.php?status=error';
					</script>
					 ";
			}
		}catch(PDOException $ex)
		{
			echo "Error: " . $ex->getMessage();
		};
	}
	//UserTemplate
	//ReportTemplate
	public function crearenewreport($newreport)
	{
		$reportaddress = $newreport->getReportaddress();
		$reportphoto = $newreport->getReportphoto();
		$reportdescription = $newreport->getReportdescription();
		$reportuserid = $newreport->getReportuser();
		try
		{
			$regisrenewreport = $this->connection->callconnect()->prepare("INSERT INTO report (iduser, address, photo, description) VALUES (:reportuserid, :reportaddress, :reportphoto, :reportdescription)");
			$regisrenewreport->bindValue(":reportuserid", $reportuserid, PDO::PARAM_INT);
			$regisrenewreport->bindValue(":reportaddress", $reportaddress, PDO::PARAM_STR);
			$regisrenewreport->bindValue(":reportphoto", $reportphoto, PDO::PARAM_STR);
			$regisrenewreport->bindValue(":reportdescription", $reportdescription, PDO::PARAM_STR);
			$regisrenewreport->execute();

			echo "
				<script>
					alert('Novo cadastrado com sucesso, obrigado(a) por ajuda!!');
					location.href='../../reportlist.php';
				</script>
				 ";

		}catch(PDOException $ex)
		{
			echo "Error: " . $ex->getMessage();
		};
	}
	public function requestlistreport($userreportid)
	{
		try
		{
			$getallreports = $this->connection->callconnect()->prepare("SELECT * FROM report INNER JOIN user ON report.iduser = user.id WHERE iduser=:userreportid");
			$getallreports->bindValue(':userreportid', $userreportid, PDO::PARAM_STR);
			$getallreports->execute();
			$arrayreport = array();

			while($getlistreport = $getallreports->fetch(PDO::FETCH_ASSOC))
			{
				$getreportslist = new Report($getlistreport['id'], $getlistreport['iduser'], $getlistreport['address'], $getlistreport['photo'], $getlistreport['description']);

				array_push($arrayreport, $getreportslist);
			}

			return $arrayreport;
		}catch(PDOException $ex)
		{
			echo "Error: " . $ex->getMessage();
		}
	}
	//ReportTemplate
}
$MainSystem = new MainSystem();
?>