<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use CodeIgniter\HTTP\Request;

class Cliente extends BaseController
{
    public function ver($id)
    {

        $cliente = new ClienteModel();
        $cliente = $cliente->buscarCliente($id);
        //
        $cabecalho = ['titulo' =>  'Cliente - ' . $cliente['nome']];
        //
        $data = ['cliente' => $cliente];
        //
        echo view('templates/cabecalho', $cabecalho);
        echo view('clientes/ver', $data);
        echo view('templates/rodape');
    }

    public function listar()
    {
        $col = $this->request->getVar('col');
        $dir = $this->request->getVar('dir');
        $ativado_id = $this->request->getVar('ativado_id');
        // fazer o count dos clientes depois;
        $clientes = new ClienteModel();
        $clientes = $clientes->buscarClientes($col, $dir);
        $data = [
            'clientes' => $clientes,
            'ativado_id' => $ativado_id
        ];
        //
        echo view('templates/cabecalho', ['titulo' => 'Clientes']);
        echo view('clientes/listar', $data);
        echo view('templates/rodape');
    }

    public function create()
    {
        helper('form');
        echo view('templates/cabecalho');
        echo view('clientes/form');
        echo view('templates/rodape');
    }

    public function store()
    {
        helper(['form']);
        //
        $regras = [
            'nome' => 'required|min_length[2]|max_length[50]',
            'sobrenome' => 'required|min_length[2]|max_length[50]',
            'cpf' => 'required|min_length[14]|max_length[14]',
            'endereco' => 'required|max_length[150]',
            'numero' => 'required|max_length[6]',
            'bairro' => 'required|max_length[100]',
            'cidade' => 'required|max_length[100]',
            'complemento' => 'required|max_length[100]'
        ];
        $mensagens = [

            "nome" =>
            [
                'min_length' => 'O campo nome deve ter mais de 2 caracteres',
                'max_length' => 'O campo nome deve ter menos de 51 caracteres',
            ],

            "sobrenome" =>
            [
                'min_length' => 'O campo sobrenome deve ter mais de 2 caracteres',
                'max_length' => 'O campo sobrenome deve ter menos de 51 caracteres',
            ],

            "cpf" =>
            [
                'min_length' => 'O campo CPF deve ter mais de 13 caracteres',
                'max_length' => 'O campo CPF deve ter menos de 15 caracteres',
            ],

            "cep" =>
            [
                'min_length' => 'O campo CEP deve ter mais de 8 caracteres',
                'max_length' => 'O campo CEP deve ter menos de 10 caracteres',
            ],

            "endereco" =>
            [
                'max_length' => 'O campo endereço deve ter menos de 151 caracteres'
            ],

            "numero" =>
            [
                'max_length' => 'O campo numero deve ter menos de 8 caracteres'
            ],

            "bairro" =>
            [
                'max_length' => 'O campo endereço deve ter menos de 101 caracteres'
            ],

            "cidade" =>
            [
                'max_length' => 'O campo endereço deve ter menos de 151 caracteres'
            ],

            "complemento" =>
            [
                'max_length' => 'O campo complemento deve ter menos de 101 caracteres'
            ]

        ];

        if ($this->validate($regras, $mensagens)) {
            // inicia o objeto de modelo para gravar em banco
            $cliente = new ClienteModel();

            // Get das informações vindas do form
            $id = $this->request->getVar('id');
            $nome = $this->request->getVar('nome');
            $sobrenome = $this->request->getVar('sobrenome');
            $cpf = $this->request->getVar('cpf');
            $cep = $this->request->getVar('cep');
            $endereco = $this->request->getVar('endereco');
            $bairro = $this->request->getVar('bairro');
            $numero = $this->request->getVar('numero');
            $cidade = $this->request->getVar('cidade');
            $estado = $this->request->getVar('estado');
            $observacoes = $this->request->getVar('observacoes');
            $complemento = $this->request->getVar('complemento');


            //grava em banco
            $cliente->save(
                [
                    'id' => $id,
                    'nome' => $nome,
                    'sobrenome' => $sobrenome,
                    'cpf' => $cpf,
                    'cep' => $cep,
                    'endereco' => $endereco,
                    'bairro' => $bairro,
                    'numero' => $numero,
                    'cidade' => $cidade,
                    'estado' => $estado,
                    'observacoes' => $observacoes,
                    'complemento' => $complemento,
                ]
            );
            //
            if ($id) {
                $msg = 'Cliente editado com sucesso!';
            }else {
                $msg = 'Cliente inserido com sucesso!';
            }

            $this->session->setFlashdata('mensagem', $msg);

            return redirect()->to('/cliente/listar');
        } else {
            $data = [
                'validation' => $this->validator
            ];
            echo view('templates/cabecalho');
            echo view('clientes/form', $data);
            echo view('templates/rodape');
        }
    }
    public function edit($id)
    {
        helper('form');
        $cliente = new ClienteModel();
        $cliente = $cliente->buscarCliente($id);
        //
        $cabecalho = [
            'titulo' => 'Editar - ' . $cliente['nome']
        ];
        //
        $data = [
            'id' => $cliente['id'],
            'nome' => $cliente['nome'],
            'sobrenome' => $cliente['sobrenome'],
            'cpf' => $cliente['cpf'],
            'cep' => $cliente['cep'],
            'endereco' => $cliente['endereco'],
            'bairro' => $cliente['bairro'],
            'complemento' => $cliente['complemento'],
            'numero' => $cliente['numero'],
            'cidade' => $cliente['cidade'],
            'estado' => $cliente['estado'],
            'observacoes' => $cliente['observacoes'],

        ];
        //
        echo view('templates/cabecalho', $cabecalho);
        echo view('clientes/form', $data);
        echo view('templates/rodape');
    }

    public function delete($id)
    {
        $cliente = new ClienteModel();
        $cliente->delete($id);
        // 
        $msg = 'Cliente removido com sucesso!';
        $this->session->setFlashdata('mensagem', $msg);

        return redirect()->to('/cliente/listar');
        
    }

    //funcão para localizar produto

    public function buscar()
    {
        $tipo = $this->request->getVar('tipo');
        $buscar = $this->request->getVar('buscar');
        $cliente = new ClienteModel();
        $clientes = $cliente->buscar($buscar, $tipo);
        //
        $data = [
            'produtos' => $clientes,
            'buscar' => $buscar
        ];
        //
        echo view('templates/cabecalho', ['titulo' => 'Clientes']);
        if ($tipo == 'ativos') {
            echo view('clientes/listar', $data);
        } else {
            echo view('clientes/listar-inativos', $data);
        }
        echo view('templates/rodape');
    }

    public function listar_inativos()
    {
        $col = $this->request->getVar('col');
        $dir = $this->request->getVar('dir');

        $cliente = new ClienteModel();
        $clientes = $cliente->listarInativos($col, $dir);
        $data = [
            'clientes' => $clientes
        ];

        echo view('templates/cabecalho', ['titulo' => 'Clientes Inativos']);
        echo view('clientes/listar-inativos', $data);
        echo view('templates/rodape');
    }

    public function ativar($id)
    {
        $cliente = new ClienteModel();
        $cliente->ativar($id);


        $msg = 'Cliente ativado com sucesso!';
        $this->session->setFlashdata('id', $id);
        $this->session->setFlashdata('mensagem', $msg);
        return redirect()->to('/cliente/listar');
    }
}
