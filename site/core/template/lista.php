<div class="fundo fundo-lista">
    <div class="container">
        <div class="row sticky">
            <div class="col s9">
                <h6 class="white-text"> Olá <?php echo $_SESSION["login"]; ?>
                    <a href="action/logout.php">
                        <sub>sair</sub>
                    </a>
                </h6>
            </div>
                <a href="./?page=novocliente" class="col s3 light-blue darken-4 btn-small">
                        Cadastrar
                </a>
        </div>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Telefone</th>
                    <th>-</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($arr)) {
                        foreach ($arr as $cliente) {
                            echo '<tr>';
                            echo '<td>'.$cliente['nome'].'</td>';
                            echo '<td>'.date("d/m/Y", strtotime(str_replace('-','/',$cliente['data_nascimento']))).'</td>';
                            echo '<td>'.$cliente['cpf'].'</td>';
                            echo '<td>'.$cliente['rg'].'</td>';
                            echo '<td>'.$cliente['telefone'].'</td>';
                            echo '<td><a href="./?page=novocliente&editar='.$cliente['id'].'" class="btn amber darken-4">Editar</a></td>';
                            echo '<td><a href="./?page=lista&excluir='.$cliente['id'].'" class="btn red darken-4">Excluir</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<td>Nenhum cliente cadastrado...</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


