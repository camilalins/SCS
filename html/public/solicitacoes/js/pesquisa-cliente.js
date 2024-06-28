
var tbody = document.querySelector("#tb-clientes tbody");

var formPesquisa = document.getElementById("form-pesquisa");
var scriptPesquisa = document.getElementById("script-pesquisa");
var { uri, err001 } = b64JsonDecode( scriptPesquisa.getAttribute("encdata") );

formPesquisa.addEventListener("submit", async (e) => {
    e.preventDefault();

    try {

        const form = e.target;
        const formData = new FormData(form)
        const { nome, cnpj, email } = Object.fromEntries(formData);
        const queryString = new URLSearchParams(formData).toString();
        const endpoint = `${uri}?${queryString}`

        if(!nome && !cnpj && !email) throw Error(err001)

        const res = await fetch(endpoint)

        if(!res.ok) {
            const { message } = await res.json()
            throw Error(message);
        }

        const clientes = await res.json()
        carregar(clientes)
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

function carregar(clientes){

    try {

        if(clientes.length == 0) throw Error(err002);

        clear();
        clientes.forEach((e) => {

            tbody.innerHTML +=
                `<tr key="${e.id}">
                     <td><a href="/solicitacoes/form/${e.id}"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></td>
                     <td>${e.nome}</td>
                     <td>${e.cnpj}</td>
                     <td>${e.responsavel | ""}</td>
                     <td>${e.telefone | ""}</td>
                     <td>${e.email | ""}</td>
                </tr>`;
        })
    }
    catch (e) {
        notificar(e.message);
    }

}

function clear() { tbody.innerHTML = ""; }
