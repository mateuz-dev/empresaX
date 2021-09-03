<?php
    require("./funcoes.php");
    $funcionarios = lerArquivo("./empresaX.json");
    if(isset($_GET["inputPesquisarFuncionario"])){
        $funcionarios = pesquisarFuncionario($funcionarios, $_GET["inputPesquisarFuncionario"], $_GET["filtroPesquisa"]);
    }
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRESA X | Funcionários</title>
</head>

<body>
    <h1>Funcionários da EMPRESA X</h1>
    <p>A empresa conta com 1001 funcoinários</p>

    <form>
        <div id="divTop">
            <label for="inputPesquisarFuncionario">
                Pesquisar por <select name="filtroPesquisa" id="filtroPesquisa">
                    <option value="nome">NOME</option>
                    <option value="sobrenome">SOBRENOME</option>
                    <option value="id">ID</option>
                    <option value="pais">PAÍS</option>
                    <option value="departamento">DEPARTAMENTO</option>
                </select>
            </label>
        </div>
        <div id="divBottom">
            <input type="text" name="inputPesquisarFuncionario" id="inputPesquisarFuncionario" placeholder="Digite o nome">
            <button>Pesquisar</button>
        </div>
    </form>

<!--    <div id="adicionarDeletar">
        <button> <img src="img/iconeAdicionar.png"> ADICIONAR FUNCIONÁRIO</button>
        <button> <img src="img/iconeDeletar.png"> APAGAR FUNCIONÁRIO</button>
    </div> -->

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
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>



<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1{
        margin-top: 25px;
    }
    p{
        font-size: 16px;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    form div{
        width: 100%;
    }
    form label{
        text-align: start;
        font-size: 10px;
    }
    form input{
        border: none;
        border-bottom: 1px solid black;
        padding-left: 3px;
        outline: none;
    }
    table{
        font-size: 14px;
        text-align: center;
        border-collapse: collapse;
    }
    table td, th{
        border: 1px solid black;
        padding: 4px;
    }
</style>