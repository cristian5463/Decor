<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1><?= isset($id) ? 'Editar Produto' : 'Novo Produto' ?></h1>
            <hr>
            <?php 
                if (isset($validation)) {
                    echo $validation->listErrors();
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/produto/store" method="POST">
                <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                <div class="form-group">
                    <label for="nome">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?= isset($codigo) ? $codigo : set_value('codigo','') ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" value="<?= isset($nome) ? $nome :  set_value('nome','') ?>" required>
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" class="moeda form-control" id="valor" name="valor" placeholder="0,00" value="<?= isset($valor) ? $valor :  set_value('valor','') ?>" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" <?= (isset($e_promocional) && $e_promocional == 1) ? 'checked' : '' ?> id="e_promocional" name="e_promocional" value="1">
                        <label class="form-check-label" for="e_promocional">Valor Promocional</label>
                    </div>
                </div>
                <div id="valor_promocional_campo" class="form-group">
                    <label for="valor_promocional">Valor Promocional</label>
                    <input type="text" class="moeda form-control" id="valor_promocional" name="valor_promocional" placeholder="0,00" value="<?= isset($valor_promocional) ? $valor_promocional :  set_value('valor_promocional','') ?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" rows="7" name="descricao" required id="descricao"><?= isset($descricao) ? $descricao :  set_value('descricao','') ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

        </div>
    </div>
</div>
