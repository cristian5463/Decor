<?php

namespace App\Models;

use CodeIgniter\Model;
use Kint\Parser\SplFileInfoPlugin;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $createField = 'data_criacao';
    protected $updateField = 'data_atualizao';
    protected $deletedField = 'data_delete';
    protected $allowedFields = [
        'codigo',
        'nome',
        'valor',
        'descricao',
        'e_promocional',
        'valor_promocional',
        'data_delete'
    ];
    //
    public function buscarProdutos($col, $dir)
    {
        if ($col && $dir) {
            $col = $col;
            $dir = $dir;
        }else{
            $col = 'nome';
            $dir = 'asc';
        }
        return $this->orderBy("$col $dir")->findAll();
    }
    //
    public function buscarProduto($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function buscar($buscar, $tipo)
    {
        if ($tipo == 'ativos') {
            return $this->like(['nome' => '%' . $buscar . '%'])->findAll();
        }else {
            return $this->like(['nome' => '%' . $buscar . '%'])->onlyDeleted()->findAll();
        }
        
    }

    public function listarInativos($col, $dir)
    {
        if ($col && $dir) {
            $col = $col;
            $dir = $dir;
        }else{
            $col = 'nome';
            $dir = 'asc';
        }
        return $this->orderBy("$col $dir")->onlyDeleted()->findAll();
    }

    public function ativar($id){
        return $this->set('data_delete', null)->where(['id' => $id])->update();
    }
}
