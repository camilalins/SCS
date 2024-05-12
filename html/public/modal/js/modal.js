$(document).ready(function(){
    // Função para abrir o modal ao clicar no botão de cadastro
    $('.open-modal').click(function(){
        var targetModalId = $(this).data('target'); // Obtenha o ID do modal alvo
        $('#' + targetModalId).modal('show'); // Mostre o modal
    });

    // Função para fechar o modal ao clicar no botão de fechar ou fora da área do modal
    $('.modal').on('click', function(e) {
        if ($(e.target).hasClass('modal') || $(e.target).hasClass('close')) {
            $(this).modal('hide');
        }
    });

    // Aqui você pode adicionar o código JavaScript para lidar com o envio do formulário de cadastro de cliente
    $('.modal form').submit(function(e){
        e.preventDefault();
        // Adicione aqui a lógica para enviar os dados do formulário para o servidor
        // Você pode usar AJAX para isso
    });

    // Adicione o botão para alternar entre os formulários
    $('#alternarForm').click(function(){
        $('.modal-body .form-group').toggle(); // Alternar visibilidade dos formulários
    });
});