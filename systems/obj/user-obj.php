<?php
class User
{
	private $Userid;
	private $Uername;
	private $Useremail;
	private $Userpassword;
	private $UserRG;
	private $UserCPF;
	private $UserAddress;
	private $Userphone;
	private $Userstreet;
	private $Userstate;

	//Construct method
	function __construct($userid, $name, $email, $pswd, $rg, $cpf, $address, $phone, $street, $state)
	{
		$this->Userid = $userid;
		$this->Username = $name;
		$this->Useremail = $email;
		$this->Userpassword = $pswd;
		$this->UserRG = $rg;
		$this->UserCPF = $cpf;
		$this->UserAddress = $address;
		$this->Userphone = $phone;
		$this->Userstreet = $street;
		$this->Userstate = $state;
	}
	//Get Method
	public function getUserid()
	{
		return $this->Userid;
	}
	public function getUsername()
	{
		return $this->Username;
	}
	public function getUseremail()
	{
		return $this->Useremail;
	}
	public function getUserpassword()
	{
		return $this->Userpassword;
	}
	public function getUserrg()
	{
		return $this->UserRG;
	}
	public function getUsercpf()
	{
		return $this->UserCPF;
	}
	public function getUseraddress()
	{
		return $this->UserAddress;
	}
	public function getUserphone()
	{
		return $this->Userphone;
	}
	public function getUserstreet()
	{
		return $this->Userstreet;
	}
	public function getUserstate()
	{
		return $this->Userstate;
	}
}
?>