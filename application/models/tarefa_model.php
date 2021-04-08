<?php

Class tarefa_model extends CI_Model {

    function cadastrar($dados) {
        $manipulaData = explode(' ', $dados['dataHora']);
        
        $dados['dataHora'] = implode('-', array_reverse(explode('/', $manipulaData[0]))) . ' ' .$manipulaData[1] ;
        
        $data = array(
            'pessoa_id' => $dados['pessoa_id'],
            'titulo' => $dados['titulo'],
            'dataHora' => implode("-", array_reverse(explode("/", $dados['dataHora']))),
            'prioridade' => $dados['prioridade'],
            'estado' => $dados['estado']);
        
        return $this->db->insert('tarefa', $data);
    }

    function listar() {
        $this->db->select('t.*, p.nome');
        $this->db->join('pessoa as p', 'p.id = t.pessoa_id', 'left');
        $this->db->from('tarefa as t');
        return $this->db->get()->result();
    }

    function excluir($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tarefa');
    }

    function alterar($id) {
        $this->db->select('t.*, p.nome');
        $this->db->join('pessoa as p', 'p.id = t.pessoa_id', 'left');
        $this->db->where('t.id', $id);
        $this->db->from('tarefa as t');
        return $this->db->get()->result();
    }

    function doAlterar($dados) {
        $manipulaData = explode(' ', $dados['dataHora']);
        
        $dados['dataHora'] = implode('-', array_reverse(explode('/', $manipulaData[0]))) . ' ' .$manipulaData[1] ;
        return $this->db->query("UPDATE tarefa SET titulo='$dados[titulo]', dataHora='$dados[dataHora]', pessoa_id='$dados[pessoa_id]', prioridade='$dados[prioridade]', estado='$dados[estado]' WHERE id=$dados[id]");
    }
    
    function validaPessoaTarefa($pessoa_id){
        $this->db->select('count(id) as total');
        $this->db->where('pessoa_id', $pessoa_id);
        $this->db->from('tarefa');
        $result = $this->db->get()->result();
        
        if($result[0]->total == 3){
            return true;
        }else{
            return false;
        }
        
    }
    
    function validaPessoaTarefaAlteracao($dados){
        $this->db->select('t.*, p.nome');
        $this->db->join('pessoa as p', 'p.id = t.pessoa_id', 'left');
        $this->db->where('t.id', $dados['id']);
        $this->db->from('tarefa as t');
        $result = $this->db->get()->result();
        
        if($result[0]->pessoa_id == $dados['pessoa_id']){
            return false;
        }
        
        $this->db->select('count(id) as total');
        $this->db->where('pessoa_id', $dados['pessoa_id']);
        $this->db->from('tarefa');
        $result = $this->db->get()->result();
        
        if($result[0]->total == 3){
            return true;
        }else{
            return false;
        }
        
    }

}

?>