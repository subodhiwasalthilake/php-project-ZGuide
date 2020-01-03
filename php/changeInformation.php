<?php
require_once 'BasicConnection.php';


$sql1="select faculty from institute group by faculty";
$result1=mysqli_query($conn,$sql1);


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

.form textarea {
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
  <div >
       <br><br>
     <div class="changeInformation-page">
  <div class="form" >
    <h1 align="center"> Change Information </h1>
    <hr>
    <br><br>

    <form class="changeInformation-form" method="POST" target="_parent" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

      <input type="text" placeholder="Faculty ID " name="facultyID" required="required"/>
      
      <select name="faculty">
            <option>Faculty</option>
            <?php while ($row=mysqli_fetch_array($result1)):;?> 
            <option><?php echo $row['faculty']; ?></option><?php endwhile; ?>
       </select>
       <input type="Number" placeholder="Contact Number " name="contact" required="required"/>
       <input type="email" placeholder="E-mail " name="email" required="required"/>
       <textarea  name="address" placeholder="Address" required="required" rows="10" cols="20"> </textarea>
       <textarea placeholder="Information" name="information" required="required" rows="30" cols="30"> </textarea>
    
        <table>
          <tr>
            <td><button name="Change" type="submit">Change Information</button></td>
            <td><button name="cancel">Cancel </button></td>
            <td><a href="Home.php"> Back </a></td>
          </tr>
        </table> 
    </form>

<?php



if(isset($_POST["Change"]))
{
 // $facultyID=$_GET['facultyID'];
  $facultyID=$_POST['facultyID'];
  $faculty=$_POST['faculty'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $information=$_POST['information'];
 
   require_once 'BasicConnection.php';

  $query= "update facultyInformation set faculty='$faculty', contactNumber='$contact' ,email='$email',address='$address',information='$information'
         where facultyID ='$facultyID'"; 


      $result=mysqli_multi_query($conn,$query);
      if($result)
      {
        echo "<script type='text/jscript'>alert('Successfully updated.')</script>";
      }
      else
      {
       // echo "<script type='text/jscript'>alert('Successfully Inserted.')</script>";
        die("Error in updation! ".mysqli_error($conn));
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
