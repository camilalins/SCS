function carregarFormulario() {
    var clienteSelecionado = $('#cliente').val();
    if (clienteSelecionado) {
        $.ajax({
            url: '../views/solicitacoes/formulario-clientes/' + encodeURIComponent(clienteSelecionado) + '.php',
            type: 'GET',
            success: function(response) {
                console.log(response); // Para depuração: verifica o que está sendo retornado
                $('#formulario').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Erro ao carregar formulário:', error);
                $('#formulario').html('<p>Erro ao carregar o formulário.</p>');
            }
        });
    } else {
        $('#formulario').html('');
    }
}

$(document).ready(function() {
    $('#cliente').on('change', function() {
        carregarFormulario();
    });
});
