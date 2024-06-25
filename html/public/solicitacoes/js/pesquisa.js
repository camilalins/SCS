
var tbody = document.querySelector("#tb-solicitacoes tbody");

var formPesquisa = document.getElementById("form-pesquisa");
var scriptPesquisa = document.getElementById("script-pesquisa");
var { uri } = b64JsonDecode( scriptPesquisa.getAttribute("encdata") );

formPesquisa.addEventListener("submit", async (e) => {
    e.preventDefault();

    try {

        const form = e.target;
        const formData = new FormData(form)
        const { data, cliente, placa } = Object.fromEntries(formData);
        const queryString = new URLSearchParams(formData).toString();
        const endpoint = `${uri}?${queryString}`

        if(!data && !cliente && !placa) throw Error("Informe ao menos um filtro para pesquisar")

        const res = await fetch(endpoint)

        if(!res.ok) {
            const { message } = await res.json()
            throw Error(message);
        }

        const solicitacoes = await res.json()
        carregar(solicitacoes)
    }
    catch(e){
        notificar(e.message);
    }
});

function notificar(mensagem){
    clear();
    tbody.innerHTML +=
        `<tr>
             <td colspan="6" style="text-align: center; color: darkred;">${mensagem}</td>
        </tr>`;
}

function carregar(solicitacoes){

    try {

        if(solicitacoes.length == 0) throw Error("Nenhum registro encontrado");

        clear();
        solicitacoes.forEach((e) => {

            tbody.innerHTML +=
                `<tr key="${e.id}">
                     <td><a href="#"><i class="fa fa-ellipsis-v"></i></a></td>
                     <td>${e.cliente.nome}</td>
                     <td>${e.cliente.cnpj}</td>
                     <td>${e.data.toLocaleDateString()}</td>
                     <td>${e.placa}</td>
                </tr>`;
        })
    }
    catch (e) {
        notificar(e.message);
    }

}

function clear() { tbody.innerHTML = ""; }
