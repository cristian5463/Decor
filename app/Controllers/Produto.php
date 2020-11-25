<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use CodeIgniter\HTTP\Request;

class Produto extends BaseController
{
    public function ver($id)
    {
        $produto = new ProdutoModel();
        $produto = $produto->buscarProduto($id);
        //
        $cabecalho = ['titulo' =>  'Produto - ' . $produto['nome']];
        //
        $data = ['produto' => $produto];
        //
        echo view('templates/cabecalho', $cabecalho);
        echo view('produtos/ver', $data);
        echo view('templates/rodape');
    }

    public function listar()
    {
        $col = $this->request->getVar('col');
        $dir = $this->request->getVar('dir');
        $ativado_id = $this->request->getVar('ativado_id');
        // fazer o count dos produtos depois;
        $produtos = new ProdutoModel();
        $produtos = $produtos->buscarProdutos($col, $dir);
        $data = [
            'produtos' => $produtos,
            'ativado_id' => $ativado_id
        ];
        //
        echo view('templates/cabecalho', ['titulo' => 'Produtos']);
        echo view('produtos/listar', $data);
        echo view('templates/rodape');
    }

    public function create()
    {
        helper('form');
        echo view('templates/cabecalho');
        echo view('produtos/form');
        echo view('templates/rodape');
    }

    public function store()
    {
        helper(['form']);
        //
        $regras = [
            'codigo' => 'required|min_length[4]|max_length[50]',
            'nome' => 'required|min_length[4]|max_length[255]',
            'valor' => 'required|min_length[3]|max_length[8]',
            'descricao' => 'required|min_length[10]'
        ];
        $mensagens = [
            "codigo" =>
            [
                'min_length' => 'O campo código deve ter mais de 4 caracteres',
                'max_length' => 'O campo código deve ter menos de 51 caracteres',
            ],
            
            "nome" =>
            [
                'min_length' => 'O campo nome deve ter mais de 4 caracteres',
                'max_length' => 'O campo nome deve ter menos de 256 caracteres',
            ],

            "valor" =>
            [
                'min_length' => 'O campo valor deve ter mais de 2 caracteres',
                'max_length' => 'O campo valor deve ter menos de 9 caracteres'
            ],

            "descricao" =>
            [
                'min_length' => 'O campo descrição deve ter mais de 10 caracteres'
            ]

        ];

        if ($this->validate($regras, $mensagens)) {
            // inicia o objeto de modelo para gravar em banco
        $produto = new ProdutoModel();

        // Get das informações vindas do form
        $id = $this->request->getVar('id');
        $codigo = $this->request->getVar('codigo');
        $nome = $this->request->getVar('nome');
        $valor = $this->request->getVar('valor');
        $descricao = $this->request->getVar('descricao');

        //Se houver o checkbox selecionado como valor promocional
        if ($this->request->getVar('e_promocional')) {
            $e_promocional = 1;
            $valor_promocional = $this->request->getVar('valor_promocional');
            // Remove as pontuações
            $valor_promocional = str_replace('.', '', $valor_promocional);
            // Substitui a vírgula pelo ponto
            $valor_promocional = str_replace(',', '.', $valor_promocional);
        } else {
            $e_promocional = 0;
            $valor_promocional = null;
        }

        // Remove as pontuações
        $valor = str_replace('.', '', $valor);
        // Substitui a vírgula pelo ponto
        $valor = str_replace(',', '.', $valor);

        //grava em banco
        $produto->save(
            [
                'id' => $id,
                'codigo' => $codigo,
                'nome' => $nome,
                'valor' => $valor,
                'e_promocional' => $e_promocional,
                'valor_promocional' => $valor_promocional,
                'descricao' => $descricao,
            ]
        );
        //
        $data = [
            'id' => $id
        ];

        // 
        echo view('templates/cabecalho');
        echo view('produtos/sucesso', $data);
        echo view('templates/rodape');
        }
        else{
            $data = [
                'validation' => $this->validator
            ];
            echo view('templates/cabecalho');
            echo view('produtos/form', $data);
            echo view('templates/rodape');
        }
        
    }
    public function edit($id)
    {
        helper('form');
        $produto = new ProdutoModel();
        $produto = $produto->buscarProduto($id);
        //
        $cabecalho = [
            'titulo' => 'Editar - ' . $produto['nome']
        ];
        //
        $data = [
            'codigo' => $produto['codigo'],
            'id' => $produto['id'],
            'nome' => $produto['nome'],
            'valor' => $produto['valor'],
            'valor_promocional' => $produto['valor_promocional'],
            'e_promocional' => $produto['e_promocional'],
            'descricao' => $produto['descricao']
        ];
        //
        echo view('templates/cabecalho', $cabecalho);
        echo view('produtos/form', $data);
        echo view('templates/rodape');
    }

    public function delete($id)
    {
        $produto = new ProdutoModel();
        $produto->delete($id);
        // 
        echo view('templates/cabecalho');
        echo view('produtos/removido');
        echo view('templates/rodape');
    }

    //funcão para localizar produto

    public function buscar(){
        $tipo = $this->request->getVar('tipo');
        $buscar = $this->request->getVar('buscar');
        $produto = new ProdutoModel();
        $produtos = $produto->buscar($buscar, $tipo);
        //
        $data = [
                'produtos' => $produtos,
                'buscar' => $buscar
        ];
        //
        echo view('templates/cabecalho',['titulo'=>'Produtos']);
        if ($tipo == 'ativos') {
            echo view('produtos/listar', $data);
        }else{
            echo view('produtos/listar-inativos', $data);
        }
        echo view('templates/rodape');
    }

    public function listar_inativos()
    {
        $col = $this->request->getVar('col');
        $dir = $this->request->getVar('dir');

        $produto = new ProdutoModel();
        $produtos = $produto->listarInativos($col, $dir);
        $data = [
            'produtos' => $produtos
        ];

        echo view('templates/cabecalho',['titulo'=>'Produtos Inativos']);
        echo view('produtos/listar-inativos', $data);
        echo view('templates/rodape');
    }

    public function ativar($id){
        $produto = new ProdutoModel();
        $produto->ativar($id);

        return redirect()->to('/produto/listar?ativado_id=' .$id);

    }
}
