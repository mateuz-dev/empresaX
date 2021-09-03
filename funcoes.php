<?php
    function lerArquivo($nomeArquivo){
        $nomeArquivo = file_get_contents("./empresaX.json");
        $jsonArray = json_decode($nomeArquivo);
        return $jsonArray;
    }

    function pesquisarFuncionario($funcionarios, $nome, $value){
        $funcionariosFiltro = [];

        if($value == "nome"){
            $value = "first_name";
        } else if ($value = "sobrenome"){
            $value = "last_name";
        } else if($value == "id"){
            $value = "id";
        } else if($value == "pais"){
            $value = "country";
        } else{
            $value = "department";
        }

        foreach($funcionarios as $funcionario){
            if ($funcionario->$value == $nome){
                $funcionariosFiltro[] = $funcionario;
            }
        }
        return $funcionariosFiltro;
    }
?>