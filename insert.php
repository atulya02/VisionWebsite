<?php

include 'establish_connection.php';
$conn=connect();


$name=mysqli_real_escape_string($conn,$_POST["fullname"]);
$email=$_POST["emailid"];
$cno=$_POST["contact"];
$gen=$_POST["gender"];
$branch=$_POST["branch"];
$post=$_POST["position"];



$sql1 = "SELECT * FROM `Recruit_data` where email='$email' ";
$result1= mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1)!=0)
{  echo("<script>");
  echo(" alert(\"This Email id is already registered. \");");
  echo("window.location.href = 'campus.html'");
  echo("</script> ");
 
 }
 else
 {
     $msg = "Hey ".$name.", you have successfully registered!!";
$sql = "INSERT INTO `Recruit_data`(`name`,`email`, `contact`, `gender`,`branch`,`post` ) VALUES ('$name','$email',$cno,'$gen','$branch','$post')";
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