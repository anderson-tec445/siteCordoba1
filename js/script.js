window.addEventListener('scroll', function(){
    var header = document.querySelector('header');
    header.classList.toggle('sticky', window.scroll >0);
})


function toggleMenu(){
    var menuToggle = document.querySelector('.toggle');
    var menu = document.querySelector('.menu');
    menuToggle.classList.toggle('active');
    menu.classList.toggle('active');
}

function editarCarac(){
    var modalCarac = document.querySelector('#modal_carac');
    // var menu = document.querySelector('.menu');
    modalCarac.classList.toggle('active');
    // menu.classList.toggle('active');
}

function toggleModalNews(){
    var modalnewsToggle = document.querySelector('#modal_news');
    modalnewsToggle.classList.toggle('active');
}

function toggleModalLogin(){
    var modalLoginToggle = document.querySelector('#modal_login');
    modalLoginToggle.classList.toggle('active');

    var registroToggle = document.querySelector('.modal-registro');
    var modalPrincipalToggle = document.querySelector('.modal-login-principal');
    var loginToggle = document.querySelector('.modal-login');
    registroToggle.classList.remove('active');
    modalPrincipalToggle.classList.remove('active');
    loginToggle.classList.remove('active');

    
}

function toggleRegistro(){
    var registroToggle = document.querySelector('.modal-registro');
    registroToggle.classList.toggle('active');
    var modalPrincipalToggle = document.querySelector('.modal-login-principal');
    modalPrincipalToggle.classList.toggle('active');
}

function toggleLogin(){
    var loginToggle = document.querySelector('.modal-login');
    loginToggle.classList.toggle('active');
    var modalPrincipalToggle = document.querySelector('.modal-login-principal');
    modalPrincipalToggle.classList.toggle('active');
}

function toggleCarrinho(){
    var carrinhoToggle = document.querySelector('#modal_carrinho');
    carrinhoToggle.classList.toggle('active');
}

function toggleCookie(){
    var CookieToggle = document.querySelector('#cookie');
    CookieToggle.classList.toggle('active');
}
