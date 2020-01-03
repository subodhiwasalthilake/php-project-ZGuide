<?php 

	Define('SERVER','localhost');
	Define('USER','root');
	Define('PASSWORD','');
	Define('DB','zguide');

	$conn=mysqli_connect(SERVER,USER,PASSWORD,DB);

	if(!$conn)
	{
		echo "MySQL Connection Failed !".mysqli_connect_error($conn);
	}
	else
	{	
		
		//echo "<br>MySQL Connected !";
	}

	//mysqli_close($conn);
 ?>