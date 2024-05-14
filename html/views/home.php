
<section class="container py-5" id="container-home">
    <div class="heading">
        <h1 class="title col-lg-10 col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
           Olá, <?=user()->getNome()?>!
        </h1>
    </div>
        <br>
    <div class="row gy-4 gx-4 ">
        <!-- service number 1 -->
        <a href="/clientes" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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
        <a href="/relatorios" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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
        <a href="/solicitacoes" class="col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
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

<?php scripts([ "/public/home/js/home.js" ]);?>