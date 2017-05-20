<?php
/**
 * Created by PhpStorm.
 * User: Antonio Abrantes
 * Date: 19/05/2017
 * Time: 10:19
 *
 * OBS: As funções utilizadas correspondem ao PHP 5.6, o mesmo apresentado nas video-aulas
 */

function conectarBanco(){
    $conexao = mysql_connect("localhost", "root", "");
    //mysql_select_db("php_dados", $conexao);
    mysql_select_db("dados", $conexao);

    return $conexao;
}

function listarDados(){
    $conexao = conectarBanco();

    $rs = mysql_query("SELECT * FROM USUARIOS_v2", $conexao);
    listar_usuarios($rs);
    mysql_close($conexao);
}

function listar_usuarios($resultado){
    echo "<table id='listagem' >";

    if(mysql_num_rows($resultado) > 0){

        echo "<tr class='filds' ><td>ID</td><td>NOME</td><td>SEXO</td><td>IMAGEM</td><td>ACAO</td></tr>"; //Cabeçalho da tabela

        while($registro = mysql_fetch_array($resultado)){
            echo "<tr>";
                echo "<td>".$registro["ID"]."</td>";
                echo "<td>".$registro["NOME"]."</td>";
                echo "<td>".$registro["SEXO"]."</td>";
            echo "<td><a href='".$registro["IMAGEM"]."' target='_black'><img width='20' src='".$registro["IMAGEM"]."'></a></td>";
                echo "<td class='excluir' ><a href='excluir_itens.php?excluir=true&id=".$registro["ID"]."'>EXCLUIR</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo '<h3 class="atencao">Sem registros no banco de dados</h3>';
    }
}

function validarEnvioImagem(){

    $nome_arq = $_FILES["arquivo"]["name"];

    // Verifica se o caminho da imagem esta setado...
    if(strlen($nome_arq) <= 0){
        die("<h3 class='atencao'>Sem arquivo para enviar</h3>");
        return false;
    }

    // Verifica se deu mais algum tipo de erro...
    if ($_FILES['arquivo']['error'] != 0) {
        die("<h3 class='atencao'>Nao foi possivel fazer o upload</h3>");
        return false;
    }

    if(($_FILES['arquivo']['type'] == "image/jpeg") || ($_FILES['arquivo']['type'] == "image/jpg")
        && ($_FILES['arquivo']['size'] <= 10000)){

        return true;
    }else{
        return false;
    }
}

?>