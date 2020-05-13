<?php
class Report
{
	private $Reportid;
	private $Reportuser;
	private $Reportaddress;
	private $Reportphoto;
	private $Reportdescription;
	//Construct method
	function __construct($reportid, $reportuser, $address, $photo, $description)
	{
		$this->Reportid = $reportid;
		$this->Reportuser = $reportuser;
		$this->Reportaddress = $address;
		$this->Reportphoto = $photo;
		$this->Reportdescription = $description;
	}
	//Get method
	public function getReportid()
	{
		return $this->Reportid;
	}
	public function getReportuser()
	{
		return $this->Reportuser;
	}
	public function getReportaddress()
	{
		return $this->Reportaddress;
	}
	public function getReportphoto()
	{
		return $this->Reportphoto;
	}
	public function getReportdescription()
	{
		return $this->Reportdescription;
	}
}
?>