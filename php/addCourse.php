
<?php
require_once 'BasicConnection.php';

$sql1="select faculty from institute";
$result1=mysqli_query($conn,$sql1);


$sql2="select stream from stream";
  $result2=mysqli_query($conn,$sql2);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Z-Guide</title>
<link href="../temp.css" rel="stylesheet" type="text/css" />


<style>


.login-page {
  width: 360px;
  height:60%;
  padding: 8% 0 0;
  margin: auto;
}

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.form select {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;

}

.form option {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;

}

.form button {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #0033CC;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
	background-image:url(../Images/learning-slider-image.jpg);
	background-repeat:no-repeat;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>

</head>

<body>
<div id="main">
  <div id="banner">
  <nav>
  <ul id="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../About.php">About</a></li>
            <li><a href="../Progamme.php">Programs</a></li>
            <li class="end"><a href="../contact.php">Contacts</a></li>
           
          </ul>        
  </nav>
  
  
  </div>
  <div>
       <br><br>
     <div class="addCourse-page">
  <div class="form">

    <h1 align="center"> Add Course</h1>
    <hr>
    <br><br>

    <form class="addCourse-form" method="post" target="_parent" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

       <!--<input type="text" placeholder="Faculty" name="faculty" required="required"/>-->
        <select name="faculty">
            <option>Faculty</option>
            <?php while ($row=mysqli_fetch_array($result1)):;?> 
            <option><?php echo $row['faculty']; ?></option><?php endwhile; ?>
       </select>
       <input type="text" placeholder="Course ID" name="courseID" required="required"/>
       <input type="text" placeholder="Course Name" name="courseName" required="required"/>
      <!-- <input type="text" placeholder="Stream" name="stream" required="required"/>-->
       <select name="stream" >
            <option placeholder="stream" >Stream</option>
            <?php while ($row=mysqli_fetch_array($result2)):;?> 
            <option><?php echo $row['stream']; ?></option><?php endwhile; ?>
       </select>


       <table>
         <tr>
           <td><input type="text" placeholder="Subject 1" name="subject1" required="required"/></td>
           <td> <input type="text" placeholder="Subject 2" name="subject2" required="required"/></td>
           <td><input type="text" placeholder="Subject 3" name="subject3" required="required"/></td>
         </tr>
       </table>  
       <input type="text" placeholder="District" name="district" required="required" name="maxZ"/>
       <input type="text" placeholder="Minimum Z Score" name="minZ" required="required"/>
      
      
        <table>
          <tr>
            <td><button name="addCourse" type="submit">Add Course</button></td>
            <td><button name="cancel">Cancel </button></td>
            <td><a href="Home.php"> Back </a></td>
          </tr>
        </table> 
    </form>

<?php

require_once 'BasicConnection.php';

if(isset($_POST["addCourse"]))
{
  
  $faculty=$_POST['faculty'];
  $courseID=$_POST['courseID'];
  $courseName=$_POST['courseName'];
  $stream=$_POST['stream'];
  $subject1=$_POST['subject1'];
  $subject2=$_POST['subject2'];
  $subject3=$_POST['subject3'];
  $district=$_POST['district'];
  $minZ=$_POST['minZ'];
  


  $conn=mysqli_connect('localhost','root','','zguide');

  $query= "INSERT INTO course(faculty,courseID,courseName,stream,subject1,subject2,subject3,district,minZ) VALUES ('".$faculty."','".$courseID."','".$courseName."','".$stream."','".$subject1."','".$subject2."','".$subject3."','".$district."','".$minZ."')";


      $result=mysqli_multi_query($conn,$query);
      if($result)
      {
        echo "<script type='text/jscript'>alert('Successfully Inserted.')</script>";
      }
      else
      {
       // echo "<script type='text/jscript'>alert('Successfully Inserted.')</script>";
        die("Error in insertion! ".mysqli_error($conn));
      }

  mysqli_close ($conn);
}
?> 
    
  </div>
</div>

<script>

$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>

  </div>
</div>
</body>
</html>
