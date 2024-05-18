document.getElementById('recover-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var btnEntrar = document.getElementById('btn-entrar');
    var loadingSpinner = document.getElementById('loading-spinner');
    var form = document.getElementById('recover-form');
    var formData = new FormData(form);

    btnEntrar.disabled = true;
    loadingSpinner.style.display = 'inline-block';

    fetch(form.action, {
        method: form.method,
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            btnEntrar.disabled = false;
            loadingSpinner.style.display = 'none';

            // Atualize a mensagem de erro ou sucesso
            var messageDiv = document.querySelector('.error, .success');
            if (data.error) {
                messageDiv.className = 'error';
                messageDiv.textContent = data.error;
            } else {
                messageDiv.className = 'success';
                messageDiv.textContent = data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            btnEntrar.disabled = false;
            loadingSpinner.style.display = 'none';

            // Mostre uma mensagem de erro genérica
            var messageDiv = document.querySelector('.error, .success');
            messageDiv.className = 'error';
            messageDiv.textContent = 'Ocorreu um erro. Tente novamente mais tarde.';
        });
});