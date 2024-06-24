const modal = document.getElementById('modal')

modal.addEventListener('shown.bs.modal', (e) => {

    const button = e.relatedTarget
    const title = button.getAttribute('data-bs-title')
    const route = button.getAttribute('data-bs-route')

    if(!route || !title) return;

    const modalTitle = modal.querySelector('.modal-title')
    const modalBodyIframe = modal.querySelector('.modal-body iframe')
    const modalSubmit = modal.querySelector('.modal-footer [type=submit]')

    modalTitle.textContent = title
    modalBodyIframe.setAttribute("src", route)
    modalSubmit.addEventListener("click", (e) => {

        e.preventDefault();

        const modalBodyWindow = modalBodyIframe.contentWindow;
        const modalBodyDocument = modalBodyIframe.contentDocument || modalBodyIframe.contentWindow.document;
        const modalBodyForm = modalBodyDocument.forms[0];

        if (modalBodyForm) modalBodyWindow.dispatchEvent(new CustomEvent("modalSubmit", { detail : modal })) //modalBodyForm.submit();
    })
})

modal.addEventListener('hidden.bs.modal', () => {

})