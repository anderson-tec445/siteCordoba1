<section id="info">
            <div class="container-cordoba">
                <div class="institucional">
                    <h3>Institucional</h3>
                    <ul>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="como-comprar.php">Como comprar</a></li>
                        <li><a href="politica-de-privacidade.php">Política de Privacidade</a></li>
                        <li><a href="politica-de-entrega.php">Política de Entrega</a></li>
                        <li><a href="pagamentos.php">Pagamento</a></li>
                        <li><a href="#">Tempo de Garantia</a></li>
                        <li><a href="#">Depoimentos de Clientes</a></li>
                        <li><a href="fale-conosco.php">Contato</a></li>
                    </ul>
                </div>
                <div class="contato-info">
                    <h3>Contato</h3>
                    <p>Loja física: 08:00 às 11:30h e 13:00 às 18:00h</p>
                    <p> <?php echo $telefone ?> </p>
                    <p><?php echo $email ?></p>
                </div>
                <div class="pagamento">
                    <h3>Pagamento</h3>
                    <div class="avista">
                        <p>À VISTA</p>
                        <img src="img/icone-pagamentos-avista 1.png" alt="">
                    </div>
                    <div class="prazo">
                        <p>A PRAZO</p>
                        <img src="img/icon-pagamentos-cartao 1.svg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
<footer>
        <div class="container">
            <div class="social">
                <a href="#"><img src="img/icons/instagram.png" alt=""></a>
                <a href="#"><img src="img/icons/facebook.png" alt=""></a>
            </div>
            <div class="footer-text">
                <p>
                    © Copyright 2021 Cordoba. CNPJ: Nº 00.000.000/0001-88. <?php echo $endereco_loja ?>.
                </p>
                <p>
                    Todos os preços e condições deste site são válidos apenas para compras no site. Destacamos que os preços
                    previstos no site prevalecem aos demais
                    anunciados em outros meios de comunicação e sites de buscas. Em caso de divergência, o preço válido é do
                    carrinho de compras. Imagens meramente ilustrativas.
                </p>
            </div>
            <div class="footer-logo">
            <a href="./index.php"><img src="img/cordoba-logo-branco.png" alt=""></a>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/script-slide.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script src="js/mascara.js"></script>

    <!-- Initialize Swiper -->
    <!-- banner principal -->
 </body>

</html>

    <script>
        var swiper = new Swiper(".mySwiper", {
            
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
            },
        });

        var swiper = new Swiper(".myProducts", {
            slidesPerView: "auto",
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".myProductSlide", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            thumbs: {
            swiper: swiper,
            },
        });
    </script>

