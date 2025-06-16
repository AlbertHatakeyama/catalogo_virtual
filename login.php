<?php
    include("./includes/head.php");
?>
<section class="p-4">
    <article class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="d-flex justify-content-center">
                    <form class="form">
                        <span class="input-span">
                            <label for="email" class="label">Email</label>
                            <input type="email" name="email" id="email"/></span>
                        <span class="input-span">
                            <label for="password" class="label">Senha</label>
                            <input type="password" name="senha" id="password"/>
                        </span>
                        <span class="span">
                            <a href="#">Esqueceu a senha?</a>
                        </span>
                        <input class="submit" type="submit" value="Log in" />
                        <span class="span">Não tenho conta <a href="#">Criar Conta</a></span>
                    </form>
                </div>
            </div>
        </div>
    </article>
</section>
<?php
    include("./includes/footer.php");
?>