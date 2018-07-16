<?php 

require_once('top.php');






//logout

$user->logout(); 



//logged in return to index page

header('Location: index.php');

exit;

?>