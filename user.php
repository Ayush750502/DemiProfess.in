<?php
$user_details = simplexml_load_file("userDetails.xml") or die("Error : fail to load xml file");
$user = $user_details->children();
echo "username: '$user->name'<br>email: '$user->email'";
?>