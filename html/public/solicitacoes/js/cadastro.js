
const formCadastro = document.getElementById("form-cadastro");
const scriptCadastro = document.getElementById("script-cadastro");
const { uri, errValid001, errEnt001 } = b64JsonDecode( scriptCadastro.getAttribute("encdata") );

let animTimer;
$(".alert .btn-close").on("click",() => fecharNotificacao());

window.addEventListener("modalSubmit", (e) => formCadastroSubmit(e), { once: true });
formCadastro.addEventListener("submit", (e) => formCadastroSubmit(e), { once: true });

const formCadastroSubmit = async (e) => {

    try {

        const formData = new FormData(formCadastro)
        const { clienteId, data, placa, status } = Object.fromEntries(formData); console.log(Object.fromEntries(formData))

        if(!clienteId || !data || !placa || !status ) throw Error(errValid001)

        const res = await fetch(uri, {
            method: "POST",
            body: formData
        })

        if (!res.ok) {
            const {message} = await res.json();
            throw Error(message);
        }

        const solicitacao = await res.json();
        if(!solicitacao) throw Error(errEnt001)

        fechar()
    }
    catch (e) {
        notificar(e.message);
    }
    return false;
}

function fechar(){
    const $modal = $('#modal').length != 0 ? $('#modal') : window.parent.$('#modal');
    $modal.modal('hide');
}

function notificar(mensagem){

    $(".alert span").html(mensagem);
    $(".alert").fadeIn("fast", () => {
        animTimer = setTimeout(() => $(".alert").fadeOut("fast"), 3000)
    })
}

function fecharNotificacao(){

    clearTimeout(animTimer);
    $(".alert").slideUp("fast");
}

$("[type=submit]").on("click", (e) => console.log(typeof e));