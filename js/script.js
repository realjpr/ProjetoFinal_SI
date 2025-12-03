/*Funcionamento do botão do menu*/

const menuButtons = document.querySelectorAll('.menu-btn');
        const mobileMenus = document.querySelectorAll('.mobile-menu');

        menuButtons.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                mobileMenus[index].classList.toggle('hidden');
            });
        });

/****************************************/

/*Funcionamento dos Modais*/

function gerenciarModais() {

    //Evento pra abrir os modais
    document.addEventListener('click', function(evento) {

        if (evento.target.classList.contains('js-abrir-modal')) {
            // Previne a ação padrão (ex: enviar um formulário se for um <button type="submit">)
            evento.preventDefault();

            // Pega o valor do atributo 'data-target'
            const idModal = evento.target.dataset.target;

            // Encontra o modal usando o ID obtido
            const modal = document.querySelector(`#${idModal}`);

            // Se o modal existir, ele abre
            if (modal && modal.tagName === 'DIALOG') {
                modal.showModal();
            }
        }
    });


    // Evento pra fechar os modais
    document.addEventListener('click', function(evento) {
        if (evento.target.classList.contains('js-fechar-modal')) {

            // Previne a ação padrão
            evento.preventDefault();

            // Encontrando o <dialog> mais próximo
            const modal = evento.target.closest('dialog');

            // Se encontrar um modal, ele fecha
            if (modal) {
                modal.close();
            }
        }
    });
}

gerenciarModais();

/****************************************/

// Funcionamento da página de login

const loginBtn = document.getElementById('loginButton');

loginBtn.addEventListener('click', function(event) {
    event.preventDefault();
    const inputEmail = document.getElementById('inputEmail').value;
    const inputSenha = document.getElementById('inputSenha').value;

    if (inputEmail === 'charlesSI@gmail.com' && inputSenha === 'charles123') {
        window.location.href = './pages/pedidos.php';
        clg
    } else {
        alert('Email ou senha incorretos. Tente novamente.');
    }

})