<?php

$variable= json_decode($_GET['id'],true);
echo $variable;

header('Location: index.php?existe='. urlencode($variable));

?>