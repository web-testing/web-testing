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
</head>

<body>
<p><a href="add-meeting.php">Add meeting schedule</a></p>
<?php
/* 
        VIEW.PHP
        Displays all data from 'players' table
*/

        // connect to the database
        include('../config.php');

        // get results from database
        $result = mysql_query("SELECT * FROM meeting") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>Sl. No.</th> <th>First meeting</th> <th></th> <th></th></tr>";
		
		$i=1;

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $i . '</td>';
                echo '<td>' . $row['meeting'] . '</td>';
                echo '<td><a href="edit-meeting.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="delete-meeting.php?id=' . $row['id'] . '">Delete</a></td>';
                echo "</tr>"; 
				
				$i++;
        } 

        // close table>
        echo "</table>";
?>


</body>
</html>