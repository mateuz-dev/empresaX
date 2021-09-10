function showModal(){
    document.querySelector("#modalContainer").style.display = "flex";
    document.querySelector("#adicionarFuncionarioTela").style.display = "flex";
}

function closeModal(){
    document.querySelector("#modalContainer").style.display = "none";
    document.querySelector("#adicionarFuncionarioTela").style.display = "none";
}

function deletar($idFuncionario){
    // pedido de confirmação
    let confirmacao = confirm("Vocè tem certeza que quer deletar esse Funcionário");

    // se sim, redirecionar para "acaoDeletar" com o id de parâmetro
    if(confirmacao){
        window.location = "./acaoDeletar.php?id=" + $idFuncionario;
    }
}