<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Ver Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>
                Identificador: <strong><?= $produto['id'] ?></strong>
            </p>
            <p>
                Código: <strong><?= $produto['codigo'] ?></strong>
            </p>
            <p>
                Nome: <strong><?= $produto['nome'] ?></strong>
            </p>
            <p>
                Valor: R$ <strong><?= number_format($produto['valor'], 2, ',', '.') ?></strong>
            </p>
            <p>
                Descrição: <br> <strong><?= $produto['descricao'] ?></strong>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-sm btn-primary" href="/produto/listar">Voltar</a>
        </div>
    </div>
</div>