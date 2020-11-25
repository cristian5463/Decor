<div class="container mt-5">
    <div class="row">
        <div class="col-5">
            <h1>Clientes Inativos</h1>
        </div>
        <div class="col-3">
            <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordem
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/cliente/listar_inativos?col=id&dir=asc">Id</a>
                    <a class="dropdown-item" href="/cliente/listar_inativos?col=nome&dir=asc">Nome Crescente</a>
                    <a class="dropdown-item" href="/cliente/listar_inativos?col=nome&dir=desc">Nome Decrescente</a>
                    <a class="dropdown-item" href="/cliente/listar_inativos?col=valor&dir=asc">Valor Crescente</a>
                    <a class="dropdown-item" href="/cliente/listar_inativos?col=valor&dir=desc">Valor Descrescente</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <form class="form-inline" method="POST" action="/produto/buscar">
                <input type="hidden" name="tipo" value="inativos">
                <div class="form-group">
                    <label for="buscar" class="sr-only">Buscar</label>
                    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar Produto" required>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Buscar</button>
                <?php if (isset($buscar)) : ?>
                    <a class="btn btn-danger ml-3" href="/produto/listar">x</a>
                <?php endif ?>
            </form>
        </div>
    </div>
    <div>
        <?php if ($clientes) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($clientes as $c) : ?>

                        <tr>
                            <th scope="row">
                                <?= $c['id'] ?>
                            </th>
                            <td>
                                <?= $c['nome'] ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="/cliente/ativar/<?= $c['id'] ?>" onclick="return confirmar('Deseja ativar o Produto');">Ativar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="mt-4 alert alert-warning">Produto não encontrado!</div>
        <?php endif ?>
    </div>
</div>