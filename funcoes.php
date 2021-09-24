<?php


    // FUNÇÕES LOGIN:

    function realizarLogin($usuario, $senha, $dados){
        foreach($dados as $dado){
            if($dado->usuario == $usuario && $dado->senha == $senha){
                $_SESSION["usuario"] = $dado->usuario;           
                $_SESSION["id"] = session_id();
                $_SESSION["data_hora"] = date("d/m/Y - h:i:s");
                header("location: tabela.php");
                exit;
            }
        }
        header("location: index.php");
    }


    function verificarLogin(){
        if($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))){
            header("location: index.php");
        }
    }


    function finalizarLogin(){
        session_unset();
        session_destroy();
        header("location: index.php");
    }

    
    
    /////////////////////////////////////////////////////////////////////////


    // FUNÇÕES TABELA:

    function lerArquivo($nomeArquivo){
        $arquivo = file_get_contents($nomeArquivo);
        $arquivoArr = json_decode($arquivo);
        return $arquivoArr;
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

    
    function editarFuncionario($nomeArquivo, $funcionarioEditado){
        $funcionarios = lerArquivo($nomeArquivo);
        foreach($funcionarios as $chave => $funcionario){
            if($funcionario->id == $funcionarioEditado["id"]){
                $funcionarios[$chave] = $funcionarioEditado;
            }
        }
        $json = json_encode(array_values($funcionarios));
        file_put_contents($nomeArquivo, $json);
    }