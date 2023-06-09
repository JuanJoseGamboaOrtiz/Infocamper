<?php

$variable= json_decode($_GET['cc'],true);
echo $variable;

header('Location: index.php?existe='. urlencode($variable));

?>