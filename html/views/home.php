<!DOCTYPE html>

<html lang="en">
<head>

    <title> Sistema de Cadastro de Cliente - Página Inicial </title>
</head>

<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <!-- ============== Start services section ========== -->
    <section class="container services py-5" id="services">
    <div class="heading">

        <h1 class="title col-lg-10 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            Olá, <?=session(USUARIO)->nome?>!
        </h1>
    </div>
        <br>
    <div class="row gy-4 gx-4 ">
        <!-- service number 1 -->
        <a href="../controllers/clientes/CadastrarClienteController.php" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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
        <a href="#" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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
        <a href="#" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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
