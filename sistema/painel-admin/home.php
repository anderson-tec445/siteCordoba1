<div class="cardBox">
        <div class="card" onclick="redirectProduct()">
            <div class="cardName">Comprar</div>
            <div class="iconBox">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>

        <div class="card" onclick="redirectList()">
            <div>
                <div class="cardName">Lista de Compra</div>
                <div class="numbers"><?= $produto ?></div>
            </div>
            <div class="iconBox">
                <i class="fas fa-clipboard-list"></i>
            </div>
        </div>
    </div>
