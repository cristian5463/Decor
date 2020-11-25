<div class="col mt-5">
    <div class="row">
        <div class="col-2">
            <h1>Clientes</h1>
        </div>

        <div class="col-2">
            <a class="btn btn-primary float-right" href="/cliente/create">Adicionar cliente</a>
        </div>

        <div class="col-2">
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordem
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/cliente/listar?col=id&dir=asc">ID</a>
                    <a class="dropdown-item" href="/cliente/listar?col=nome&dir=asc">Nome Crescente</a>
                    <a class="dropdown-item" href="/cliente/listar?col=nome&dir=desc">Nome Decrerescente</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <a class="btn btn-secondary" href="/cliente/listar_inativos">Clientes Inativos</a>
        </div>

        <div class="col-4">
            <form class="form-inline" method="POST" action="/cliente/buscar">
            <input type="hidden" name="tipo" value="ativos">
                <div class="form-group">
                    <label for="buscar" class="sr-only">Buscar</label>
                    <input type="text" class="form-control" id="buscar" value="<?= isset($buscar) ? $buscar : '' ?>" name="buscar" placeholder="Buscar Cliente" required>
                </div>

                <button type="submit" class="btn btn-primary ml-1">Buscar</button>

                <?php
                if (isset($buscar)) : ?>
                    <a class="btn btn-danger ml-1" href="/cliente/listar">x</a>
                <?php endif ?>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <?php if ($clientes)  : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $c) : ?>
                        <tr class="<?= isset($ativado_id) && $ativado_id == $c['id'] ? 'table-info' : '' ?>">
                            <th scope="row">
                                <?= $c['id'] ?>
                            </th>
                            <td>
                                <?= $c['nome'].' '.$c['sobrenome'] ?>
                            </td>
                            <td>
                                <a href="/cliente/ver/<?= $c['id'] ?>">
                                    <?= $c['cpf'] ?>
                                </a>
                            </td>
                            <td>
                                <?= endereco($c) ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="/cliente/edit/<?= $c['id'] ?>">Editar</a>
                                <a class="btn btn-sm btn-danger" href="/cliente/delete/<?= $c['id'] ?>" onclick="return confirmar('Deseja Confirmar')">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
                <div class="mt-4 alert alert-warning">Cliente não encontrado!</div>
            <?php endif ?>
        </div>
    </div>
</div>