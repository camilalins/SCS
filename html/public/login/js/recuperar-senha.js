
const formRecup = document.getElementById("form-recup");
const scriptRecup = document.getElementById("script-recup");
const { uri, err001 } = b64JsonDecode( scriptRecup.getAttribute("encdata"));

const btnRecuperar = document.getElementById('btn-recuperar');
const loadingSpinner = document.getElementById('loading-spinner');
const divMessage = document.getElementById("message");

formRecup.addEventListener("submit",  async (e) => {

    e.preventDefault();
    try {
        const form = e.target;
        const formData = new FormData(form)
        const { email } = Object.fromEntries(formData);

        if(!email) throw Error(err001)

        loader(true);

        const res = await fetch(uri, {
            method: form.method,
            body: formData,
        })

        if(!res.ok) {
            const { message } = await res.json();
            throw Error(message);
        }

        const { message } = await res.json();
        done('success', message)
    }
    catch (e) {
        done('error', e.message)
    }
});

function done(className, message) {

    loader(false);

    divMessage.className = className;
    divMessage.textContent = message;
}
function loader(start){

    btnRecuperar.disabled = start;
    loadingSpinner.style.display = start ? 'inline-block' : 'none';
}