<?php
    include 'conexao.php';

    $descricao = $_POST["txt_descricao"];
    $categoria = $_POST["txt_categoria"];
    $compra = $_POST["txt_compra"];
    $venda = $_POST["txt_venda"];
    $estoque = $_POST["txt_estoque"];

    if (($descricao == "") || ($categoria == "") ||
        ($compra == "") || ($venda == "") || ($estoque == "")) {

        echo "Campos vazios, preencha todos os campos!";
        exit;
    }

    $sql = mysql_query("SELECT * FROM tb_produtos
                        WHERE descricao = '$descricao'
                        OR categoria = '$categoria'");

    if (!$sql) {
        die("Erro na consulta: " . mysql_error());
    }

    if (mysql_num_rows($sql) > 0) {

        echo "<center>";
        echo "<hr>";
        echo "DADOS IDENTICOS!!!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"controle_produtos.html\">CADASTRAR NOVAMENTE</a>";

    } else {

        $sql = mysql_query("INSERT INTO tb_produtos
                            (descricao,categoria,compra,venda,estoque)
                            VALUES ('$descricao','$categoria','$compra','$venda','$estoque')");

        if ($sql) {
            echo "<center>";
            echo "<hr>";
            echo "PRODUTO CADASTRADO!!!";
            echo "<hr>";
            echo "<br>";
            echo "<a href=\"controle_produtos.html\">CADASTRAR NOVAMENTE</a>";
        } else {
            echo "Erro ao cadastrar produto: " . mysql_error();
        }
    }
?>
