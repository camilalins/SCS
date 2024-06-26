<body class="home-1 vsc-initialized" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0" cz-shortcut-listen="true">

    <!-- única section  -->
    <section class="container home py-1">
        <div id="particles-js"><canvas class="particles-js-canvas-el" width="1519" height="227" style="width: 100%; height: 100%;"></canvas></div>
        <div class="container">
            <div class="row">
                <div class="nav">
                    <h3 class="text-left display-5">Olá <span class="unique-text"><?=user()->getNome()?></span>!</h3>
                </div>
                <div class="row gy-4 gx-4 ">
                    <!-- service number 1 -->
                    <a href="/clientes" class="p-3 col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
                        <div>
                            <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">

                                <h2 class="title-2 my-2 ">Clientes</h2>
                                <p>Mantenha os clientes atualizados.</p>
                                <b class="my-2 learn-more">cadastrar Cliente <i class="fa-solid fa-angle-right fs-5 px-2"></i></b>
                            </div>
                        </div>
                    </a>
                    <!-- service number 2 -->
                    <a href="/relatorios" class="p-3 col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
                        <div>
                            <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">

                                <h2 class="title-2 my-2 ">Relatórios</h2>
                                <p>Acompanhe suas KPI's.</p>
                                <b class="my-2 learn-more">Acessar <i class="fa-solid fa-angle-right fs-5 px-2"></i></b>
                            </div>
                        </div>
                    </a>
                    <!-- service number 3 -->
                    <a href="/solicitacoes" class="p-3  col-md-6 col-12 col-lg-4 mx-auto" data-aos="fade-down" data-aos-delay="200" >
                        <div>
                            <div class="box box-service box-hover aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">

                                <h2 class="title-2 my-2 ">Solicitações</h2>
                                <p>Cadastre todas as solicitações.</p>
                                <b class="my-2 learn-more">cadastrar Solicitação<i class="fa-solid fa-angle-right fs-5 px-2"></i></b>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./única section -->

    <?php scripts([
            "/public/js/particles.min.js",
            "/public/home/js/home.js"
    ]);?>

</body>