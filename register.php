<?php
include 'establish_connection.php';
$conn=connect();

$name=mysqli_real_escape_string($conn,$_POST["firstname"]);
$email=$_POST["emalid"];
$cno=$_POST["contact"];
$gen=$_POST["gender"];
$college=mysqli_real_escape_string($conn,$_POST["college"]);
$course=$_POST["course"];
$branch=$_POST["branch"];
$ques1=mysqli_real_escape_string($conn,$_POST["ques1"]);
$ques2=mysqli_real_escape_string($conn,$_POST["ques2"]);
$ques3=mysqli_real_escape_string($conn,$_POST["ques3"]);


$sql1 = "SELECT * FROM `CA_FORM` where email='$email' ";
$result1= mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1)!=0)
{  echo("<script>");
  echo(" alert(\"This Email id is already registered. \");");
  echo("window.location.href = 'campus.html'");
  echo("</script> ");
 
 }
 else
 {
     $msg = "Hey ".$name.", you have successfully registered for campus ambasssador program! Thank you for registering!!";
$sql = "INSERT INTO `CA_FORM`(`name`,`email`, `cno`, `gen`,  `college`, `course`,`branch`,`ques1`,`ques2`,`ques3` ) VALUES ('$name','$email','$cno','$gen','$college','$course','$branch','$ques1','$ques2','$ques3')";
if (mysqli_query($conn, $sql)) {
    $headers = 'From: info@visionmanit.org';
    $headers .= " Reply-To: info@visionmanit.org\r\n";
    $headers .= " Return-Path: info@visionmanit.org\r\n";
    $val=mail("$email","VISION MANIT",$msg,$headers);
    if($val) {
	  echo("<script>");
	  echo(" alert(\"Congratulations you have been registered check your email for further details\");");
	  echo("window.location.href = 'index.html'");
	  echo("</script> ");
  	}
  	else {
  		echo("<script>");
	  echo(" alert(\"Congratulations you have been registered.\");");
	  
	  echo("</script> ");
  	}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
 ?>