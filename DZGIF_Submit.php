<?php
echo '<a href="./DZGIF_DeleteFriends.php">Click Here to Delete All Friend</a>';
$token=$_POST['fadillah'];

$file = fopen('DZGIF_Token.txt','w');
               fwrite($file,$token);
               fclose($file);
exit;
?>
