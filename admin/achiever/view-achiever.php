<?php
session_start();

if (!isset($_SESSION['is_logged_in'])) {
     header("Location:../login.php");
     die();     // just to make sure no scripts execute
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body{
	font:13px/16px Tahoma, Arial;
}
table{border-collapse: collapse;}
table th{ border:1px solid #bbb; vertical-align:middle; background: #039915; color: #FFF;}
table td{ border:1px solid #bbb; vertical-align:top;}
.row td   {
	background: #F5F5F5; 
}
.row2 td { 
background: #EDFFF7; 
}
td{
	transition:all 300ms ease-in;
	-webkit-transition:all 300ms ease-in ;
	-moz-transition:all 300ms ease-in ;
	-ms-transition:all 300ms ease-in ;
}
.row:hover td,
.row2:hover td   { background: #2FD54A; }

a{
	display: inline-block;
	padding: 5px 15px;
	border: 1px solid #DADADA;
	background: #FF5C00;
	color: #FFF;
	font-weight: bold;
	text-decoration: none;
	border-radius: 5px;
	box-shadow: 0 0 5px #F5FF00;
}
a.del{
	border: 1px solid #858585;
	background: #535353;
}

</style>
</head>

<body>
<p><a href="add-achiever.php">Add Achievers</a></p>
<?php
/* 
        VIEW.PHP
        Displays all data from 'players' table
*/

        // connect to the database
        include('../config.php');

        // get results from database
        $result = mysql_query("SELECT * FROM achieverlist") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>Sl. No.</th> <th>First Name</th> <th>Edit</th> <th>Delete</th></tr>";
		
		$i=1;

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo '<tr class="row'; if($i%2==0) {echo '2';} echo '">';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td><a href="edit-achiever.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="delete-achiever.php?id=' . $row['id'] . '" class="del">Delete</a></td>';
                echo "</tr>"; 
				
				$i++;
        } 

        // close table>
        echo "</table>";
?>


</body>
</html>