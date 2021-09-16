<?php
    function lerArquivo($nomeArquivo){
        $nomeArquivo = file_get_contents("./empresaX.json");
        $jsonArray = json_decode($nomeArquivo);
        return $jsonArray;
    }

    function pesquisarFuncionario($funcionarios, $pesquisa, $filtro){
        $funcionariosFiltro = [];
        foreach($funcionarios as $funcionario){
            if(strpos($funcionario->$filtro, $pesquisa) !== false){
                $funcionariosFiltro[] = $funcionario;
            }
        }
        return $funcionariosFiltro;
    }

    function adicionarFuncionario($nomeArquivo, $novoFuncionario){
        $funcionarios = lerArquivo($nomeArquivo);
        $funcionarios[] = $novoFuncionario;
        $json = json_encode($funcionarios);
        file_put_contents($nomeArquivo, $json);
    }

    function deletarFuncionario($nomeArquivo, $idFuncionario){
        $funcionarios = lerArquivo($nomeArquivo);
        foreach ($funcionarios as $chave => $funcionario){
            if ($funcionario->id == $idFuncionario){
                unset ($funcionarios[$chave]);
            }
        }
        $json = json_encode(array_values($funcionarios));
        file_put_contents($nomeArquivo, $json);
    }

    function buscarFuncionarioPorId($nomeArquivo, $idFuncionario){
        $funcionarios = lerArquivo($nomeArquivo);
        foreach ($funcionarios as $funcionario){
            if($funcionario->id == $idFuncionario){
                return $funcionario;
            }
        }
        return false;
    }