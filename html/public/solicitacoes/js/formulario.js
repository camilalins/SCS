
    function carregarFormulario() {
    var clienteSelecionado = $('#cliente').val();
    if (clienteSelecionado) {
    $.ajax({
    url: '../../views/solicitacoes/formulario-clientes/' + clienteSelecionado + '.php',
    type: 'GET',
    success: function(response) {
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
