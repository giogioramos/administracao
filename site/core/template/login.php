<div class="fundo fundo-main row">
    <div class="col s10 l4 offset-s1 offset-l4 painel-bordado">
        <h6 class="center white-text">Conecte-se</h6>
        <form method="POST" action="">
            <div class="input-field">
                <input id="login" type="text" class="white-text" name="login" maxlength="150">
                <label for="login">Login</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'loginVazio') {
                        dicaInput("Digite um login!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'semCredencial') {
                        dicaInput("Login ou senha incorretos!");
                    } 
                ?>
            </div>
            <br>
            <div class="input-field">
                <input id="senha" type="password" class="white-text" name="senha" maxlength="150">
                <label for="senha">Senha</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'senhaVazia') {
                        dicaInput("Digite uma senha!");
                    } 
                ?>
            </div> <br><br>
            <input value="Login" class="btn col s4 offset-s8 red darken-4" type="submit" name="btnLogin"> <br>
        </form>
        <br>
        <a class="col s12 left" href="./?page=novousuario">
            Registre-se!
        </a>
    </div>
</div>