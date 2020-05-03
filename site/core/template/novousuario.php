<div class="fundo fundo-main row">
    <div class="col s10 l4 offset-s1 offset-l4 painel-bordado">
        <h6 class="center white-text">Registre-se</h6>
        <form method="POST" action="">
            <div class="input-field">
                <input id="login" type="text" class="white-text" name="login" maxlength="150">
                <label for="login">Login</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'loginVazio') {
                        dicaInput("O campo login deve ser preenchido!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'loginInvalido') {
                        dicaInput("O Login não deve conter caracteres especiais!");
                    } else if (isset($_GET['status']) && $_GET['status'] == 'novoUsuarioInvalido') {
                        dicaInput("Ocorreu um erro com o cadastro!");
                    }
                ?>
            </div> 
            <br>
            <div class="input-field">
                <input id="senha" type="password" class="white-text" name="senha" maxlength="150">
                <label for="senha">Senha</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'senhaVazia') {
                        dicaInput("A senha deve ser preenchida!");
                    } 
                ?>
            </div>
            <br>
            <div class="input-field">
                <input id="senhaconf" type="password" class="white-text" name="senhaconf" maxlength="150">
                <label for="senhaconf">Confirme sua Senha</label>
                <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'senhaDifere') {
                        dicaInput("As senhas digitadas não conferem!");
                    } 
                ?>
            </div>
            
            <br><br>
            <input value="Confirmar" class="btn col s4 offset-s8 blue darken-4" type="submit" name="btnNovoUsuario"> <br>
        </form>
        <br>
            <a class="col s12 left" href="./?page=login">
                Já tenho uma conta!
            </a>
    </div>
</div>