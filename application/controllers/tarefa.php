<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tarefa extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library("Mensagem");
        $this->load->model('tarefa_model', '', TRUE);
    }

    function cadastrar() {
        $data['view'] = 'Painel/Tarefa/cadastrar';
        $this->load->view('Painel/index', $data);
    }

    function doCadastrar() {
        $this->validaQtdTarefaPessoa($_POST);
        
        if ($this->tarefa_model->cadastrar($_POST)) {
            $this->mensagem->setMensagem("Cadastro efetuado com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("tarefa/listar");
        $this->mensagem->alerta();
        exit;
    }

    function listar() {
        $data['vLista'] = $this->tarefa_model->listar();

        $data['view'] = 'Painel/Tarefa/listar';
        $this->load->view('Painel/index', $data);
    }

    function excluir() {
        if ($this->tarefa_model->excluir($this->uri->segment(3))) {
            $this->mensagem->setMensagem("Exclusão efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("tarefa/listar");
        $this->mensagem->alerta();
        exit;
    }

    function alterar() {
        $data['vTarefa'] = $this->tarefa_model->alterar($this->uri->segment(3));
        $data['view'] = 'Painel/Tarefa/alterar';
        $this->load->view('Painel/index', $data);
    }

    function doAlterar() {
        $this->validaQtdTarefaPessoaAlteracao($_POST);
        if ($this->tarefa_model->doAlterar($_POST)) {
            $this->mensagem->setMensagem("Alteração efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }

        $this->mensagem->setUrl("tarefa/listar");
        $this->mensagem->alerta();
        exit;
    }
    
    private function validaQtdTarefaPessoa($dados){
        if($this->tarefa_model->validaPessoaTarefa($dados['pessoa_id'])){
            $this->mensagem->setMensagem("Pessoa selecionada já atingiu numero máximo de tarefas!");
            $this->mensagem->setUrl("tarefa/cadastrar");
            $this->mensagem->alerta();
            exit;
        }
    }
    
    private function validaQtdTarefaPessoaAlteracao($dados){
        if($this->tarefa_model->validaPessoaTarefaAlteracao($dados)){
            $this->mensagem->setMensagem("Pessoa selecionada já atingiu numero máximo de tarefas!");
            $this->mensagem->setUrl("tarefa/cadastrar");
            $this->mensagem->alerta();
            exit;
        }
    }

}

?>