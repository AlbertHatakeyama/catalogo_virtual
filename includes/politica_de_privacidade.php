<!--===============================================

    LGPD - FEITO POR www.bmasolucoesdigitais.com.br

================================================-->



<style>

    /*////////////////////////

        DEFINIÇÃO DE CORES

    //////////////////////*/

    #popup_lgpd,

    #modal_lgpd {

        --LGPD_cor_pri: var(--color_1);

        --LGPD_cor_hover: var(--color_2);



        --LGPD_background: var(--background_1);

        --LGPD_background_trans: var(--background_1_trans);



        --LGPD_popup_border: var(--btn_border);

        --LGPD_popup_radius: var(--rounded);



        --LGPD_btn_color: var(--btn_color);

        --LGPD_btn_shadow: var(--btn_shadow);

        --LGPD_btn_radius: var(--btn_radius);

        --LGPD_btn_boder: var(--btn_border);

        --LGPD_btn_color_hover: var(--btn_color_hover);

        --LGPD_btn_shadow_hover: var(--btn_shadow_hover);



        --LGPD_scrollbar_background: #e7e7e7;

        --LGPD_scrollbar_color: var(--scrollbar_color);

    }



    #popup_lgpd {

        position: fixed;

        left: 0;

        bottom: 0;

        width: 100%;

        text-align: center;

        opacity: 1;

        z-index: 999;

        transition: .4s ease-in-out;

    }



    #popup_lgpd.aceito,

    #popup_lgpd.escondido {

        opacity: 0;

        transform: translate3d(0, 100%, 0);

    }



    #popup_lgpd .container_lgpd {

        width: 100%;

        padding: 1rem;

        background: var(--LGPD_background);

        border-radius: var(--LGPD_popup_radius) var(--LGPD_popup_radius) 0 0;

        border: 1px solid var(--LGPD_popup_border);

    }



    #popup_lgpd p {

        margin-bottom: 1rem;

    }



    #popup_lgpd .titulo_lgpd ,

    #modal_lgpd .titulo_lgpd ,

    #popup_lgpd .container_btns,

    #modal_lgpd .container_btns {

        display: flex;

        align-items: center;

    }



    #popup_lgpd .titulo_lgpd,

    #modal_lgpd .titulo_lgpd {

        flex-direction: row;

        justify-content: center;

        margin-bottom: 1rem;

        font-weight: 600;

    }



    #popup_lgpd .titulo_lgpd svg,

    #modal_lgpd .titulo_lgpd svg {

        margin-right: 1rem;

        color: var(--LGPD_cor_pri);

    }



    #popup_lgpd .container_btns,

    #modal_lgpd .container_btns {

        flex-direction: column;

        justify-content: end;

    }



    #popup_lgpd .btn_open_lgpd,

    #popup_lgpd .btn_ok_lgpd,

    #modal_lgpd .btn_open_lgpd,

    #modal_lgpd .btn_ok_lgpd {

        width: 100%;

        display: inline-block;

        font-weight: 600;

        text-align: center;

        white-space: nowrap;

        vertical-align: middle;

        -webkit-user-select: none;

        -moz-user-select: none;

        -ms-user-select: none;

        user-select: none;

        border: 1px solid var(--LGPD_btn_boder);

        box-shadow: var(--LGPD_btn_shadow);

        padding: 0.5rem 1rem;

        font-size: 1.1rem;

        border-radius: var(--LGPD_btn_radius);

        transition: all .3s ease-in-out;

    }



    #popup_lgpd .btn_open_lgpd ,

    #modal_lgpd .btn_open_lgpd {

        margin-bottom: 1rem;

    }



    #popup_lgpd .btn_open_lgpd,

    #modal_lgpd .btn_open_lgpd {

        background: none;

        border-color: var(--LGPD_cor_pri);

        color: var(--LGPD_cor_pri);

    }



    #popup_lgpd .btn_ok_lgpd,

    #modal_lgpd .btn_ok_lgpd {

        background: var(--LGPD_cor_pri);

        color: var(--LGPD_btn_color);

    }



    #popup_lgpd .btn_open_lgpd:hover,

    #modal_lgpd .btn_open_lgpd:hover,

    #popup_lgpd .btn_ok_lgpd:hover,

    #modal_lgpd .btn_ok_lgpd:hover,

    #popup_lgpd .btn_ok_lgpd:disabled,

    #modal_lgpd .btn_ok_lgpd:disabled {

        background: var(--LGPD_cor_hover);

        color: var(--LGPD_btn_color_hover);

        border-color: var(--LGPD_btn_boder);

        box-shadow: var(--LGPD_btn_shadow_hover);

    }



    #popup_lgpd .btn_ok_lgpd:disabled,

    #modal_lgpd .btn_ok_lgpd:disabled {

        opacity: .4;

        cursor: not-allowed;

    }



    body.no_scroll {

        overflow: hidden;

    }



    #modal_lgpd,

    #modal_lgpd .container_modal_lgpd {

        transition: all .2s ease-in-out;

    }



    #modal_lgpd {

        position: fixed;

        top: 0; bottom: 0; left: 0; right: 0;

        inset: 0;

        width: 100%; 

        height: 100%; 

        background-color: #000000b0;

        opacity: 0;

        z-index: -1;

    }



    #modal_lgpd.open {

        opacity: 1;

        z-index: 9999;

    }



    #modal_lgpd .container_modal_lgpd {

        position: relative;

        width: 100%;

        height: 100%;

        max-width: 50rem;

        background: var(--LGPD_background);

        transform: translate3d(-100%, 0, 0);

    }



    #modal_lgpd.open .container_modal_lgpd {

        transform: translate3d(0, 0, 0);

    }



    #modal_lgpd .texto_modal_lgpd,

    #modal_lgpd .container_btns,

    #modal_lgpd .titulo_lgpd {

        padding: 1.5rem;

    }



    #modal_lgpd .texto_modal_lgpd {

        width: 100%;

        height: 100%;

        padding-top: 7.5rem;

        padding-bottom: 9rem;

        overflow: auto;

    }



    #modal_lgpd .texto_modal_lgpd::-webkit-scrollbar {

        width: 1rem;

    }



    #modal_lgpd .texto_modal_lgpd::-webkit-scrollbar-track {

        background: var(--LGPD_scrollbar_background);

    }



    #modal_lgpd .texto_modal_lgpd::-webkit-scrollbar-thumb {

        background-color: var(--LGPD_scrollbar_color);

        border-radius: 1rem;

        border: 0.2rem solid var(--LGPD_scrollbar_background);

    }



    #modal_lgpd .container_btns,

    #modal_lgpd .titulo_lgpd { 

        position: absolute;

        left: 0;

        right: 0;

    }

    

    #modal_lgpd .titulo_lgpd {

        top: 0;

        background: linear-gradient(360deg, var(--LGPD_background_trans) 0%, var(--LGPD_background) 10%);

    }



    #modal_lgpd .container_btns {

        bottom: 0;

        background: linear-gradient(180deg, var(--LGPD_background_trans) 0%, var(--LGPD_background) 10%);

    }



    @media (min-width: 768px) {

        #popup_lgpd {

            max-width: 35rem;

            padding: 1.5rem;

            text-align: left;

        }



        #popup_lgpd .container_lgpd {

            border-radius: var(--LGPD_popup_radius);

            box-shadow:

                6.7px 6.7px 5.3px rgba(0, 0, 0, 0.02),

                22.3px 22.3px 17.9px rgba(0, 0, 0, 0.03),

                100px 100px 80px rgba(0, 0, 0, 0.05);

        }



        #popup_lgpd .titulo_lgpd {

            justify-content: start;

        }

    }



    @media (min-width: 576px) {

        #popup_lgpd .container_btns ,

        #modal_lgpd .container_btns {

            flex-direction: row;

        }



        #modal_lgpd .texto_modal_lgpd {

            padding-top: 6rem;

            padding-bottom: 5rem;

        }



        #popup_lgpd .btn_open_lgpd,

        #modal_lgpd .btn_open_lgpd {

            margin-right: 1rem;

            margin-bottom: initial;

        }

    }



    .uppercase {

        text-transform: uppercase;

    }

</style>



<section id="popup_lgpd" class="escondido">

    <div class="container_lgpd">

        <h4 class="titulo_lgpd">

            <svg width="27" height="27" viewBox="0 0 27 27" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                <path d="M26.8652 13.5226C23.1812 13.4766 20.2078 10.4836 20.2078 6.79225C16.5176 6.79225 13.5224 3.81887 13.4831 0.134857C12.0427 -0.0822099 10.5754 0.148026 9.28601 0.812384L5.65252 2.66141C4.34181 3.3322 3.27585 4.39817 2.60506 5.70888L0.763332 9.32946C0.0925419 10.6452 -0.14434 12.1316 0.0858059 13.5922L0.724038 17.6046C0.954296 19.0585 1.63845 20.4 2.67803 21.4396L5.56102 24.3243C6.60117 25.3667 7.93152 26.0459 9.38536 26.2761L13.418 26.9143C14.8718 27.1445 16.352 26.9077 17.6611 26.2435L21.299 24.3883C22.6081 23.7237 23.674 22.6583 24.3381 21.3492L26.1865 17.7247C26.8484 16.4303 27.0841 14.954 26.8652 13.5226ZM8.98121 19.7646C7.99214 19.7646 7.18495 18.958 7.18495 18.0189C7.18495 17.0798 7.99214 16.2731 8.98121 16.2731C9.97027 16.2731 10.7775 17.0798 10.7775 18.0189C10.7775 18.958 9.96915 19.7646 8.98121 19.7646ZM10.7775 10.8338C9.7884 10.8338 8.98121 10.0272 8.98121 9.08809C8.98121 8.14898 9.7884 7.34235 10.7775 7.34235C11.7665 7.34235 12.5737 8.14898 12.5737 9.08809C12.5737 10.0272 11.7654 10.8338 10.7775 10.8338ZM19.7587 17.9684C18.7697 17.9684 17.9625 17.1617 17.9625 16.2226C17.9625 15.2835 18.7697 14.4769 19.7587 14.4769C20.7478 14.4769 21.555 15.2835 21.555 16.2226C21.555 17.1617 20.7467 17.9684 19.7587 17.9684Z" fill="currentColor"/>

            </svg>

            Este site usa cookies

        </h4>

        <p>

            Este site utiliza cookies para fornecer uma experiência mais relevante ao usuário.

            Ao acessar este site você concorda com a utilização de TODOS os cookies deste site.

        </p>

        <div class="container_btns">

            <button class="btn_open_lgpd lgpd-bma-bt-saibamais">

                Política de privacidade

            </button>

            <button class="btn_ok_lgpd lgpd-bma-bt-aceitar">

                OK, aceito

            </button>

        </div>

    </div>

</section>



<div id="modal_lgpd">

    <div class="container_modal_lgpd">

        <h4 class="titulo_lgpd">

            <svg width="50" height="50" viewBox="0 0 50 50" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.4351 0.161102C24.274 0.247535 23.7818 0.658406 23.3414 1.07406C22.901 1.48982 22.1758 2.12434 21.7299 2.48413C21.2841 2.84393 20.3556 3.51322 19.6668 3.97126C18.9779 4.4294 17.8353 5.09918 17.1275 5.45966C16.4197 5.82013 15.2634 6.34224 14.5578 6.62C13.8522 6.89766 12.7117 7.27923 12.0235 7.46782C11.3352 7.6565 10.3083 7.89871 9.74158 8.00614C9.17493 8.11357 8.12876 8.26153 7.41679 8.33488C6.36944 8.4428 6.06024 8.51087 5.79655 8.69145C5.61733 8.81431 5.36477 9.06941 5.23537 9.25838L5 9.60197L5.00039 17.1291C5.00088 24.515 5.00498 24.6799 5.22228 25.9164C5.34397 26.6094 5.55082 27.5993 5.68179 28.1159C5.81276 28.6325 6.09676 29.5683 6.31299 30.1954C6.52922 30.8225 6.9062 31.7923 7.15075 32.3506C7.39521 32.9089 7.86145 33.8452 8.18667 34.4313C8.51199 35.0174 9.09661 35.9804 9.4858 36.5712C9.87499 37.1621 10.548 38.0996 10.9815 38.6546C11.415 39.2096 12.2462 40.1947 12.8285 40.8436C13.4109 41.4925 14.4587 42.5494 15.157 43.1923C15.8553 43.835 16.9404 44.7734 17.5683 45.2777C18.196 45.7819 19.2069 46.5488 19.8145 46.9818C20.4221 47.4148 21.5183 48.136 22.2504 48.5843C22.9825 49.0326 23.8492 49.5345 24.1765 49.6997C24.6069 49.917 24.9079 50 25.2652 50C25.6161 50 25.9209 49.9182 26.318 49.7174C26.6252 49.5619 27.2083 49.2383 27.6134 48.9985C28.0186 48.7585 28.7308 48.3167 29.1961 48.0165C29.6615 47.7163 30.5385 47.1106 31.1452 46.6705C31.7519 46.2305 32.706 45.4947 33.2654 45.0354C33.8248 44.576 34.8172 43.7076 35.4708 43.1054C36.1244 42.5032 37.1325 41.4818 37.7111 40.8356C38.2898 40.1894 39.1173 39.2073 39.5501 38.6531C39.983 38.099 40.6555 37.1621 41.0447 36.5712C41.4339 35.9804 42.0185 35.0174 42.3438 34.4313C42.669 33.8452 43.137 32.905 43.3835 32.3419C43.6301 31.7789 44.0213 30.7641 44.2526 30.0869C44.4841 29.4098 44.7875 28.3724 44.9267 27.7815C45.066 27.1906 45.2589 26.2018 45.3553 25.5841C45.5124 24.5768 45.5305 23.6948 45.5305 17.0313V9.60187L45.2951 9.25829C45.1657 9.06941 44.913 8.81421 44.7335 8.69125C44.4677 8.50901 44.1592 8.44221 43.0645 8.3298C42.3259 8.25382 41.1722 8.08193 40.5008 7.94754C39.8294 7.81325 38.7692 7.55278 38.1449 7.36869C37.5206 7.18459 36.5317 6.84951 35.9475 6.624C35.3632 6.3985 34.2502 5.89113 33.4742 5.49647C32.6981 5.10191 31.5115 4.40957 30.8373 3.95807C30.163 3.50658 29.2464 2.84305 28.8006 2.48355C28.3546 2.12414 27.6295 1.48962 27.1891 1.07367C26.7487 0.657625 26.2477 0.244995 26.0758 0.156707C25.8972 0.0650011 25.5414 -0.00219158 25.2457 5.46896e-05C24.961 0.00220329 24.5962 0.0746698 24.4351 0.161102ZM27.2673 11.95C27.6434 12.0924 28.2147 12.4055 28.537 12.6458C28.8593 12.8861 29.3343 13.3355 29.5927 13.6445C29.851 13.9534 30.2316 14.5578 30.4384 14.9875C30.6452 15.4173 30.8843 16.0852 30.9698 16.4717C31.0551 16.8584 31.1251 17.5874 31.1251 18.092C31.1251 18.6847 31.0562 19.2828 30.9304 19.7819C30.8234 20.2068 30.5754 20.8734 30.3794 21.2635C30.1833 21.6536 29.7656 22.2535 29.451 22.5968C29.1364 22.9401 28.6307 23.3857 28.3273 23.5872C28.0239 23.7886 27.4635 24.0635 27.082 24.1982C26.529 24.3933 26.1903 24.4446 25.4117 24.451C24.6321 24.4574 24.3033 24.4137 23.7817 24.2341C23.4223 24.1105 22.873 23.844 22.5609 23.6419C22.2488 23.4398 21.7628 23.0216 21.481 22.7124C21.199 22.4033 20.812 21.8835 20.6206 21.5572C20.4294 21.2309 20.1561 20.63 20.0131 20.2219C19.7778 19.5502 19.7533 19.3462 19.7533 18.0639C19.7533 16.7684 19.7764 16.5812 20.0245 15.8665C20.1736 15.4368 20.4646 14.7995 20.6711 14.4504C20.8776 14.1012 21.2655 13.5875 21.5332 13.3088C21.8009 13.0301 22.2556 12.6516 22.5438 12.4677C22.832 12.2838 23.3315 12.0413 23.6538 11.9288C23.9761 11.8163 24.3277 11.7027 24.4351 11.6765C24.5425 11.6504 25.0699 11.6428 25.6071 11.6599C26.3739 11.6844 26.7306 11.7467 27.2673 11.95ZM24.5816 12.8213C24.2862 12.8884 23.8247 13.0515 23.5561 13.1835C23.2875 13.3154 22.7779 13.7094 22.4236 14.059C21.9574 14.5189 21.6837 14.8969 21.4332 15.427C21.2428 15.8299 21.0297 16.4012 20.9595 16.6967C20.8894 16.9921 20.833 17.6293 20.834 18.1128C20.8355 18.7405 20.8993 19.2011 21.0572 19.7242C21.1789 20.1271 21.4126 20.6927 21.5766 20.9811C21.7406 21.2695 22.1279 21.7642 22.4373 22.0805C22.8106 22.4619 23.2251 22.7622 23.6687 22.9722C24.2929 23.2679 24.4058 23.2888 25.3629 23.2858C26.188 23.2834 26.4941 23.2405 26.9296 23.0667C27.2274 22.9478 27.7302 22.6416 28.0469 22.3862C28.3637 22.1307 28.8137 21.6367 29.0468 21.2884C29.2799 20.9401 29.5839 20.3029 29.7223 19.8723C29.9149 19.2731 29.9762 18.8717 29.9834 18.1616C29.9886 17.6513 29.9351 16.9921 29.8646 16.6967C29.7941 16.4012 29.5888 15.8472 29.4083 15.4654C29.2279 15.0836 28.8754 14.5435 28.625 14.2649C28.3747 13.9865 27.9741 13.6241 27.735 13.4595C27.4958 13.2949 27.0728 13.0805 26.7949 12.9828C26.5171 12.8851 26.0263 12.7813 25.7042 12.7521C25.3773 12.7224 24.8816 12.7529 24.5816 12.8213ZM23.1365 25.0068C23.5145 25.1727 24.1586 25.3767 24.5677 25.4601C25.1812 25.5852 25.4378 25.5923 26.0313 25.5C26.4271 25.4384 27.021 25.2701 27.3509 25.1258C27.6996 24.9735 28.1352 24.8619 28.3905 24.8597C28.7768 24.8564 29.1962 25.0539 31.8575 26.4929C34.1977 27.7583 34.9751 28.2264 35.2813 28.5548C35.4992 28.7884 35.7299 29.1545 35.7941 29.3684C35.8587 29.5844 35.9106 30.3296 35.9106 31.0433C35.9106 31.9178 35.8676 32.4296 35.7761 32.6434C35.7022 32.8163 35.5153 33.0757 35.361 33.22C35.2067 33.3643 34.9567 33.5291 34.8055 33.5862C34.6184 33.6569 31.6172 33.6901 25.4117 33.6901C19.2063 33.6901 16.2051 33.6569 16.0179 33.5862C15.8668 33.5291 15.6167 33.3643 15.4624 33.22C15.3081 33.0757 15.1213 32.8163 15.0474 32.6434C14.9556 32.4289 14.9131 31.9173 14.9135 31.0319C14.9138 30.3185 14.9616 29.5633 15.0198 29.3536C15.0793 29.1393 15.3035 28.7897 15.532 28.5549C15.8303 28.2483 16.7172 27.7163 18.8683 26.5537C20.4797 25.6827 21.93 24.9121 22.0912 24.8414C22.2523 24.7706 22.3988 24.711 22.4166 24.7089C22.4345 24.7068 22.7584 24.8408 23.1365 25.0068ZM19.3585 27.5731C17.5302 28.5714 16.3564 29.2712 16.2333 29.4361C16.0593 29.6691 16.036 29.8485 16.036 30.9593C16.036 32.0377 16.061 32.2433 16.2104 32.3926C16.3753 32.5575 16.8766 32.567 25.4238 32.567H34.4629L34.6572 32.3272C34.8316 32.1117 34.8481 31.9675 34.8194 30.911C34.7917 29.8897 34.7594 29.6955 34.5747 29.4366C34.4207 29.2207 33.5466 28.6972 31.4098 27.5409C28.5493 25.9932 28.448 25.9473 28.1554 26.0662C27.9893 26.1337 27.5896 26.2813 27.2673 26.3942C26.7907 26.5612 26.4445 26.6001 25.4117 26.6029C24.252 26.606 24.0787 26.5824 23.4096 26.3305C23.0068 26.1788 22.5893 26.0365 22.4818 26.0145C22.3597 25.9893 21.1879 26.5741 19.3585 27.5731Z" fill="currentColor"/>

            </svg>                                            

            POLÍTICA DE PRIVACIDADE

        </h4>

        <div class="texto_modal_lgpd">

            <p>

                Na <em>Natural Calme</em>, privacidade e segurança são prioridades e nos comprometemos com a transparência do tratamento de dados pessoais dos nossos clientes.

                <br>

                Por isso, esta presente Política de Privacidade estabelece como é feita a coleta e uso de informações de clientes ou outras pessoas que acessam este site.

                <br>

                <br>

                <b>1. ONDE SE APLICA ESSA POLÍTICA DE PRIVACIDADE?</b>

                <br>

                Se aplica a todos os seus dados coletados pela <em>Natural Calme</em>, por meio do website ou por outros meios. O website da Natural Calme <em>Natural Calme</em> pode conter links de parceiros comerciais ou afiliados, que possuem suas próprias políticas de privacidade, pelas quais <?=$config->lgpd_conector_nome?> <em>Natural Calme</em> não possui qualquer responsabilidade.

                <br>

                <br>

                <b>2. QUEM É RESPONSÁVEL PELOS DADOS PESSOAIS DOS USUÁRIOS?</b>

                <br>

                <span class="uppercase"></span> <em>Natural Calme</em> é responsável pelo gerenciamento do website <em>Natural Calme</em> e pelos seus dados coletados.

                <br>

                <br>

                <b>3. QUAIS DADOS PESSOAIS PODEM SER COLETADOS PEL<span class="uppercase"></span> <em>Natural Calme</em>?</b>

                <br>

                - Dados pessoais como: nome, sobrenome, data de nascimento;

                <br>

                - Detalhes de contato como: endereço, e-mail, número de telefone;

                <br>

                - Cargo ou função na empresa onde você trabalha;

                <br>

                - Registros de correspondência com a empresa

                <br>

                - Pesquisas.

                <br>

                Seus dados também podem ser coletados por meios automáticos, incluindo Cookies e outros dispositivos de rastreamento.

                <br>

                O seu endereço de IP nunca será usado para identificá-lo como uma pessoa física, mas simplesmente nos permitirá determinar a cidade de onde você está conectado.

                <br>

                Podemos obter seus dados de fontes externas, como por exemplo de empresas terceirizadas ou fontes disponíveis publicamente.

                <br>

                Esta Política de Privacidade aplica-se a qualquer um destes dados e, sempre que possível, será informado a fonte e local de onde foi coletado.

                <br>

                <br>

                <b>4. POR QUAIS MEIOS SEUS DADOS PODEM SER COLETADOS PELO</span> <em>Natural Calme</em>?</b>

                <br>

                Os dados que você nos fornece pode ser coletados por meio de diversos canais:

                <br>

                - websites;

                <br>

                - Meios de comunicação social;

                <br>

                - Eventos;

                <br>

                - Contatos telefônicos;

                <br>

                - E-mails ou outros. 

                <br> 

                <br>

                <b>5. PARA QUAIS PROPÓSITOS SEUS DADOS SERÃO UTILIZADOS?</b>

                <br>

                Usamos principalmente seus dados com o objetivo de gerenciar nossos relacionamentos com clientes e possíveis clientes, e em especial para responder aos seus contatos:

                <br>

                - Gerenciamento de reclamações de serviços;

                <br>

                - Enviar-lhe notícias e informações sobre nossos produtos e serviços que podem lhe interessar;

                <br>

                - Gerenciar programas de fidelidade;

                <br>

                - Realização de pesquisas para melhorar nossos serviços e produtos;

                <br>

                - Organizar concursos;

                <br>

                - Gerar estatísticas para análise de marketing.

                <br>

                Podemos processar seus dados para qualquer outra finalidade específica indicada no momento da coleta de dados.

                <br>

                <br>

                <b>5. COM QUE BASE LEGAL SEUS DADOS SÃO USADOS?</b>

                <br>

                Levando em consideração o propósito, seus dados são processados nos seguintes fundamentos legais:

                <br>

                - Onde é necessário para o cumprimento de um contrato que temos com você;

                <br>

                - Oonde é necessário buscar nossos interesses legítimos, incluindo:

                <br>

                &nbsp;&nbsp;&nbsp; – Rede e segurança da informação para proteger seus dados contra perda;

                <br>

                &nbsp;&nbsp;&nbsp; - Ddano ou acesso não autorizado;

                <br>

                – Avaliar nossos serviços através de gravações de chamadas com nossos centros de contato;

                <br>

                – Atividades de marketing direto consentido;

                <br>

                - Quando é necessário cumprir uma obrigação legal, especialmente para assistir uma autoridade pública ou um órgão de investigação;

                <br>

                - Onde você deu seu consentimento explícito para propósitos específicos e determinados.

                <br>

                <br>

                <b>6. COM QUEM COMPARTILHAMOS OS SEUS DADOS?</b>

                <br>

                Podemos compartilhar seus dados com:

                <br>

                - Outras entidades do Grupo <em>Natural Calme</em> para fins administrativos internos;

                <br>

                - Nossos fornecedores de confiança para executar uma variedade de serviços comerciais em nosso nome

                <br>

                - Terceiros que possam oferecer serviços relacionados aos nossos próprios produtos e serviços;

                <br>

                - Autoridades judiciais, órgãos estaduais ou órgãos públicos, na medida permitida por lei.

                <br>

                Em todos os casos, compartilharemos seus dados somente com base na necessidade de cumprimento dos propósitos definidos acima.

                <br>

                <br>

                <b>7. ONDE SEUS DADOS SÃO ARMAZENADOS?</b><br>

                Em nosso banco de dados ou no banco de dados de nossos provedores de serviços.<br>

                <br>

                <b>8. COMO NÓS GARANTIMOS O SIGILO DOS SEUS DADOS?</b><br>

                Mantemos medidas técnicas e organizacionais adequadas para evitar, na medida do possível, qualquer destruição acidental ou ilegal, perda, alteração ou acesso não autorizado.<br>

                <br>

                <b>9. POR QUANTO SEUS DADOS SÃO MANTIDOS CONOSCO?</b><br>

                Nós reteremos seus dados pelo período de tempo necessário para atingir o propósito para o qual foram coletados, dentro dos limites estabelecidos pela lei aplicável.<br>

                <br>

                <b>10. QUAIS SÃO OS SEUS DIREITOS E COMO VOCÊ PODE EXERCÊ-LOS?</b>

                <br>

                Sujeito à lei aplicável, você pode ter o direito de:

                <br>

                - Acessar seus dados;

                <br>

                - Corrigir e atualizar seus dados;

                <br>

                - Apagar seus dados;

                <br>

                - Restringir o processamento de seus dados;

                <br>

                - Objetar-se ao processamento dos seus dados, principalmente quando o processamento é baseado em nossos interesses legítimos;

                <br>

                - Retirar o seu consentimento a qualquer momento;

                <br>

                - Solicitar o retorno de seus dados em um arquivo de dados estruturado, seja para você ou para um terceiro, onde seja tecnicamente viável (portabilidade de dados);

                <br>

                - Apresentar uma reclamação junto da autoridade competente em matéria de proteção de dados.

                <br>

                Se você deseja exercer um dos seus direitos, por favor envie um email para <em>enviosNatural Calme.com.br</em> A/C Marketing.

                <br>

                Por favor, note que podemos exigir prova de sua identidade e detalhes completos do seu pedido antes de processá-lo.

                <br>

                Os dados serão usados apenas para verificar sua identidade e não serão armazenados por mais tempo do que o necessário para essa finalidade.

                <br>

                Nós responderemos em um prazo razoável, de acordo com os regulamentos aplicáveis.

                <br>

                <br>

                Essa Política de Privacidade está passiva de ser atualizada, ou seja, sempre considere a última versão online.<br>

            </p>

        </div>

        <div class="container_btns">

            <button class="btn_open_lgpd lgpd-bma-close">

                Fechar

            </button>

            <button class="btn_ok_lgpd lgpd-bma-bt-aceitar">

                OK, aceito

            </button>

        </div>

    </div>

</div>



<script>

    const document_body     = document.querySelector("body");

    const btn_open_lgpd     = document.querySelectorAll(".lgpd-bma-bt-saibamais");

    const btn_close_lgpd    = document.querySelectorAll(".lgpd-bma-close");

    const btn_aceita_lgpd   = document.querySelectorAll(".lgpd-bma-bt-aceitar");

    const popup_lgpd        = document.querySelector("#popup_lgpd");

    const modal_lgpd        = document.querySelector("#modal_lgpd");



    // ABRE MODAL LGPD

    btn_open_lgpd.forEach(function (element) {

        element.onclick = function(){

            modalLgpd(true)

        }

    });



    // FECHA MODAL LGPD

    btn_close_lgpd.forEach(function (element) {

        element.onclick = function(){

            modalLgpd(false)

        }

    });



    // FECHA MODAL LGPD AO CLICAR NO FUNDO DO MODAL

    window.onclick = function(event){

        if (event.target == modal_lgpd){

            modalLgpd(false)

        }

    };



    // CLICA PARA ACEITAR OS TERMOS

    btn_aceita_lgpd.forEach(function (element) {

        element.onclick = function(){

            setCookieLgpdBma('lgpd_bma_cookies','ok',365);

            modalLgpd(false)

            popupLgpd(true)

        }

    });



    // FAZ O POPUP APARECER OU NÃO

    function popupLgpd(condicao) {

        if(condicao){

            popup_lgpd.classList.add("aceito")



            btn_aceita_lgpd.forEach(function (element) {

                

                element.innerText = "Você ja aceitou!"

            });

        }

        else {

            popup_lgpd.classList.remove("escondido")

        }

    }



    // FAZ O MODAL ABRIR OU FECHAR

    function modalLgpd(condicao) {

        if(condicao){

            modal_lgpd.classList.add("open");

            document_body.classList.add("no_scroll")  

        }

        else {

            modal_lgpd.classList.remove("open");

            document_body.classList.remove("no_scroll")

        }

    }



    // SALVA OS COOKIES QUAND O USUARIO ACEITA OS TERMOS

    function setCookieLgpdBma(name,value,days) {

        var expires = "";

        if (days) {

            var date = new Date();

            date.setTime(date.getTime() + (days*24*60*60*1000));

            expires = "; expires=" + date.toUTCString();

        }

        document.cookie = name + "=" + (value || "")  + expires + "; path=/";

    }



    // VERIFICA SE EXISTE OS COOKIES (SE JÁ? FOI ACEITO)

    function getCookieLgpdBma(name, condicao) {

        var nameEQ = name + "=";

        var ca = document.cookie.split(';');

        for(var i=0;i < ca.length;i++) {

            var c = ca[i];

            while (c.charAt(0)==' ') c = c.substring(1,c.length);

            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);

        }



        if(condicao) {

            return ca

        }

        else {

            return null;

        }

    }



    // VERIFICA SE EXISTE OS COOKIES (SE JÁ? FOI ACEITO)

    if (getCookieLgpdBma('lgpd_bma_cookies')){

        popupLgpd(true)

    }



    // POUPUP APARECE 2s DEPOIS ( APENAS PRA FAZER UMA ANIMAÇÃO )

    setTimeout(() => {

        popupLgpd(false)

    }, 2000);

</script>



<!--===============================================

    LGPD - FEITO POR www.bmasolucoesdigitais.com.br

================================================-->