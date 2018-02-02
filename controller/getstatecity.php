<?php
include_once('connect.php');
	$dbs = new database();
	$db=$dbs->connection();
	session_start();

	if($_GET["Type"]=="c")
	{
		$stateid = $_GET['si'];
		$cityidd = $_GET['sc'];
		$cityn = mysqli_query($db,"select * from city where StateId='$stateid' ORDER BY Name");
		$ReturnCityArray=array();

		while($row = mysqli_fetch_assoc($cityn))
		{
			array_push($ReturnCityArray, $row);
		}
		echo "<option value=''>-- Select City --</option>";
		foreach ($ReturnCityArray as $ca) 
		{
			if($ca['CityId']==$cityidd)
				echo "<option value='".$ca['CityId']."' selected>".$ca['Name']."</option>";
			else
				echo "<option value='".$ca['CityId']."'>".$ca['Name']."</option>";
		}	
	}

	if($_GET["Type"]=="s")
	{
		$countryid = $_GET['ci'];
		$stateidd = $_GET['ss'];
		$staten = mysqli_query($db,"select * from state where CountryId='$countryid' ORDER BY Name");
		$ReturnStateArray=array();
	
		while($row = mysqli_fetch_assoc($staten))
		{
			array_push($ReturnStateArray, $row);
		}
		echo "<option value=''>-- Select State --</option>";	
		foreach ($ReturnStateArray as $sa)
		{
			if($sa["StateId"]==$stateidd)
				echo "<option value='".$sa['StateId']."' selected>".$sa['Name']."</option>";	
			else
				echo "<option value='".$sa['StateId']."' >".$sa['Name']."</option>";
		}
	}	
?>