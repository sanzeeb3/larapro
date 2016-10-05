<HTML>

<?php


$db = new mysqli("localhost", "root","","learndb");
$password=password_hash('prem',PASSWORD_DEFAULT);
$sql="INSERT INTO admin(username,password)values('prem','$password')";
$db->query($sql);
    
$submit=isset($_POST['submit']);

if($submit)
{
	$first=$_POST['name'];
	$password=$_POST['password'];
	$hash='$2y$10$aEcMVor4LKy5WYH2IPvaLeZpdUYJ/5yMLGKagxOtNx9ar9uLt/Z/6';

	$db = new mysqli("localhost", "root","","learndb");

	$stmt = $db->prepare("select * from admin where username = ?");
	$stmt->bind_param("s",$first);
	$stmt->execute();
	$result=$stmt->get_result();	
	$myrow=$result->fetch_assoc();

if($myrow)
{
	$isPasswordCorrect = password_verify($password, $hash);	
	if($isPasswordCorrect==1)
	{
		session_start();
      		$_SESSION['logged_in'] = true;
        	session_regenerate_id(true);
        	header("Location:loginhome.php");

	}
		else
			{
				 include_once "errorlogin.php";
			}			}
else
{
 		include_once "errorlogin.php";
}	
}

else
{

?>
<fieldset>
<legend><b>Login<b></legend>
<form method="post" action="input.php">
Username:<input type="Text" name="name" required><br>
password:<input type="password" name="password" required><br>
<input type="submit" name="submit" value="LOGIN"></form>
</fieldset>
<?php

}

?>
</HTML>