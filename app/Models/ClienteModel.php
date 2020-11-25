<?php

namespace App\Models;

use CodeIgniter\Model;
use Kint\Parser\SplFileInfoPlugin;

class ClienteModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $createField = 'data_criacao';
    protected $updateField = 'data_atualizao';
    protected $deletedField = 'data_exclusao';
    protected $allowedFields = [
        'nome',
        'sobrenome',
        'cpf',
        'cep',        
        'endereco',
        'bairro',
        'estado',
        'cidade',
        'numero',
        'complemento',
        'observacoes',
        'data_exclusao'
    ];
    //
    public function buscarClientes($col, $dir)
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
    public function buscarCliente($id)
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
