<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Controle de Solicitações ">
    <!-- fav icon -->
    <link rel="icon" href="/public/img/icon.ico">
    <script src="https://kit.fontawesome.com/eaf468bfde.js" crossorigin="anonymous"></script>

    <!-- bootstarp css file -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- aos.css file -->
    <link rel="stylesheet" href="/public/css/aos.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="/public/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/bootstrap-icons(1).css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <!-- main css file -->
    <link rel="stylesheet" href="/public/css/style.css">
    <title> Sistema de Cadastro de Cliente - Página Inicial </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">


<!-- ======= start Header ======= -->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand " href="#"><img style="width: 200px;" src="/public/img/logo-gray.png" alt="SCS"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list" id="menu"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                <div class="d-flex ms-auto">
                    <a class="btn" href="#">Dashboard</a>
                    <button id="mode-toggle" class="btn-light-mode switch-button"><i class="fa-solid fa-circle-half-stroke"></i></button>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ======= end Header ======= -->

<!-- ============== Start services section ========== -->
<section class="container services py-5" id="services">
    <div class="heading">

        <h1 class="title col-lg-10 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            Olá, Fulano!
        </h1>
        <p class="col-lg-7 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            Essas são as últimas atualizações do seu Controle.
        </p>
    </div>
    <div class="row gy-4 gx-4 ">
        <!-- service number 1 -->
        <a href="/public/cliente/pagina-criar-cliente.html" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
            <div>
                <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">
                    <div class="box-icon my-2">
                        <i class="fa-solid fa-truck-front"></i>
                    </div>
                    <h2 class="title-2 my-2 ">Clientes</h2>
                    <p>Mantenha os clientes atualizados.</p>
                    <b class="my-2 learn-more">cadastrar Cliente <i class="fa-solid fa-angle-right"></i></b>
                </div>
            </div>
        </a>
        <!-- service number 2 -->
        <a href="/public/relatorio/pagina-relatorio.html" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
            <div>
                <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">
                    <div class="box-icon my-2">
                        <i class="fa-solid fa-clipboard"></i>
                    </div>
                    <h2 class="title-2 my-2 ">Relatórios</h2>
                    <p>Acompanhe suas KPI's.</p>
                    <b class="my-2 learn-more">Acessar <i class="fa-solid fa-angle-right"></i></b>
                </div>
            </div>
        </a>
        <!-- service number 3 -->
        <a href="/public/solicitacao/pagina-criar-solicitacao.html" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
            <div>
                <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">
                    <div class="box-icon my-2">
                        <i class="fa-solid fa-motorcycle"></i>
                    </div>
                    <h2 class="title-2 my-2 ">Solicitações</h2>
                    <p>Cadastre todas as solicitações.</p>
                    <b class="my-2 learn-more">cadastrar Solicitação<i class="fa-solid fa-angle-right"></i></b>
                </div>
            </div>
        </a>
    </div>
</section>
<!-- ============== End services section ========== -->

<!-- ============== Start Why us section ========== -->
<section class="container why-choose-us py-5">
    <div class="heading">
        <h4 class="pretitle aos-init" data-aos="fade-up">
            Últimas solicitações
        </h4>
        <p class="col-lg-7 col-12 aos-init" data-aos="fade-up" data-aos-delay="150">
            Explore nossa tabela em tempo real com as últimas solicitações cadastradas.
        </p>
        <div class="row  gy-4 gx-4" data-aos="fade-up" data-aos-delay="150">
            <br><br>
        </div>







        <div class="container-fluid">
            <div class="row">
                <div class="card">

                    <div class="card-header border-transparent">
                        <!-- Menu -->
                        <div class="menu">
                            <div class="btn-tool" style="display: flex;">
                                <h3 class="card-title">Latest Orders</h3>
                            </div>
                            <div class="btn-tool" style="display: flex;">
                                <form class="form-inline my-2 my-lg-0">
                                    <button class="btn my-2 my-sm-0" type="button" id="searchButton"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- Pop-up de Filtro -->
                        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="filterModalLabel">Filtrar Solicitações</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Adicione seus filtros aqui -->
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Filtrar por Cliente</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nome do Cliente">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Filtrar por Data</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput2">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Filtrar por Status</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Aguardando</option>
                                                <option>Finalizada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-mode">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Data de Início</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Cliente A</td>
                                        <td>01/04/2024</td>
                                        <td><span class="bg-yellow">Aguardando</span></td>
                                        <td>
                                            <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Cliente B</td>
                                        <td>05/04/2024</td>
                                        <td><span class="bg-green">Finalizada</span></td>
                                        <td>
                                            <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cliente C </td>
                                        <td>05/04/2024</td>
                                        <td><span class="bg-red">Cancelada</span></td>
                                        <td>
                                            <button class="action-edit" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="action-cancel" type="button"><i class="fa-solid fa-xmark"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============== End Why us section ========== -->


<!-- ============== end Footer section ========== -->

<!--  JQuery file     -->
<script src="/public/js/jquery-3.6.1.min.js.download"></script>

<!-- bootstrap min js -->
<script src="/public/js/bootstrap.min.js.download"></script>

<!--  owl carousel    -->
<script src="/public/js/owl.carousel.min.js.download"></script>

<!-- aos file    -->
<script src="/public/js/aos.js.download"></script>

<!-- gsap file    -->
<script src="/public/js/gsap.min.js.download"></script>

<!--  main js file  -->
<script src="/public/js/main.js.download"></script>
<!-- Inclua o Bootstrap JS (opcional, mas necessário para alguns componentes interativos) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(document).ready(function(){
        $('#searchButton').click(function(){
            $('#filterModal').modal('show');
        });
    });
</script>

</body>
