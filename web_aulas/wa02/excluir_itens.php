<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programacao para Web I - WA II</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2 id="cabecalho" >CONTROLE DE USUARIOS</h2><hr>

<a class="c_link" href="index.php">VOLTAR PARA O INICIO</a><br><br>

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

    $sql = "DELETE FROM USUARIOS_V2 WHERE ID = ".$_REQUEST["id"];

    $conexao = conectarBanco();

    $resultado = mysql_query($sql, $conexao);
    $resultado = mysql_query("SELECT * FROM USUARIOS_V2", $conexao);

        listar_usuarios($resultado);

    mysql_close($conexao);
}
?>