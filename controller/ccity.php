<?php
	include_once('connect.php');
	session_start();

	$dbs = new database();
	$db=$dbs->connection();
	$positionedit="";
	if(isset($_POST['cityy']))
	{
		$cityid = $_GET['cityedit'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$sql = mysqli_query($db,"select * from city where CityId='$cityid'");
		if(mysqli_num_rows($sql))
		{
			mysqli_query($db,"update city set StateId='$state',Name='$city' where CityId='$cityid'");
			echo "<script>window.location='../city.php';</script>";
		}
		else
		{
			mysqli_query($db,"insert into city values(null,'$state','$city')");
			echo "<script>window.location='../city.php';</script>";
		}
	}
	else if(isset($_POST['addstates']))
	{
		$stateid = $_GET['stateedit'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$sql = mysqli_query($db,"select * from state where StateId='$stateid'");
		if(mysqli_num_rows($sql))
		{
			mysqli_query($db,"update state set CountryId='$country',Name='$state' where StateId='$stateid'");
			echo "<script>window.location='../state.php';</script>";
		}
		else
		{
			mysqli_query($db,"insert into state values(null,'$country','$state')");
			echo "<script>window.location='../state.php';</script>";
		}
		
	}
	else if(isset($_POST['countryy']))
	{
		$countryid = $_GET['countryedit'];
		$countryn = $_POST['country'];
		$sql = mysqli_query($db,"select * from country where CountryId='$countryid'");
		if(mysqli_num_rows($sql))
		{
			mysqli_query($db,"update country set Name='$countryn' where CountryId='$countryid'");
			echo "<script>window.location='../country.php';</script>";
		}
		else
		{
			mysqli_query($db,"insert into country values(null,'$countryn')");
			echo "<script>window.location='../country.php';</script>";
		}
	}
	else if(isset($_POST['positionl']))
	{
		$positionid = $_GET['positionedit'];
		$positionn = $_POST['position'];
		$sql = mysqli_query($db,"select * from position where PositinId='$positionid'");
		if(mysqli_num_rows($sql))
		{
			mysqli_query($db,"update position set Name='$positionn' where PositinId='$positionid' ");
			echo "<script>window.location='../position.php';</script>";
		}
		else
		{
			mysqli_query($db,"insert into position values(null,'$positionn')");
			echo "<script>window.location='../position.php';</script>";
		}
	}
	else if(isset($_GET['statedelete']))
	{
		$delet = $_GET['statedelete'];

		mysqli_query($db,"delete from state where StateId='$delet'");
		echo "<script>window.location='../state.php';</script>";
	}
	else if(isset($_GET['citydelete']))
	{
		$delet = $_GET['citydelete'];

		mysqli_query($db,"delete from city where CityId='$delet'");
		echo "<script>window.location='../city.php';</script>";
	}
	else if(isset($_GET['countrydelete']))
	{
		$delet = $_GET['countrydelete'];

		mysqli_query($db,"delete from country where CountryId='$delet'");
		echo "<script>window.location='../country.php';</script>";
	}
	else if(isset($_GET['positiondelete']))
	{
		$delet = $_GET['positiondelete'];

		mysqli_query($db,"delete from position where PositinId='$delet'");
		echo "<script>window.location='../position.php';</script>";
	}
	else
	{
		echo "<script>alert('Click The Add Button !');</script>";
	}
?>