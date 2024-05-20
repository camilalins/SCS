$(document).ready(function() {
    // Função para abrir o modal ao clicar no botão de cadastro
    $('.open-modal').click(function() {
        var targetModalId = $(this).data('target'); // Obtenha o ID do modal alvo
        $('#' + targetModalId).modal('show'); // Mostre o modal
    });

    // Função para fechar o modal ao clicar no botão de fechar ou fora da área do modal
    $('.modal').on('click', function(e) {
        if ($(e.target).hasClass('modal') || $(e.target).hasClass('close')) {
            $(this).modal('hide');
        }
    });


});