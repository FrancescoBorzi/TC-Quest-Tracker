<?php

# Connection to the world database (address, username, password, database)
$db = new mysqli("localhost","root","password","world");

if (mysqli_connect_error())
  die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());

?>
