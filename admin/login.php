<? ob_start(); ?>
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="audit.css"/>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    	<?php
	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	 {
			// username and password sent from form 
			$myusername=$_POST['myusername']; 
			$mypassword=$_POST['mypassword'];
	
			if($myusername=="admin@goodvision" && $mypassword=="gd#vsn$123") {
			 $_SESSION['is_logged_in'] = 1;
		 }
	}
	
	if(!isset($_SESSION['is_logged_in'])) {
		
		if($_POST)
		{
			if(!($myusername=="admin@goodvision" && $mypassword=="gd#vsn$123"))
			{
				echo "Enter valid username and password.";
			}
		}
			
?>
<form name="form1" method="post" action="login.php">
    <table width="300" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#629922" bgcolor="#FFFFFF" style="border-collapse:collapse;">
    <tr>
        <td colspan="3" align="center" bgcolor="#629922"><strong style="color:#FFF;">Member Login </strong></td>
    </tr>
    <tr>
        <td width="75" align="left" valign="middle">Username</td>
        <td width="13" align="left" valign="middle">:</td>
        <td width="190" align="left" valign="middle"><input name="myusername" type="text" id="myusername"></td>
    </tr>
    <tr>
        <td align="left" valign="middle">Password</td>
        <td align="left" valign="middle">:</td>
        <td align="left" valign="middle"><input name="mypassword" type="password" id="mypassword"></td>
    </tr>
    <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><input type="submit" name="Submit" value="Login"></td>
    </tr>
    </table>
</form>
<?php
		// display your login here
	} else {
		header("location:login_success.php");
	}

?>
    </td>
  </tr>
</table>



</body>
</html>
<? ob_flush(); ?>