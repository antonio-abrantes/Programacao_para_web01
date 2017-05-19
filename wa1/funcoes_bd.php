<?php
/**
 * Created by PhpStorm.
 * User: Antonio Abrantes
 * Date: 19/05/2017
 * Time: 10:19
 */

function conectarBanco(){
    $conexao = mysql_connect("localhost", "root", "");
    mysql_select_db("php_dados", $conexao);

    return $conexao;
}


function listarDados(){
    $conexao = conectarBanco();

    $rs = mysql_query("SELECT * FROM USUARIOS", $conexao);
    listar_usuarios($rs);
    mysql_close($conexao);
}

function listar_usuarios($resultado){
    echo "<table border='2'  cellspacing='2' cellpadding='5' >";

    if(mysql_num_rows($resultado) > 0){

        echo "<tr><td>ID</td><td>NOME</td><td>SEXO</td><td>ACAO</td></tr>"; //Cabeçalho da tabela

        while($registro = mysql_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>".$registro["ID"]."</td>";
            echo "<td>".$registro["NOME"]."</td>";
            echo "<td>".$registro["SEXO"]."</td>";
            echo "<td><a href='excluir_itens.php?excluir=true&id=".$registro["ID"]."'>EXCLUIR</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo '<h3>Sem registros no banco de dados</h3>';
    }
}

?>