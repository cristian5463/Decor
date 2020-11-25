<div style="margin-left: 200px;" class="container mt-5">
    <div class="row">
        <div class="col">
            <h1><?= isset($id) ? 'Editar Cliente' : 'Novo Cliente' ?></h1>
            <hr>
            <?php
            if (isset($validation)) {
                echo $validation->listErrors();
            }
            ?>
        </div>
    </div>

    <form style="margin-left: 200px;" action="/cliente/store" method="POST">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">

        <div class="row">
            <div class="col-4">-+
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= isset($nome) ? $nome :  set_value('nome', '') ?>" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="valor">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?= isset($sobrenome) ? $sobrenome :  set_value('sobrenome', '') ?>" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="valor">CPF</label>
                    <input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?= isset($cpf) ? $cpf :  set_value('cpf', '') ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="valor">CEP</label>
                    <input type="text" class="cep form-control" id="cep" name="cep" placeholder="00000-000"  value="<?= isset($cep) ? $cep :  set_value('cep', '') ?>" required>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="valor">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?= isset($estado) ? $estado :  set_value('estado', '') ?>" tabindex="-1" readonly>
                </div>
            </div>


            <div class="col-4">
                <div class="form-group">
                    <label for="valor">cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?= isset($cidade) ? $cidade :  set_value('cidade', '') ?>" tabindex="-1" readonly>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="valor">Rua</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= isset($endereco) ? $endereco :  set_value('endereco', '') ?>" tabindex="-1" readonly>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="valor">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?= isset($bairro) ? $bairro :  set_value('bairro', '') ?>" tabindex="-1" readonly>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group">
                    <label for="valor">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="<?= isset($bairro) ? $bairro :  set_value('bairro', '') ?>" >
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="valor">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="<?= isset($complemento) ? $complemento :  set_value('complemento', '') ?>" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="observacoes">Observações</label>
                    <textarea 
                    class="form-control" 
                    rows="6" 
                    name="observacoes" 
                    id="observacoes" 
                    required><?= isset($observacoes) ? $observacoes : set_value('observacoes', '') ?></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>


</div>