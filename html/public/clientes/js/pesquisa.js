
const tbody = document.querySelector("#tb-clientes tbody");

onsubmit = (e) => {
    e.preventDefault();

    const script = document.getElementById("script-pesquisa");
    const uri = script.getAttribute("uri");

    clear();

    fetch(uri, {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Object.fromEntries(new FormData(e.target)))
    })
    .then(res => { if(!res.ok) throw res; return res.json(); })
    .then(data => done(data))
    .catch(ex => ex.text())
    .then(err => { if(err) console.warn(err); })
}

function done(eventos){ console.log(eventos);

    eventos.forEach((e) => {
        console.log(e);
        tbody.innerHTML +=
        `<tr>
             <td>${e.id}</td>
             <td>${e.nome}</td>
             <td>${e.cnpj}</td>
             <td>${e.responsavel?e.responsavel:""}</td>
             <td>${e.telefone?e.telefone:""}</td>
             <td>${e.email?e.email:""}</td>
        </tr>`;
    })
}

function clear() { tbody.innerHTML = ""; }