<?php

    session_start();

    require("./funcoes.php");

    $funcionarios = lerArquivo("./empresaX.json");

    if(isset($_GET["inputPesquisarFuncionario"])){
        $funcionarios = pesquisarFuncionario($funcionarios, $_GET["inputPesquisarFuncionario"], $_GET["filtroPesquisa"], "./empresaX.json");
    }

    verificarLogin();
?>



<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./script.js"></script>
    <title>EMPRESA X | Funcionários</title>
</head>



<body>

    <header>
        <div>
            <p><img src="./img/iconeUsuario.png"> <?=ucfirst($_SESSION["usuario"])?>
            <img src="./img/iconeTempo.png" alt=""><?=$_SESSION["data_hora"]?></p>
        </div>

        <h2><a class="material-icons" href="processa_login.php?logout=true">logout</a></h2>
    </header>

    <div id="modalContainer">
        <div id="adicionarFuncionarioTela">
            <p>Adicionar Funciorário</p>
            <form id="formFuncionarioNovo" action="./acoes.php" method="POST">
                <input type="number" name="id" placeholder="ID">
                <input type="text" name="first_name" placeholder="NOME">
                <input type="text" name="last_name" placeholder="SOBRENOME">
                <input type="text" name="email" placeholder="EMAIL">
                <input type="text" name="gender" placeholder="GÊNERO">
                <input type="text" name="ip_address" placeholder="ENDEREÇO IP">
                <input type="text" name="country" placeholder="COUNTRY">
                <input type="text" name="department" placeholder="DEPARTAMENTO">
                <button>SALVAR</button>
            </form>
            <button id="buttonCancelar" onclick="closeModal()">CANCELAR</button>
        </div>
    </div>



    <h1>Funcionários da EMPRESA X</h1>
    <p>A empresa conta com <em><?=count($funcionarios)?></em> funcoinários</p>
    


    <form id="formPesquisa">
        <div id="divTop">
            <label for="inputPesquisarFuncionario">
                Pesquisar por <select name="filtroPesquisa" id="filtroPesquisa">
                    <option value="first_name">NOME</option>
                    <option value="last_name">SOBRENOME</option>
                    <option value="id">ID</option>
                    <option value="country">PAÍS</option>
                    <option value="department">DEPARTAMENTO</option>
                </select>
            </label>
        </div>
        <div id="divBottom">
            <input type="text" name="inputPesquisarFuncionario" id="inputPesquisarFuncionario" placeholder="Pesquisar...">
            <button> <img src="img/iconePesquisar.png">PESQUISAR</button>
    </form>
    </div>

    <button onclick="showModal()" id="botaoAdicionarFuncionario"> <img src="img/iconeAdicionar.png">ADICIONAR FUNCIONÁRIO</button>





    <div id="conteudo">
        <table>
            <tr>
                <th>ID:</th>
                <th>NOME:</th>
                <th>SOBRENOME:</th>
                <th>E-MAIL:</th>
                <th>SEXO:</th>
                <th>ENDEREÇO IP:</th>
                <th>PAÍS:</th>
                <th>DEPARTAMENTO:</th>
                <th>EDITAR:</th>
                <th>DELETAR:</th>
            </tr>
            <?php
            foreach($funcionarios as $funcionario){
            ?>
            <tr>
                <td> <?=$funcionario->id?> </td>
                <td> <?=$funcionario->first_name?> </td>
                <td> <?=$funcionario->last_name?> </td>
                <td> <?=$funcionario->email?> </td>
                <td> <?=$funcionario->gender?> </td>
                <td> <?=$funcionario->ip_address?> </td>
                <td> <?=$funcionario->country?> </td>
                <td> <?=$funcionario->department?> </td>
                <td> <button onclick="editar(<?= $funcionario->id ?>)" id="botaoEditarFuncionario"><img src="./img/iconeEditar.png" class="iconeTabela"> </button> </td>
                <td> <button onclick="deletar(<?= $funcionario->id ?>)" id="botaoDeletarFuncionario"><img src="./img/iconeDeletar.png" class="iconeTabela"> </button> </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>