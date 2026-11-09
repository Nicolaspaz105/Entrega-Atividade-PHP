<?php
    include 'conexao.php';

    $usuario = $_POST ["txt_usuario"];
    $email = $_POST ["txt_email"];
    $senha = $_POST ["txt_senha"];
    $rsenha = $_POST ["txt_rsenha"];

    if ($senha !== $rsenha) {
        echo "Senhas nao conferem!";
        return;
    }

    $sql =mysql_query ("SELECT * FROM tb_contas
                        WHERE usuario = '$usuario' or email='$email'");

    if (mysql_num_rows ($sql) > 0) {
        echo "<center>";
        echo "<hr>";
        echo "CONTA EXISTENTE!!!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"cadastro_contas.html\">RETORNAR AO LOGIN </a>";
    }
    else {
        $sql =mysql_query ("INSERT INTO tb_contas (usuario, email, senha)
                            VALUES ('$usuario', '$email', '$senha')");

        echo "<center>";
        echo "<hr>";
        echo "CONTA CRIADA COM SUCESSO!!!";
        echo "<hr>";
        echo "<br>";
        echo "<a href=\"cadastro_contas.html\">RETORNAR AO LOGIN </a>";
    }




?>