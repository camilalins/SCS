function carregarFormulario() {
    try {
        const clienteArquivos = {
            mondelez: "../../views/solicitacoes/formulario-clientes/mondelez.php",
            troca: "../../views/solicitacoes/formulario-clientes/troca.php",
            mobile: "../../views/solicitacoes/formulario-clientes/troca.php"
        };

        const clienteSelecionado = document.getElementById("cliente").value;
        const formularioDiv = document.getElementById("formulario");

        if (!clienteArquivos[clienteSelecionado]) {
            throw new Error("Cliente inválido.");
        }

        formularioDiv.innerHTML = clienteArquivos[clienteSelecionado] ?
            `<object type="text/php" data="${clienteArquivos[clienteSelecionado]}" width="100%" height="500"></object>` :
            '';
    } catch (error) {
        console.error("Erro ao carregar o formulário:", error.message);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Adicionar evento de clique ao botão de adicionar agentes na aba 4
    document.getElementById("addAgente4").addEventListener("click", function() {
        var select = document.getElementById("agentes4");
        var numOptions = select.options.length;
        if (numOptions < 3) {
            var nextAgent = numOptions + 1;
            var newOption = document.createElement("option");
            newOption.value = nextAgent;
            newOption.text = "Agente " + nextAgent;
            select.add(newOption);
        } else {
            alert("Você já adicionou o número máximo de agentes.");
        }

        // Chamar a função carregarFormulario() toda vez que um agente for adicionado
        carregarFormulario();
    });
});
