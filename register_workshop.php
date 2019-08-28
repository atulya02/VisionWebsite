<?php


session_start();
include 'establish_connection.php';
$con=connect();

mysqli_select_db($con,'c_workshop');

$name=$_POST['name'];
$branch=$_POST['branch'];
$college=$_POST['college'];
$scholar=$_POST['scholar'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$tid=$_POST['tid'];

$c=0;
$s="select * from regdata where Transaction='$tid'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	
	echo '<script language="javascript">';
	echo 'alert("Already Registered")';
	echo '</script>';
	
}
else
{
	$c=$c+1;
	$reg="insert into regdata values('$name','$branch','$college','$scholar','$phone','$email','$tid')";
	mysqli_query($con,$reg);
	echo '<script language="javascript">';
	echo 'alert("Registration Successful")';
	echo '</script>';


}

?>