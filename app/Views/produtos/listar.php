<div class="container mt-5">
    <div class="row">
        <div class="col-2">
            <h1>Produtos</h1>
        </div>

        <div class="col-2">
            <a class="btn btn-primary float-right" href="/produto/create">Adicionar produto</a>
        </div>

        <div class="col-2">
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordem
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/produto/listar?col=id&dir=asc">ID</a>
                    <a class="dropdown-item" href="/produto/listar?col=nome&dir=asc">Nome Crescente</a>
                    <a class="dropdown-item" href="/produto/listar?col=nome&dir=desc">Nome Decrerescente</a>
                    <a class="dropdown-item" href="/produto/listar?col=valor&dir=asc">Valor Crescente</a>
                    <a class="dropdown-item" href="/produto/listar?col=valor&dir=desc">Valor Decrescente</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary" href="/produto/listar_inativos">Produto Inativo</a>
        </div>

        <div class="col-4">
            <form class="form-inline" method="POST" action="/produto/buscar">
            <input type="hidden" name="tipo" value="ativos">
                <div class="form-group">
                    <label for="buscar" class="sr-only">Buscar</label>
                    <input type="text" class="form-control" id="buscar" value="<?= isset($buscar) ? $buscar : '' ?>" name="buscar" placeholder="Buscar Produto" required>
                </div>

                <button type="submit" class="btn btn-primary ml-1">Buscar</button>

                <?php
                if (isset($buscar)) : ?>
                    <a class="btn btn-danger ml-1" href="/produto/listar">x</a>
                <?php endif ?>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <?php if ($produtos)  : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $p) : ?>
                        <tr class="<?= isset($ativado_id) && $ativado_id == $p['id'] ? 'table-info' : '' ?>">
                            <th scope="row">
                                <?= $p['id'] ?>
                            </th>
                            <td>
                                <?= $p['codigo'] ?>
                            </td>
                            <td>
                                <a href="/produto/ver/<?= $p['id'] ?>">
                                    <?= $p['nome'] ?>
                                </a>
                                <?php if ($p['e_promocional']) : ?>
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php
                                if ($p['e_promocional']) {
                                    echo '<span class="promo">
                                    R$ ' . number_format($p['valor'], 2, ',', '.') . '</span>';
                                    echo '<span class="promo_por">
                                    R$ ' . number_format($p['valor_promocional'], 2, ',', '.') . '</span>';
                                } else {
                                    echo 'R$ ' . number_format($p['valor'], 2, ',', '.');
                                }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="/produto/edit/<?= $p['id'] ?>">Editar</a>
                                <a class="btn btn-sm btn-danger" href="/produto/delete/<?= $p['id'] ?>" onclick="return confirmar('Deseja Confirmar')">Remover</a>
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
</div>