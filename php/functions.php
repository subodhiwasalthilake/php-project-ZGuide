<?php 

function GetStudentDetails($conn,$studentId)
{
	$query = "select * from facultyInformation where facultyID ='$facultyID'";
	$facultyInf = array();
	$i = 0;
	$result = mysqli_query($conn,$query);
		if ($result) {
			$num_of_rows = mysqli_num_rows($result);
			if ($num_of_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$facultyInf[$i] = $row;
					$i++;
				}
				mysqli_free_result($result);
			}
			else{
			//table empty
			$facultyInf = null;
		}
			
		}
		else{
			//error
			$facultyInf = null;
		}

	return $facultyInf;
}

function UpdateStudent($conn,$facultyID,$newfacultyID,$faculty,$contact,$email,$address,$information)
{
	$query = "update facultyInformation set faculty='$faculty', facultyID = '$newfacultyID',
				 contact='$contact', email='$email', address='$address', information='$information'
				 where facultyID ='$facultyID'";
				 
	$result = mysqli_query($conn,$query);
		if ($result) {
			return true;
		}
		else{
			return false;	
		}

}


function DeleteCourse($conn,$courseID)
{
	$query = "delete  from course where courseID ='$courseID'";
	//$message = "";
	$result = mysqli_query($conn,$query);
		if ($result) {
				//$message = "Deleted !";
			return true;
		}
		else{
			//error
			//$message = "Error";
			return false;	
		}

	return $message;
}
 ?>