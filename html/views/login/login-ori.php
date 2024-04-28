
<?php include "../_includes/top.php" ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <img src="../../public/img/logoSolicitacao.png" alt="Sistema de Controle de Solicitações" width="250" height="50">
                        </div>
                        <div class="card-body">
                            <form method="post" action="../../login/login-controller.php">

                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="togglePassword"><i class="far fa-eye"></i></span>
                                        </div>
                                    </div>
                                    <!-- Se houver um erro, exibe a mensagem -->
                                    <div class="error"><?=$erro?></div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                <a href="../../views/login/esqueceu-senha.php" id="forgotPasswordLink" class="float-right">Esqueci minha senha</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "../_includes/bottom.php" ?>
