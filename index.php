<?php 

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$diretorioArquivo = 'public/view/tela_login.php';
header("Location: http://$host$uri/$diretorioArquivo");
exit;

?>