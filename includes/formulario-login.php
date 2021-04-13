<?php

$alertLogin = strlen($alertLogin) ? '<div class="alert alert-danger">' . $alertLogin . '</div>' : '';
$alertCadastro = strlen($alertCadastro) ? '<div class="alert alert-danger">' . $alertCadastro . '</div>' : '';


?>



<div class="jumbotron">
    <div class="row">

        <div class="col">
            <form method="post">

                <h2>Login</h2>

                <?= $alertLogin ?>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary" name="acao" value="logar">Entrar</button>
                </div>

            </form>

        </div>

        <div class="col">

            <form method="post">

                <h2>Cadastre-se</h2>

                <?= $alertCadastro ?>

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary" name="acao" value="cadastrar">Cadastrar</button>
                </div>

            </form>


        </div>
    </div>


</div>