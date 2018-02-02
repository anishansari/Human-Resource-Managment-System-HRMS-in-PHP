<?php
	
	class database
	{
		
		function connection()
		{
			return mysqli_connect('localhost','root','','hr');
		}
	}

?>