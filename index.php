<?php

require_once ('connection.php');
include ('Prefix.php');

//$prefix = Prefix::getDestination("0110000");
$prefix = Prefix::changeDestination('0111234500');
echo $prefix;
