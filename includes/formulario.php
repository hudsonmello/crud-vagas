<main>

    <section>

        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>

    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">

        <div class="form-group">
            <label>Titulo</label>
            <input type="text" name="titulo" class="form-control" value="<?=$obVaga->titulo ?>">
        </div>


        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" rows="5"><?=$obVaga->descricao ?></textarea>
        </div>


        <div class="form-group">
            <label>Status</label>
  
            <div class="mt-3">
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="1" checked>Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="0" <?=$obVaga->ativo == '0' ? 'checked' :'' ?>>Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
        <button type="submit" class="btn btn-success">Enviar</button>
        
        </div>

    </form>

</main>