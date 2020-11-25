<div class="container mt-5">
    <div class="row">
        <div class="col-5">
            <h1>Produtos Inativos</h1>
        </div>
        <div class="col-3">
            <div class="dropdown float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordem
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/produto/listar_inativos?col=id&dir=asc">Id</a>
                    <a class="dropdown-item" href="/produto/listar_inativos?col=nome&dir=asc">Nome Crescente</a>
                    <a class="dropdown-item" href="/produto/listar_inativos?col=nome&dir=desc">Nome Decrescente</a>
                    <a class="dropdown-item" href="/produto/listar_inativos?col=valor&dir=asc">Valor Crescente</a>
                    <a class="dropdown-item" href="/produto/listar_inativos?col=valor&dir=desc">Valor Descrescente</a>
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
        <?php if ($produtos) : ?>
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

                        <tr>
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
                                <a class="btn btn-sm btn-warning" href="/produto/ativar/<?= $p['id'] ?>" onclick="return confirmar('Deseja ativar o Produto');">Ativar</a>
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