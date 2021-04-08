<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoa extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library("Mensagem");
        $this->load->model('pessoa_model', '', TRUE);
    }

    function cadastrar() {
        $data['user'] = $this->session->userdata('logged_in');
        $data['view'] = 'Painel/Pessoa/cadastrar';
        $this->load->view('Painel/index', $data);
    }

    function doCadastrar() {

        if ($this->pessoa_model->cadastrar($_POST)) {
            $this->mensagem->setMensagem("Cadastro efetuado com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("pessoa/listar");
        $this->mensagem->alerta();
        exit;
    }

    function listar() {
        $data['vLista'] = $this->pessoa_model->listar();

        $data['view'] = 'Painel/Pessoa/listar';
        $this->load->view('Painel/index', $data);
    }

    function excluir() {

        if ($this->pessoa_model->excluir($this->uri->segment(3))) {
            $this->mensagem->setMensagem("Exclusão efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Excluir!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("pessoa/listar");
        $this->mensagem->alerta();
        exit;
    }

    function alterar() {
        $data['vPessoa'] = $this->pessoa_model->alterar($this->uri->segment(3));

        $data['view'] = 'Painel/Pessoa/alterar';
        $this->load->view('Painel/index', $data);
    }

    function doAlterar() {
        if ($this->pessoa_model->doAlterar($_POST)) {
            $this->mensagem->setMensagem("Alteração efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Excluir!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("pessoa/listar");
        $this->mensagem->alerta();
        exit;
    }

    function doPesquisaPessoaAjax() {
        echo $this->pessoa_model->pesquisaPessoaAjax($_POST);
    }

}
