<?php 
    function endereco($endereco)
    {
        $retorno = '';
        $retorno .= $endereco['endereco'].', ';
        $retorno .= $endereco['numero'].', ';
        $retorno .= $endereco['bairro'].' - ';
        
        if ($endereco['complemento']) {
            $retorno .= $endereco['complemento'].' - ';
        }
        
        $retorno .= $endereco['cidade'].'/';
        $retorno .= $endereco['estado'].' - ';
        $retorno .= $endereco['cep'];
        return $retorno;
    }

    function endereco2($endereco)
    {

    }
?>