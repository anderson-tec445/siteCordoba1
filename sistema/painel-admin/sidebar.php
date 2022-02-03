        <div class="navigation">
            <ul>
                <li>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <img src="../img-sistema/icons/icon-cesto.png" alt="">
                    <span>Inicio</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="index.php?pag=<?php echo $menu1 ?>">Produtos</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu2 ?>">Categorias</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu3 ?>">Sub Categorias</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu9 ?>">Tipo Envios</a>
                        <a class="collapse-item" href="index.php?pag=<?php echo $menu10 ?>">Características</a>
                    </div>
                </div>
                </li>
                <li>
                    <a href="product.php">
                        <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                        <span class="title">Comprar</span>
                    </a>
                </li>
                <li>
                    <a href="list_buy.php">
                        <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="title">Lista de compras</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
