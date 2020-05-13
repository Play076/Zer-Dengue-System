<?php
interface Templatemain
{	
	//UserTemplate
	public function registeruser($newuser);
	public function loginuser($loginuser);
	//UserTemplate
	//ReportTemplate
	public function crearenewreport($newreport);
	public function requestlistreport($userreportid);
	//ReportTemplate
}
?>