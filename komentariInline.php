<?php

/*
		Author: Iwebux
		Description: configure db connection
		Copyright: iwebux.com
*/

include ('classes/DB.php');

/*Check for data from the browser*/

if(isset($_POST['rownum']))
{

	
	update_data($_POST['field'],$_POST['value'],$_POST['rownum']);
	
}

/*Retrieve records from db*/
function get_data()
{
	
	$sql = "select * from casopis";
	
	$rs = mysql_query($sql);
	
	return $rs;
}
/*Update records in db*/
function update_data($field, $value, $rownum)
{

	
	$sql = "update casopis set ".$field." = '".$value."' where id_casopis = ".$rownum;
	
	mysql_query($sql) or die("Couldn't connect to db");
	
	
}

?>