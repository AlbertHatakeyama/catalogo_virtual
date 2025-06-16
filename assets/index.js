const body = document.body || document.querySelector("body")
//Swiper
const swiper = new Swiper('.swiper-container', {
    direction: 'vertical',
    loop: true,
    autoplay: {
    delay: 4859,
    },
    simulateTouch: true,
    pagination: {
    el: '.swiper-pagination',
    clickable: true,
    bulletClass: 'swiper-pagination-bullet',
    bulletActiveClass: 'swiper-pagination-bullet-active',
    },
    on: {
    slideChange: function () {
        document.querySelector('.swiper-pagination-current').textContent = swiper.realIndex + 1;
    },
    init: function () {
        document.querySelector('.swiper-pagination-total').textContent = this.slides.length - this.loopedSlides * 2;
    }
    }
});


//////// Debounce do Lodash

const debounce = function(func, wait, immediate) {

    let timeout;

    return function(...args) {

      const context = this;

      const later = function () {

        timeout = null;

        if (!immediate) func.apply(context, args);

      };

      const callNow = immediate && !timeout;

      clearTimeout(timeout);

      timeout = setTimeout(later, wait);

      if (callNow) func.apply(context, args);

    };

};



////// MASCARA WHATSAPP

function mascaraTelefone(event) {

    let tecla = event.key;

    let telefone = event.target.value.replace(/\D+/g, "");



    if (/^[0-9]$/i.test(tecla)) {

        telefone = telefone + tecla;

        let tamanho = telefone.length;



        if (tamanho >= 12) {

            return false;

        }

        

        if (tamanho > 10) {

            telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");

        } else if (tamanho > 5) {

            telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");

        } else if (tamanho > 2) {

            telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");

        } else {

            telefone = telefone.replace(/^(\d*)/, "($1");

        }



        event.target.value = telefone;

    }



    if (!["Backspace", "Delete"].includes(tecla)) {

        return false;

    }

}



////// DIGITAÇÃO DA TELA INICIO

class TypeWriter {

    constructor(txtElement, words, wait=3000) {

        this.txtElement = txtElement;

        this.words = words;

        this.txt = "";

        this.wordIndex = 0;

        this.wait = parseInt(wait, 10);

        this.type();

        this.isDeleting = false;

    }

    type() {

        const current = this.wordIndex % this.words.length;

        const fullTxt = this.words[current];

        if (this.isDeleting) {

            this.txt = fullTxt.substring(0, this.txt.length - 1);

        } else {

            this.txt = fullTxt.substring(0, this.txt.length + 1);

        }

        this.txtElement.innerHTML = `${this.txt}`;

        let typeSpeed = 100;

        if (this.isDeleting) {

            typeSpeed /= 2;

        }

        if (!this.isDeleting && this.txt === fullTxt) {

            typeSpeed = this.wait;

            this.isDeleting = true;

        } else if (this.isDeleting && this.txt === "") {

            this.isDeleting = false;

            this.wordIndex++;

            typeSpeed = 500;

        }

        setTimeout(()=>this.type(), typeSpeed);

    }

}



function init() {

    const txtElement = document.querySelector("[data-palavras]");

    const words = JSON.parse(txtElement.getAttribute("data-palavras"));

    const wait = txtElement.getAttribute("data-wait");

    new TypeWriter(txtElement,words,wait);

}



let container_doencas = document.querySelector('#doencas');

if (container_doencas) {
    let glider = new Glider(container_doencas, {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        dots: '#dots_container_doencas',  // Elemento onde os pontos de navegação vão aparecer
        arrows: {
            prev: '.glider-prev-2',
            next: '.glider-next-2'
        },
        duration: 0.5, // Transição suave
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.5
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.5
                }
            }
        ]
    });

    function autoPlayCarousel() {
        if (glider.page >= glider.dots.childElementCount - 1) {
            glider.scrollItem(0);  // Volta para o início
        } else {
            glider.scrollItem('next');  // Avança para o próximo slide
        }
    }

    // Chama a função a cada 3 segundos para avançar os slides
    let autoPlayInterval = setInterval(autoPlayCarousel, 3000);

    // Pausa o autoplay ao interagir com o carrossel (exemplo: hover)
    container_doencas.addEventListener('mouseover', () => clearInterval(autoPlayInterval));
    container_doencas.addEventListener('mouseout', () => {
        autoPlayInterval = setInterval(autoPlayCarousel, 3000);
    });
}

document.querySelectorAll("[data-cta]").forEach(element => {

    element.onclick = () => {

        const form = document.querySelector("#form_cadastro")

        window.location.href = "#"



        form.classList.add("focus")

        body.classList.add("blur")

        

        setTimeout(() => {

            form.classList.remove("focus")

            body.classList.remove("blur")

        }, 3000);

    }

});



function previneEnvioExtra() {

    document.querySelector("#btn_envio_form").disabled = true

}



// RESPONSAVEL PELA ANIMAÇAO DE APARECIMETO COM SCROLL

const elemetosAnime = document.querySelectorAll("[data-anime]")

const classAnime = "animate"



function animeScroll() {

    const windowTop =  window.pageYOffset + ((window.innerHeight * 4) / 5)



    elemetosAnime.forEach(function(elemeto) {

        if( (windowTop) > elemeto.offsetTop ){

            elemeto.classList.add(classAnime)

        }

    })

}







window.onload = async () => {

    if(await desativaTelaCarregamento()) {



        animeScroll()



        window.addEventListener('scroll', () => {

            if(elemetosAnime.length){

                debounce(animeScroll(), 100)

            }

        })

    }



    init()

}

/*Nav Bar scroll*/
let lastScrollTop = 0;
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scrolling down
        navbar.classList.remove('scrolled-up');
    } else {
        // Scrolling up
        navbar.classList.add('scrolled-up');
    }

    lastScrollTop = scrollTop;
});



