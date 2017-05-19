<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>CONTROLE DE USUARIOS</h2><hr>

<a href="index.php">VOLTAR PARA O INICIO</a><br><br>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: © 2017 Antonio Abrantes
 * Date: 16/04/2017
 * Time: 16:49
 */
include("funcoes_bd.php");

if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] = true){

    $sql = "DELETE FROM USUARIOS WHERE ID = ".$_REQUEST["id"];

    $conexao = conectarBanco();

    $rs = mysql_query($sql, $conexao);
    $rs = mysql_query("SELECT * FROM USUARIOS", $conexao);
    listar_usuarios($rs);
    mysql_close($conexao);
}
?>