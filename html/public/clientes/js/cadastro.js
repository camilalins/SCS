
var formCadastro = document.getElementById("form-cadastro");
var scriptCadastro = document.getElementById("script-cadastro");
var { uri } = b64JsonDecode( scriptCadastro.getAttribute("encdata") );

formCadastro.addEventListener("submit", async (e) => { console.log(e.target);
    e.preventDefault();

    const res = await fetch(uri, {
        method: "POST",
        body: new FormData(e.target)
    })

    if(!res.ok) {
        const { message } = await res.json();
        throw Error(message);
    }

    const cliente = res.json();
    fechar()
});

function fechar(){

    $('.modal').modal('hide');
}