<?php

$idFuncionario = $_GET["id"];

require("./funcoes.php");
deletarFuncionario("./empresaX.json", $idFuncionario);
header("location: index.php");