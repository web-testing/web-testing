<?php

include('config.php');
       
$i=mysql_query("

CREATE TABLE IF NOT EXISTS `achieverList` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `Name` varchar(2000) NOT NULL COMMENT 'achiever name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

");


echo "hi..".$i;

?>
