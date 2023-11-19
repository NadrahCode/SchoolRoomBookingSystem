
<!--ictbooking database-->
<?php 
	
	$hname = 'localhost';
	$uname = 'root';
	$pass = '';
	$db = 'schoolroombookingsystem';

	$con = mysqli_connect($hname,$uname,$pass,$db);


	if (!$con) {
		die("Cannot Connect to Database".mysqli_connect_error());
	}


	//login function
	function filteration($data){
		foreach ($data as $key => $value) {
			$value = trim($value);
			$value = stripcslashes($value);
			$value = strip_tags($value);
			$value = htmlspecialchars($value);

			$data[$key] = $value;
		}
		return $data;
	}


	//login
	function select($sql,$values,$datatypes)
	{
		$con = $GLOBALS['con'];
		if ($stmt = mysqli_prepare($con,$sql)) {
			mysqli_stmt_bind_param($stmt,$datatypes,...$values);
			if (mysqli_stmt_execute($stmt)){
				$res = mysqli_stmt_get_result($stmt);
				mysqli_stmt_close($stmt);
				return $res;
			}
			else
			{
				mysqli_stmt_close($stmt);
				die("Query cannot executed - Select");
			}		
		}
		else{
			die("Query cannot be executed - Select");
		}
	}
 ?>