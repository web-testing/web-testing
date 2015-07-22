test
<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<marquee scrollamount="3" behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
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
                
        
        echo "<table border='0' cellpadding='5' cellspacing='0'>";
		
		$i=1;

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['meeting'] . '</td>';
                echo "</tr>"; 
				
				$i++;
        } 

        // close table>
        echo "</table>";
?>
</marquee>

</body>
</html>
<? ob_flush(); ?>
