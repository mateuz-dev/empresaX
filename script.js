function showModal(){
    document.querySelector("#modalContainer").style.display = "flex";
    document.querySelector("#adicionarFuncionarioTela").style.display = "flex";
}

function closeModal(){
    document.querySelector("#modalContainer").style.display = "none";
    document.querySelector("#adicionarFuncionarioTela").style.display = "none";
}

// document.getElementById("botaoAdicionarFuncionario").addEventListener('click', showModal());
document.getElementById("buttonCancelar").addEventListener('click', showModal());