<?php namespace App\Controllers;

class Painel extends BaseController
{
	public function index()
	{
        echo view('templates/cabecalho');
        echo view('painel');
        echo view('templates/rodape');
	}
}
