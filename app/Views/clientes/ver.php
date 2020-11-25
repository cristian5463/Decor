<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Ver Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col my-4">
            <h3>Dados Principais</h3>
            <p>
                Identificador: <strong><?= $cliente['id'] ?></strong>
            </p>
            <p>
                Nome Completo: <strong><?= $cliente['nome'] ?> <?= $cliente['sobrenome'] ?></strong>
            </p>
            <p>
                CPF: <strong><?= $cliente['cpf'] ?></strong>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Dados de Endereço</h3>
            <p><?= endereco($cliente) ?></p>
        </div>
    </div>

    <?php
    if ($cliente['observacoes']) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning">
                    <p>
                        <?= $cliente['observacoes'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endif ?>    

    <div class="row">
        <div class="col">
            <a class="btn btn-sm btn-primary" href="/cliente/listar">Voltar</a>
        </div>
    </div>
</div>