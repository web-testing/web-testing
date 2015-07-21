<?php

//code for connect.php

//$host = "wwwgoodv.db.10109178.hostedresource.com"; // replace this with your host, default is localhost

//$user = "wwwgoodv"; // replace with the mysql username

//$pass = "Goodvision@123"; // replace with the mysql password

//$db_name = "wwwgoodv";

//code for connect.php

$host = "mysql2.000webhost.com"; // replace this with your host, default is localhost

$user = "a2476848_gv"; // replace with the mysql username

$pass = "gv@Web1"; // replace with the mysql password

$db_name = "a2476848_gv";


mysql_connect($host,$user,$pass) or die("
Cannot connect to host.....".mysql_error());

mysql_select_db($db_name) or die("
Cannot connect to Database.....".mysql_error());


// local db conn

//code for connect.php

//$host = "localhost"; // replace this with your host, default is localhost
//
//$user = "root"; // replace with the mysql username
//
//$pass = ""; // replace with the mysql password
//
//$db_name = "sflagro";
//
//
//mysql_connect($host,$user,$pass) or die("
//Cannot connect to host.....".mysql_error());
//
//mysql_select_db($db_name) or die("
//Cannot connect to Database.....".mysql_error());

?>