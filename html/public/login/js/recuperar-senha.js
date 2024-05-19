const btnEntrar = document.getElementById('btn-entrar');
const loadingSpinner = document.getElementById('loading-spinner');
const messageDiv = document.querySelector('.error, .success');

self.addEventListener("submit", (event) => {

    event.preventDefault();
    const form = event.target;

    loader(true);

    fetch(form.action, {
        method: form.method,
        body: new FormData(form),
    })
        .then(res => { if(!res.ok) throw Error(); return res; })
        .then(() => done('success', '<?=sys_messages(MSG_RECOV_INFO_A001)?>'))
        .catch(() => done('error', '<?=sys_messages(MSG_RECOV_ERR_A002)?>'));
});

function done(className, message) {

    if(className=="error") console.error(message);

    loader(false);

    messageDiv.className = className;
    messageDiv.textContent = message;
}
function loader(start){

    btnEntrar.disabled = start;
    loadingSpinner.style.display = start ? 'inline-block' : 'none';
}